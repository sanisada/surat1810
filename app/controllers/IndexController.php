<?php 
/**
 * Index Page Controller
 * @category  Controller
 */
class IndexController extends BaseController{
	function __construct(){
		parent::__construct(); 
		$this->tablename = "pengguna";
	}

	/**
	 * Index Action 
	 * @return null
	 */
	function index(){
		if(user_login_status() == true){
			$this->redirect(HOME_PAGE);
		}
		else{
			$this->render_view("index/index.php");
		}
	}

	private function login_user($username, $password_text, $rememberme = false){
		$db = $this->GetModel();
		$username = filter_var($username, FILTER_SANITIZE_STRING);
		$db->where("Username", $username)->orWhere("Email", $username);
		$tablename = $this->tablename;
		$user = $db->getOne($tablename);
		if(!empty($user)){
			$password_hash = $user['Password'];
			$this->modeldata['Password'] = $password_hash;
			if(password_verify($password_text, $password_hash)){
				unset($user['Password']);
				set_session("user_data", $user);
				if($rememberme == true){
					$sessionkey = time().random_str(20);
					$db->where("Username", $user['Username']);
					$res = $db->update($tablename, array("login_session_key" => hash_value($sessionkey)));
					if(!empty($res)){
						set_cookie("login_session_key", $sessionkey);
					}
				}
				else{
					clear_cookie("login_session_key");
				}
				return $this->redirect_after_login();
			}
			else{
				return $this->login_fail("Username or password not correct");
			}
		}
		else{
			return $this->login_fail("Username or password not correct");
		}
	}

	function sso_login(){
		$provider = new JKD\SSO\Client\Provider\Keycloak([
			'authServerUrl'         => 'https://sso.bps.go.id',
			'realm'                 => 'pegawai-bps',
			'scope'                 => 'openid',
			'clientId'              => '11810-surat-k3n',
			'clientSecret'          => '50b4f756-cc24-4d7b-aada-260c82dbd2d1',
			'redirectUri'           => 'https://surat1810.web.bps.go.id/index/sso_login'
		]);
		
		if (!isset($_GET['code'])) {
			$authUrl = $provider->getAuthorizationUrl();
			$_SESSION['oauth2state'] = $provider->getState();
			header('Location: '.$authUrl);
			exit;
		} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
			unset($_SESSION['oauth2state']);
			exit('Invalid state');
		} else {
			try {
				$token = $provider->getAccessToken('authorization_code', [
					'code' => $_GET['code']
				]);
			} catch (Exception $e) {
				exit('Gagal mendapatkan akses token: '.$e->getMessage());
			}
			try {

				// Mendapatkan informasi pengguna
                $resourceOwner = $provider->getResourceOwner($token);
                $user = $resourceOwner->toArray();
    
                // Periksa apakah username ada di database
                $db = $this->GetModel();
                $username = $user['username'];
                $db->where("Username", $username);
                $existingUser = $db->getOne("pengguna");
    
                if ($existingUser) {
                    // Simpan data pengguna ke dalam session
                    $_SESSION[APP_ID . 'user_data'] = [
                        'Email' => $user['email'],
                        'Username' => $user['username'],
                        'Name' => $user['name'],
                        'Role' => $existingUser['Role']
                    ];
    
                    $sessionKey = time() . bin2hex(random_bytes(20));
                    $_SESSION[APP_ID . 'login_session_key'] = hash('sha256', $sessionKey);
    
                    // Simpan session key ke database
                    $db->where("Username", $username);
                    $db->update("pengguna", array("login_session_key" => $_SESSION[APP_ID . '_login_session_key']));
    
                    // Redirect setelah login sukses
                    return $this->redirect_after_login();
    			} else {
                    // User tidak ditemukan di database
                    exit('User tidak ditemukan.');
                }
			} catch (Exception $e) {
				exit('Gagal Mendapatkan Data Pengguna: ' . $e->getMessage());
			}
		}
	}

	private function redirect_after_login() {
		$redirect_url = get_session("login_redirect_url");
		if (!empty($redirect_url)) {
			clear_session("login_redirect_url");
			return $this->redirect($redirect_url);
		} else {
			return $this->redirect(HOME_PAGE);
		}
	}

	private function login_fail($page_error = null){
		$this->set_page_error($page_error);
		$this->render_view("index/login.php");
	}

	function login($formdata = null){
		if($formdata){
			$modeldata = $this->modeldata = $formdata;
			$username = trim($modeldata['username']);
			$password = $modeldata['password'];
			$rememberme = (!empty($modeldata['rememberme']) ? $modeldata['rememberme'] : false);
			$this->login_user($username, $password, $rememberme);
		}
		else{
			$this->set_page_error("Invalid request");
			$this->render_view("index/login.php");
		}
	}

	function register($formdata = null){
		if($formdata){
			$request = $this->request;
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$fields = $this->fields = array("Username","Password","Email");
			$postdata = $this->format_request_data($formdata);
			$cpassword = $postdata['confirm_password'];
			$password = $postdata['Password'];
			if($cpassword != $password){
				$this->view->page_error[] = "Your password confirmation is not consistent";
			}
			$this->rules_array = array(
				'Username' => 'required',
				'Password' => 'required',
				'Email' => 'required|valid_email',
			);
			$this->sanitize_array = array(
				'Username' => 'sanitize_string',
				'Email' => 'sanitize_string',
			);
			$this->filter_vals = true;
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$password_text = $modeldata['Password'];
			$modeldata['Password'] = $this->modeldata['Password'] = password_hash($password_text , PASSWORD_DEFAULT);
			$db->where("Username", $modeldata['Username']);
			if($db->has($tablename)){
				$this->view->page_error[] = $modeldata['Username']." Already exist!";
			}
			$db->where("Email", $modeldata['Email']);
			if($db->has($tablename)){
				$this->view->page_error[] = $modeldata['Email']." Already exist!";
			}
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->login_user($modeldata['Email'], $password_text);
					return;
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Tambah Pengguna";
		return $this->render_view("index/register.php");
	}

	function logout($arg=null){
		Csrf::cross_check();
		session_destroy();
		clear_cookie("login_session_key");
		$this->redirect("");
	}
}
?>
