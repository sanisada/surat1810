<?php 
/**
 * Suratkeluar Page Controller
 * @category  Controller
 */
class SuratkeluarController extends BaseController{
	function __construct(){
		parent::__construct();
		$this->tablename = "suratkeluar";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id", 
			"Tanggal_Surat", 
			"Tujuan_Surat", 
			"Nama_Pegawai", 
			"Nama_Tim_Kerja", 
			"Jenis_Kegiatan", 
			"Nomor_Surat", 
			"Ringkasan_Isi_Surat", 
			"Keterangan");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				suratkeluar.id LIKE ? OR 
				suratkeluar.Nomor LIKE ? OR 
				suratkeluar.Tanggal_Surat LIKE ? OR 
				suratkeluar.Tujuan_Surat LIKE ? OR 
				suratkeluar.Nama_Pegawai LIKE ? OR 
				suratkeluar.Nama_Tim_Kerja LIKE ? OR 
				suratkeluar.Jenis_Kegiatan LIKE ? OR 
				suratkeluar.Kode_Sensus LIKE ? OR 
				suratkeluar.Subkode_Sensus LIKE ? OR 
				suratkeluar.Bagian_Sensus LIKE ? OR 
				suratkeluar.Kode_Klasifikasi LIKE ? OR 
				suratkeluar.Subkode_Klasifikasi LIKE ? OR 
				suratkeluar.Bagian_Klasifikasi LIKE ? OR 
				suratkeluar.Nomor_Surat LIKE ? OR 
				suratkeluar.Ringkasan_Isi_Surat LIKE ? OR 
				suratkeluar.Keterangan LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "suratkeluar/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("suratkeluar.id", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Surat Keluar";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		
		$this->render_view("suratkeluar/list.php", $data); //render the full page
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("id", 
			"Nomor", 
			"Tanggal_Surat", 
			"Tujuan_Surat", 
			"Nama_Pegawai", 
			"Nama_Tim_Kerja", 
			"Jenis_Kegiatan", 
			"Kode_Sensus", 
			"Subkode_Sensus", 
			"Bagian_Sensus", 
			"Kode_Klasifikasi", 
			"Subkode_Klasifikasi", 
			"Bagian_Klasifikasi", 
			"Nomor_Surat", 
			"Ringkasan_Isi_Surat", 
			"Keterangan");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("suratkeluar.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Surat Keluar";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("suratkeluar/view.php", $record);
	}

	// function getPegawai(){
	// 	$url_base       = 'https://sso.bps.go.id/auth/';
	// 	$url_token      = $url_base.'realms/pegawai-bps/protocol/openid-connect/token';
	// 	$url_api        = $url_base.'admin/realms/pegawai-bps/users';
	// 	$client_id      = '11810-surat-k3n'; 
	// 	$client_secret  = '50b4f756-cc24-4d7b-aada-260c82dbd2d1';

	// 	$query_search   = '?username={username}'; //'?username={username}' atau '?email={email pegawai}'

