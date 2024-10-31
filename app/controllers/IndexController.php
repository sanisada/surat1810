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
	private function login_user($username , $password_text, $rememberme = false){
		$db = $this->GetModel();
		$username = filter_var($username, FILTER_SANITIZE_STRING);
		$db->where("Username", $username)->orWhere("Email", $username);
		$tablename = $this->tablename;
		$user = $db->getOne($tablename);
		if(!empty($user)){
			//Verify User Password Text With DB Password Hash Value.
			//Uses PHP password_verify() function with default options
			$password_hash = $user['Password'];
			$this->modeldata['Password'] = $password_hash; //update the modeldata with the password hash
			if(password_verify($password_text,$password_hash)){
        		unset($user['Password']); //Remove user password. No need to store it in the session
				set_session("user_data", $user); // Set active user data in a sessions
				//if Remeber Me, Set Cookie
				if($rememberme == true){
					$sessionkey = time().random_str(20); // Generate a session key for the user
					//Update user session info in database with the session key
					$db->where("Username", $user['Username']);
					$res = $db->update($tablename, array("login_session_key" => hash_value($sessionkey)));
					if(!empty($res)){
						set_cookie("login_session_key", $sessionkey); // save user login_session_key in a Cookie
					}
				}
				else{
					clear_cookie("login_session_key");// Clear any previous set cookie
				}
				$redirect_url = get_session("login_redirect_url");// Redirect to user active page
				if(!empty($redirect_url)){
					clear_session("login_redirect_url");
					return $this->redirect($redirect_url);
				}
				else{
					return $this->redirect(HOME_PAGE);
				}
			}
			else{
				//password is not correct
				return $this->login_fail("Username or password not correct");
			}
		}
		else{
			//user is not registered
			return $this->login_fail("Username or password not correct");
		}
	}

	function sso_login(){
		session_start();
		// Inisialisasi provider Keycloak
        $provider = new JKD\SSO\Client\Provider\Keycloak([
			'authServerUrl'         => 'https://sso.bps.go.id',
			'realm'                 => 'pegawai-bps',
			'clientId'              => '11810-surat-k3n',
			'clientSecret'          => '50b4f756-cc24-4d7b-aada-260c82dbd2d1',
			'redirectUri'           => 'https://localhost/index/sso_login'
		]);
		
		if (!isset($_GET['code'])) {

			// Untuk mendapatkan authorization code
			$authUrl = $provider->getAuthorizationUrl();
			$_SESSION['oauth2state'] = $provider->getState();
			header('Location: '.$authUrl);
			exit;
		
		// Mengecek state yang disimpan saat ini untuk memitigasi serangan CSRF
		} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
		
			unset($_SESSION['oauth2state']);
			exit('Invalid state');
		
		} else {
		
			try {
				$token = $provider->getAccessToken('authorization_code', [
					'code' => $_GET['code']
				]);
			} catch (Exception $e) {
				exit('Gagal mendapatkan akses token : '.$e->getMessage());
			}
		
			// Opsional: Setelah mendapatkan token, anda dapat melihat data profil pengguna
			try {
				$user = $provider->getResourceOwner($token);
				// Simpan data pengguna ke dalam session
				set_session("user_data", [
					'name' => $user->getName(),
					'email' => $user->getEmail(),
					'username' => $user->getUsername(),
					'token' => $token->getToken() // Optionally save the token
				]);
	
	
				// Redirect atau tampilkan halaman selanjutnya setelah autentikasi sukses
				return $this->redirect_after_login();
				exit;
			} catch (Exception $e) {
				exit('Gagal Mendapatkan Data Pengguna: ' . $e->getMessage());
			}
		
			// Gunakan token ini untuk berinteraksi dengan API di sisi pengguna
			echo $token->getToken();
		}		
		$token = $provider->getAccessToken('refresh_token', ['refresh_token' => $token->getRefreshToken()]);
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

	/**
     * Display login page with custom message when login fails
     * @return BaseView
     */
	private function login_fail($page_error = null){
		$this->set_page_error($page_error);
		$this->render_view("index/login.php");
	}
	/**
     * Login Action
     * If Not $_POST Request, Display Login Form View
     * @return View
     */
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
	/**
     * Insert new record into the user table
	 * @param $formdata array from $_POST
     * @return BaseView
     */
	function register($formdata = null){
		if($formdata){
			$request = $this->request;
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$fields = $this->fields = array("Username","Password","Email"); //registration fields
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
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$password_text = $modeldata['Password'];
			//update modeldata with the password hash
			$modeldata['Password'] = $this->modeldata['Password'] = password_hash($password_text , PASSWORD_DEFAULT);
			//Check if Duplicate Record Already Exit In The Database
			$db->where("Username", $modeldata['Username']);
			if($db->has($tablename)){
				$this->view->page_error[] = $modeldata['Username']." Already exist!";
			}
			//Check if Duplicate Record Already Exit In The Database
			$db->where("Email", $modeldata['Email']);
			if($db->has($tablename)){
				$this->view->page_error[] = $modeldata['Email']." Already exist!";
			}
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->login_user($modeldata['Email'] , $password_text);
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
	/**
     * Logout Action
     * Destroy All Sessions And Cookies
     * @return View
     */
	function logout($arg=null){
		Csrf::cross_check();
		session_destroy();
		clear_cookie("login_session_key");
		$this->redirect("");

		$url_logout = $provider->getLogoutUrl();
	}
}
