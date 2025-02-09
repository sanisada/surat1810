<?php 
/**
 * surat_keputusan Page Controller
 * @category  Controller
 */
class Surat_keputusanController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "surat_keputusan";
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
		$fields = array("Nomor", 
			"Tanggal_Surat", 
			"Perihal", 
			"Catatan", 
			"Waktu_Pelaksanaan",
			"file_pdf");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record

		$currentYear = date('Y'); // Mengambil tahun berjalan
		$tahun = $request->tahun ?? $currentYear; // Jika tidak ada parameter tahun, gunakan tahun berjalan
		$db->where("YEAR(Tanggal_Surat)", $tahun);
		
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				surat_keputusan.Nomor LIKE ? OR 
				surat_keputusan.Tanggal_Surat LIKE ? OR 
				surat_keputusan.Perihal LIKE ? OR 
				surat_keputusan.Catatan LIKE ? OR 
				surat_keputusan.Waktu_Pelaksanaan LIKE ? OR
				surat_keputusan.file_pdf LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "surat_keputusan/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("surat_keputusan.Nomor", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Surat Keputusan";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("surat_keputusan/list.php", $data); //render the full page
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
		$fields = array("Nomor", 
			"Tanggal_Surat", 
			"Perihal", 
			"Catatan", 
			"Waktu_Pelaksanaan");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("surat_keputusan.Nomor", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Surat Keputusan";
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
		return $this->render_view("surat_keputusan/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("Nomor","Tanggal_Surat","Perihal","Catatan","Waktu_Pelaksanaan");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'Nomor' 			=> 'required',
				'Tanggal_Surat' 	=> 'required', 
				'Perihal' 			=> 'required', 
				'Catatan' 			=> 'required', 
				
			);
			$this->sanitize_array = array(
				'Nomor' => 'sanitize_string',
				'Tanggal_Surat' => 'sanitize_string',
				'Perihal' => 'sanitize_string',
				'Catatan' => 'sanitize_string',
				'Waktu_Pelaksanaan' => 'sanitize_string'
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("surat_keputusan");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Tambah SK";
		$this->render_view("surat_keputusan/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null) {
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		
		// Editable fields, tambahkan "file_pdf" sebagai kolom untuk menyimpan nama file
		$fields = $this->fields = array("Nomor", "Tanggal_Surat", "Perihal", "Catatan", "Waktu_Pelaksanaan", "file_pdf");
	
		if ($formdata) {
			$postdata = $this->format_request_data($formdata);
			
			$this->rules_array = array(
				'Nomor' => 'required',
				'Tanggal_Surat' => 'required',
				'Perihal' => 'required',
				'Catatan' => 'required'
			);
	
			$this->sanitize_array = array(
				'Nomor' => 'sanitize_string',
				'Tanggal_Surat' => 'sanitize_string',
				'Perihal' => 'sanitize_string',
				'Catatan' => 'sanitize_string',
				'Waktu_Pelaksanaan' => 'sanitize_string'
			);
	
			// Validasi data form
			$modeldata = $this->modeldata = $this->validate_form($postdata);
	
			// Tangani unggahan file PDF
			if (!empty($_FILES['file_pdf']['name'])) {
				$file_info = $_FILES['file_pdf'];
				$upload_dir = __DIR__ . '/../../assets/sk/'; // Direktori untuk menyimpan file
				$new_filename = uniqid() . "_" . basename($file_info['name']);
				$target_path = $upload_dir . $new_filename;

				// Pindahkan file ke lokasi tujuan
				if (move_uploaded_file($file_info['tmp_name'], $target_path)) {
					$modeldata['file_pdf'] = $new_filename;
				} else {
					$this->set_page_error("Gagal mengunggah file.");
					echo '<pre>';
					print_r($_FILES['file_pdf']);
					echo '</pre>';
				}
			}
	
			if ($this->validated()) {
				$db->where("surat_keputusan.Nomor", $rec_id);
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
	
				if ($bool && $numRows) {
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("surat_keputusan");
				} else {
					if ($db->getLastError()) {
						$this->set_page_error();
					} elseif (!$numRows) {
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return $this->redirect("surat_keputusan");
					}
				}
			}
		}
	
		$db->where("surat_keputusan.Nomor", $rec_id);
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit SK";
	
		if (!$data) {
			$this->set_page_error();
		}
	
		return $this->render_view("surat_keputusan/edit.php", $data);
	}	

	public function openPdf($id) {
		$db = $this->GetModel();
		$tablename = 'surat_keputusan';
	
		// Fetch the record by ID
		$record = $db->where('Nomor', $id)->getOne($tablename);
		
		if (!$record || empty($record['file_pdf'])) {
			$this->set_page_error("PDF file not found.");
			return;
		}
		
		// Define the file path
		$pdfFileName = $record['file_pdf'];
		$uploadDir = __DIR__ . '/../../assets/sk/';
		$filePath = $uploadDir . $pdfFileName;
	
		// Check if file exists
		if (!file_exists($filePath)) {
			$this->set_page_error("File not found.");
			return;
		}
	
		// Set headers to display PDF inline
		header('Content-Type: application/pdf');
		header('Content-Disposition: inline; filename="' . basename($pdfFileName) . '"');
		header('Content-Length: ' . filesize($filePath));
	
		// Clear output buffer and read the PDF file
		ob_clean();
		flush();
		readfile($filePath);
		exit;
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
		$fields = $this->fields = array("Nomor","Tanggal_Surat","Perihal","Catatan","Waktu_Pelaksanaan");
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
				'Perihal' 			=> 'required', 
				'Catatan' 			=> 'required', 
				
			);
			$this->sanitize_array = array(
				'Nomor' => 'sanitize_string',
				'Tanggal_Surat' => 'sanitize_string',
				'Perihal' => 'sanitize_string',
				'Catatan' => 'sanitize_string',
				'Waktu_Pelaksanaan' => 'sanitize_string'
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("surat_keputusan.Nomor", $rec_id);;
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
		$db->where("surat_keputusan.Nomor", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("surat_keputusan");
	}

	public function getKode() {
		$db  = $this->GetModel();
		$currentYear = date('Y');
		$data = $db->rawQueryOne("SELECT max(Nomor) as maxID FROM surat_keputusan WHERE YEAR(Tanggal_Surat) = ?", [$currentYear]);
		$idMax = $data["maxID"];
	
		// If no ID found, set idMax to default format with "000"
		if (empty($idMax)) {
			$idMax = "SK Nomor 000 Tahun " . $currentYear;
		}
	
		// Extract number from the string
		preg_match('/SK Nomor (\d{3}) Tahun/', $idMax, $matches);
		$currentNumber = isset($matches[1]) ? (int)$matches[1] : 0;
	
		// Increment the number and format it as a three-digit string
		$newNumber = $currentNumber + 1;
		$formattedNumber = sprintf("%03d", $newNumber);
	
		// Construct the new ID with the format "SK Nomor 001 Tahun 2024"
		$newID = "SK Nomor " . $formattedNumber . " Tahun " . $currentYear;
		
		return $newID;
	}
	
}