	// 	/*
	// 	------------------------------------------------------------------------------------------------
	// 	Tahap 1 :
	// 	Mendapatkan akses token
	// 	------------------------------------------------------------------------------------------------
	// 	*/
	// 	$ch = curl_init($url_token);
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS,"grant_type=client_credentials");
	// 	curl_setopt($ch, CURLOPT_USERPWD, $client_id . ":" . $client_secret);  
	// 	curl_setopt($ch, CURLOPT_POST, 1);
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	$response_token = curl_exec($ch);
	// 	if(curl_errno($ch)){
	// 		throw new Exception(curl_error($ch));
	// 	}
	// 	curl_close ($ch);
	// 	$json_token = json_decode($response_token, true);
	// 	$access_token = $json_token['access_token'];

	// 	/*
	// 	------------------------------------------------------------------------------------------------
	// 	Tahap 2 :
	// 	Mendapatkan data pegawai dengan username tertentu
	// 	------------------------------------------------------------------------------------------------
	// 	*/
	// 	$ch = curl_init($url_api.$query_search);
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , 'Authorization: Bearer '.$access_token ));  
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	$response = curl_exec($ch);
	// 	if(curl_errno($ch)){
	// 		throw new Exception(curl_error($ch));
	// 	}
	// 	curl_close ($ch);
	// 	$json = json_decode($response, true);

	// 	return $json;

	// 	// echo "Hasil Pencarian <b>$query_search </b><hr>";
	// 	// $i=1;
	// 	// foreach ($json as $result){
	// 	// 	echo "<br>$i : Username : ".$result['username']."<ul>";
	// 	// 	foreach ($result['attributes'] as $key => $value){
	// 	// 		echo "<li><i>".$key."</i>: <br>". $value[0]."</li>";
	// 	// 	}
	// 	// 	echo "</ul>";
	// 	// 	$i++;
		
	// 	// }
	// }
	
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		// $pegawaiData = $this->getPegawai();
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("Nomor","Tanggal_Surat","Tujuan_Surat","Nama_Pegawai","Nama_Tim_Kerja","Jenis_Kegiatan","Kode_Sensus","Subkode_Sensus","Bagian_Sensus","Kode_Klasifikasi","Subkode_Klasifikasi","Bagian_Klasifikasi","Nomor_Surat","Ringkasan_Isi_Surat","Keterangan");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'Nomor' => 'required',
				'Tanggal_Surat' => 'required',
				'Tujuan_Surat' => 'required',
				'Nama_Pegawai' => 'required',
				'Nama_Tim_Kerja' => 'required',
				'Jenis_Kegiatan' => 'required',
				'Nomor_Surat' => 'required',
				'Ringkasan_Isi_Surat' => 'required',
				'Keterangan' => 'required',
			);
			$this->sanitize_array = array(
				'Nomor' => 'sanitize_string',
				'Tanggal_Surat' => 'sanitize_string',
				'Tujuan_Surat' => 'sanitize_string',
				'Nama_Pegawai' => 'sanitize_string',
				'Nama_Tim_Kerja' => 'sanitize_string',
				'Jenis_Kegiatan' => 'sanitize_string',
				'Kode_Sensus' => 'sanitize_string',
				'Subkode_Sensus' => 'sanitize_string',
				'Bagian_Sensus' => 'sanitize_string',
				'Kode_Klasifikasi' => 'sanitize_string',
				'Subkode_Klasifikasi' => 'sanitize_string',
				'Bagian_Klasifikasi' => 'sanitize_string',
				'Nomor_Surat' => 'sanitize_string',
				'Ringkasan_Isi_Surat' => 'sanitize_string',
				'Keterangan' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("suratkeluar");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Tambah Surat Keluar";
		$this->render_view("suratkeluar/add.php", ['pegawaiData' => $pegawaiData]);
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","Nomor","Tanggal_Surat","Tujuan_Surat","Nama_Pegawai","Nama_Tim_Kerja","Jenis_Kegiatan","Kode_Sensus","Subkode_Sensus","Bagian_Sensus","Kode_Klasifikasi","Subkode_Klasifikasi","Bagian_Klasifikasi","Nomor_Surat","Ringkasan_Isi_Surat","Keterangan");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'Nomor' => 'required',
				'Tanggal_Surat' => 'required',
				'Tujuan_Surat' => 'required',
				'Nama_Pegawai' => 'required',
				'Nama_Tim_Kerja' => 'required',
				'Jenis_Kegiatan' => 'required',
				'Nomor_Surat' => 'required',
				'Ringkasan_Isi_Surat' => 'required',
				'Keterangan' => 'required',
			);
			$this->sanitize_array = array(
				'Nomor' => 'sanitize_string',
				'Tanggal_Surat' => 'sanitize_string',
				'Tujuan_Surat' => 'sanitize_string',
				'Nama_Pegawai' => 'sanitize_string',
				'Nama_Tim_Kerja' => 'sanitize_string',
				'Jenis_Kegiatan' => 'sanitize_string',
				'Nomor_Surat' => 'sanitize_string',
				'Ringkasan_Isi_Surat' => 'sanitize_string',
				'Keterangan' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("suratkeluar.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("suratkeluar");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("suratkeluar");
					}
				}
			}
		}
		$db->where("suratkeluar.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Surat Keluar";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("suratkeluar/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("id","Nomor","Tanggal_Surat","Tujuan_Surat","Nama_Pegawai","Nama_Tim_Kerja","Jenis_Kegiatan","Kode_Sensus","Subkode_Sensus","Bagian_Sensus","Kode_Klasifikasi","Subkode_Klasifikasi","Bagian_Klasifikasi","Nomor_Surat","Ringkasan_Isi_Surat","Keterangan");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'Nomor' => 'required',
				'Tanggal_Surat' => 'required',
				'Tujuan_Surat' => 'required',
				'Nama_Pegawai' => 'required',
				'Nama_Tim_Kerja' => 'required',
				'Jenis_Kegiatan' => 'required',
				'Nomor_Surat' => 'required',
				'Ringkasan_Isi_Surat' => 'required',
				'Keterangan' => 'required',
			);
			$this->sanitize_array = array(
				'Nomor' => 'sanitize_string',
				'Tanggal_Surat' => 'sanitize_string',
				'Tujuan_Surat' => 'sanitize_string',
				'Nama_Pegawai' => 'sanitize_string',
				'Nama_Tim_Kerja' => 'sanitize_string',
				'Jenis_Kegiatan' => 'sanitize_string',
				'Nomor_Surat' => 'sanitize_string',
				'Ringkasan_Isi_Surat' => 'sanitize_string',
				'Keterangan' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("suratkeluar.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("suratkeluar.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("suratkeluar");
	}
	
	public function getKode() {
		$db = $this->GetModel();
		$currentYear = date('Y');
		
		// Query to get the last number for the current year
		$data = $db->rawQueryOne("SELECT MAX(Nomor) AS maxID FROM suratkeluar WHERE YEAR(Tanggal_Surat) = ?", [$currentYear]);
		
		$idMax = $data["maxID"];
		$noUrut = 0;
		
		if (!empty($idMax)) {
			$noUrut = (int)substr($idMax, 2, 3);
		}
		
		// Increment the number and reset to 001 if it's a new year
		$noUrut++;
		$newID = "B-" . sprintf("%03s", $noUrut);
		
		return $newID;
	}
	
}
