<?php 
/**
 * Surat_tugas Page Controller
 * @category  Controller
 */
use PhpOffice\PhpWord\PhpWord;
use Shuchkin\SimpleXLSX;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Surat_tugasController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "surat_tugas";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	public function index($fieldname = null, $fieldvalue = null) {
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array(
			"id",
			"Nama_Tim_Kerja",
			"Nomor",
			"Jenis_Kegiatan",
			"Kode_Sensus",
			"Subkode_Sensus",
			"Bagian_Sensus",
			"Kode_Klasifikasi",
			"Subkode_Klasifikasi",
			"Bagian_Klasifikasi",
			"Nama_Kegiatan",
			"Tanggal_Surat",
			"Nomor_Surat",
			"Nama_Yang_di_Tugaskan",
			"Bertugas_Sebagai",
			"Rentang_Waktu_Penugasan",
			"Pembebanan",
			"jenis_surtug"
		);
	
		// Mendapatkan paginasi saat ini, misalnya array(page_number, page_limit)
		$pagination = $this->get_pagination(MAX_RECORD_COUNT);
	
		// Pencarian dalam tabel
		if (!empty($request->search)) {
			$text = trim($request->search);
			$search_condition = "(
				surat_tugas.Nama_Tim_Kerja LIKE ? OR 
				surat_tugas.Nomor LIKE ? OR 
				surat_tugas.Jenis_Kegiatan LIKE ? OR 
				surat_tugas.Kode_Sensus LIKE ? OR 
				surat_tugas.Subkode_Sensus LIKE ? OR 
				surat_tugas.Bagian_Sensus LIKE ? OR 
				surat_tugas.Kode_Klasifikasi LIKE ? OR 
				surat_tugas.Subkode_Klasifikasi LIKE ? OR 
				surat_tugas.Bagian_Klasifikasi LIKE ? OR 
				surat_tugas.Nama_Kegiatan LIKE ? OR 
				surat_tugas.Tanggal_Surat LIKE ? OR 
				surat_tugas.Nomor_Surat LIKE ? OR 
				surat_tugas.Nama_Yang_di_Tugaskan LIKE ? OR 
				surat_tugas.Rentang_Waktu_Penugasan LIKE ? OR
				surat_tugas.Pembebanan LIKE ?
			)";
			$search_params = array(
				"%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%"
			);
			// Menetapkan kondisi pencarian
			$db->where($search_condition, $search_params);
			// Template yang digunakan saat pencarian AJAX
			$this->view->search_template = "surat_tugas/search.php";
		}
	
		if (!empty($request->orderby)) {
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		} else {
			$db->orderBy("surat_tugas.id", ORDER_TYPE);
		}
	
		if ($fieldname) {
			$db->where($fieldname, $fieldvalue); // Filter berdasarkan nama field tunggal
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
	
		if ($db->getLastError()) {
			$this->set_page_error();
		}
	
		$page_title = $this->view->page_title = "Surat Tugas";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
	
		$this->render_view("surat_tugas/list.php", $data); // Render halaman penuh
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
		$fields = array(
			"id",
			"Nama_Tim_Kerja",
			"Nomor",
			"Jenis_Kegiatan",
			"Kode_Sensus",
			"Subkode_Sensus",
			"Bagian_Sensus",
			"Kode_Klasifikasi",
			"Subkode_Klasifikasi",
			"Bagian_Klasifikasi",
			"Nama_Kegiatan",
			"Tanggal_Surat",
			"Nomor_Surat",
			"Nama_Yang_di_Tugaskan",
			"Bertugas_Sebagai",
			"Rentang_Waktu_Penugasan",
			"Pembebanan"
		);
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("surat_tugas.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Surat Tugas";
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
		return $this->render_view("surat_tugas/view.php", $record);
	}

	public function tambah()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Check if 'jenis' is set and not empty
			if (isset($_POST['jenis'])) {
				$selectedJenis = $_POST['jenis'];
				if ($selectedJenis == 'dinas'){
					// Pass 'jenis_surtug' to the view
					$this->view->jenis_surtug = $selectedJenis;
					return $this->render_view("surat_tugas/add.php");
				} else if($selectedJenis == 'pelatihan'){
					$this->view->jenis_surtug = $selectedJenis;
					return $this->render_view("surat_tugas/pelatihan/add.php");
					// return $this->render_view("errors/coming soon.php");
				} else {
					$this->view->jenis_surtug = $selectedJenis;
					return $this->render_view("surat_tugas/upload_form.php");
					// return $this->render_view("errors/coming soon.php");
				}
			} else {
				echo "No jenis selected.";
			}
		}
	}

	public function downloadTemplateExcel() {
		$file = __DIR__ . '/../../assets/template/surat_tugas_template.xlsx'; // Path to your Excel template
	
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="' . basename($file) . '"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
		} else {
			throw new Exception("File template tidak ditemukan");
		}
	}
	
	
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null) {
		if ($formdata) {
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
	
			// Fillable fields
			$fields = $this->fields = array(
				'Nama_Tim_Kerja',
				'Nomor',
				'Jenis_Kegiatan',
				'Kode_Sensus',
				'Subkode_Sensus',
				'Bagian_Sensus',
				'Kode_Klasifikasi',
				'Subkode_Klasifikasi',
				'Bagian_Klasifikasi',
				'Nama_Kegiatan',
				'Tanggal_Surat',
				'Nomor_Surat',
				'Nama_Yang_di_Tugaskan',
				'Bertugas_Sebagai',
				'Rentang_Waktu_Penugasan',
				'Pembebanan',
				'Surat_Pemanggilan',
				'jenis_surtug'
			);
	
			// Format request data
			$postdata = $this->format_request_data($formdata);
	
			// Validation rules
			$this->rules_array = array(
				'Nama_Tim_Kerja' => 'required',
				'Nomor' => 'required', // Will be dynamically generated later
				'Jenis_Kegiatan' => 'required',
				'Nama_Kegiatan' => 'required',
				'Tanggal_Surat' => 'required',
				'Nomor_Surat' => 'required',
				// 'Nama_Yang_di_Tugaskan' => 'required',
				// 'Bertugas_Sebagai' => 'required',
				// 'Rentang_Waktu_Penugasan' => 'required',
				'jenis_surtug' => 'required'
			);
	
			// Sanitize fields
			$this->sanitize_array = array_fill_keys($fields, 'sanitize_string');
			$this->filter_vals = true; // Set whether to remove empty fields
	
			// Validate form data
			$modeldata = $this->modeldata = $this->validate_form($postdata);
	
			// Check if the form data is validated
			if ($this->validated()) {
				// If jenis_surtug is 'pendataan', process the uploaded Excel file
				if (isset($modeldata['jenis_surtug']) && $modeldata['jenis_surtug'] === 'pendataan') {
					if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
						// Process the Excel file
						$file = $_FILES['file']['tmp_name'];
						$excelData = $this->processExcel($file, $modeldata['Nomor']);
						// $lastRowNumber = $excelData['Nomor']; // Get the last row number from the Excel data
	
						// For each row in the Excel file, duplicate form data and merge with Excel data
						foreach ($excelData as $row) {
							$mergedData = array_merge($modeldata, $row);
							
							// Modify Nomor_Surat
							if (isset($mergedData['Nomor_Surat'])) {
								// Replace the first 5 characters with the lastRowNumber
								$newNomorSurat = $row['Nomor'] . substr($mergedData['Nomor_Surat'], 5);
								$mergedData['Nomor_Surat'] = $newNomorSurat; // Update Nomor_Surat in merged data
							}
	
							$mergedDataList[] = $mergedData;  // Collect all merged data
							$db->insert($tablename, $mergedData);  // Save to DB
						}
	
						// Generate one Word document with all records
						$this->generateToWord($mergedDataList);
						$this->set_flash_msg("Records added successfully from Excel", "success");
						return $this->redirect("surat_tugas");
					} else {
						$this->set_flash_msg("No file uploaded or there was an upload error", "danger");
					}
				} else {
					// Insert the record for other jenis_surtug values
					$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
					
					if ($rec_id) {
						// Generate Word document if 'jenis_surtug' is 'pelatihan'
						if ($modeldata['jenis_surtug'] == 'pelatihan') {
							if ($this->generateWord($modeldata, $rec_id)) {
								$this->set_flash_msg("Record added and document generated successfully", "success");
							} else {
								$this->set_flash_msg("Record added but failed to generate document", "danger");
							}
						} else {
							// If it's not 'pelatihan', just add a success message
							$this->set_flash_msg("Record added successfully", "success");
						}
						return $this->redirect("surat_tugas");
					} else {
						$this->set_page_error();
					}
				}
			}
		}
	
		// Page title for the view
		$page_title = $this->view->page_title = "Tambah Surat Tugas";
		$this->render_view("surat_tugas/add.php");
	}
	
	// function add($formdata = null) {
	// 	if ($formdata) {
	// 		$db = $this->GetModel();
	// 		$tablename = $this->tablename;
	// 		$request = $this->request;
	
	// 		// Fillable fields
	// 		$fields = $this->fields = array(
	// 			'Nama_Tim_Kerja',
	// 			'Nomor',
	// 			'Jenis_Kegiatan',
	// 			'Kode_Sensus',
	// 			'Subkode_Sensus',
	// 			'Bagian_Sensus',
	// 			'Kode_Klasifikasi',
	// 			'Subkode_Klasifikasi',
	// 			'Bagian_Klasifikasi',
	// 			'Nama_Kegiatan',
	// 			'Tanggal_Surat',
	// 			'Nomor_Surat',
	// 			'Nama_Yang_di_Tugaskan',
	// 			'Bertugas_Sebagai',
	// 			'Rentang_Waktu_Penugasan',
	// 			'Pembebanan',
	// 			'Surat_Pemanggilan',
	// 			'jenis_surtug'
	// 		);
	
	// 		// Format request data
	// 		$postdata = $this->format_request_data($formdata);
	
	// 		// Check if jenis_surtug is 'pendataan'
	// 		if (isset($postdata['jenis_surtug']) && $postdata['jenis_surtug'] === 'pendataan') {
	// 			// If jenis_surtug is 'pendataan', process the uploaded Excel file
	// 			if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
	// 				// Process the Excel file
	// 				$file = $_FILES['file']['tmp_name'];
	// 				$this->processExcel($file);
	
	// 				// Flash message for success
	// 				$this->set_flash_msg("Records added successfully from Excel", "success");
	// 				return $this->redirect("surat_tugas");
	// 			} else {
	// 				$this->set_flash_msg("No file uploaded or there was an upload error", "danger");
	// 			}
	// 		} else {
	// 			// Validation rules
	// 			$this->rules_array = array(
	// 				'Nama_Tim_Kerja' => 'required',
	// 				'Nomor' => 'required',
	// 				'Jenis_Kegiatan' => 'required',
	// 				'Nama_Kegiatan' => 'required',
	// 				'Tanggal_Surat' => 'required',
	// 				'Nomor_Surat' => 'required',
	// 				'Nama_Yang_di_Tugaskan' => 'required',
	// 				'Bertugas_Sebagai' => 'required',
	// 				'Rentang_Waktu_Penugasan' => 'required',
	// 				'jenis_surtug' => 'required'
	// 			);
	
	// 			// Sanitize fields
	// 			$this->sanitize_array = array_fill_keys($fields, 'sanitize_string');
	// 			$this->filter_vals = true; // Set whether to remove empty fields
	
	// 			// Validate form data
	// 			$modeldata = $this->modeldata = $this->validate_form($postdata);
				
	// 			// Check if the form data is validated
	// 			if ($this->validated()) {
	// 				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
					
	// 				if ($rec_id) {
	// 					// Generate Word document if 'jenis_surtug' is 'pelatihan'
	// 					if ($modeldata['jenis_surtug'] == 'pelatihan') {
	// 						if ($this->generateWord($modeldata, $rec_id)) {
	// 							$this->set_flash_msg("Record added and document generated successfully", "success");
	// 						} else {
	// 							$this->set_flash_msg("Record added but failed to generate document", "danger");
	// 						}
	// 					} else {
	// 						// If it's not 'pelatihan', just add a success message
	// 						$this->set_flash_msg("Record added successfully", "success");
	// 					}
	// 					return $this->redirect("surat_tugas");
	// 				} else {
	// 					$this->set_page_error();
	// 				}
	// 			}
	// 		}
	// 	}
		
	// 	// Page title for the view
	// 	$page_title = $this->view->page_title = "Tambah Surat Tugas";
	// 	$this->render_view("surat_tugas/add.php");
	// }
	
	
	// // public function uploadForm() {
    // //     $this->view->render('surat_tugas/upload_form.php');
    // // }

    // // public function upload() {
	// // 	if ($_FILES['file']['name']) {
    // //         $file = $_FILES['file']['tmp_name'];
    // //         $this->processExcel($file);
    // //     }
    // //     $this->render_view("surat_tugas/upload.php");
    // // }

	private function processExcel($file, $startingNomor) {
		// Load the XLSX file using SimpleXLSX
		if ($xlsx = SimpleXLSX::parse($file)) {
			// Get the rows from the first sheet
			$rows = $xlsx->rows();
			$excelData = [];
			$nomor = $startingNomor;  // Initialize nomor from the starting value

			// Loop through each row in the Excel file
			foreach (array_slice($rows, 1) as $row) {
				// Assuming the structure of your data starts from row 1 without headers
				$data = [
					'Nama_Yang_di_Tugaskan' => isset($row[0]) ? $row[0] : null,
					'Rentang_Waktu_Penugasan' => isset($row[1]) ? $row[1] : null,
					'Bertugas_Sebagai' => isset($row[2]) ? $row[2] : null,
					'Kecamatan' => isset($row[3]) ? $row[3] : null,
					'Nomor' => $nomor // Increment Nomor for each row
				];
				
				// Add the data to excelData array
				$excelData[] = $data;
				
				$nomor++;  // Increment nomor for the next row
			}
			
			// $this->saveRecord($data);
			return $excelData;
		} else {
			// Handle the case where the file cannot be parsed
			throw new Exception('Error: ' . SimpleXLSX::parseError());
		}
	}

	// function addPendataan($formdata = null) {
	// 	if ($formdata) {
	// 		$db = $this->GetModel();
	// 		$tablename = $this->tablename;
	
	// 		// Get form data
	// 		$postdata = $this->format_request_data($formdata);
	
	// 		// Define the form fields and validation rules
	// 		$this->rules_array = array(
	// 			'Nama_Tim_Kerja' => 'required',
	// 			'Nomor' => 'required',  // Will be dynamically generated later
	// 			'Jenis_Kegiatan' => 'required',
	// 			'Nama_Kegiatan' => 'required',
	// 			'Tanggal_Surat' => 'required',
	// 			'Nomor_Surat' => 'required'
	// 		);
	
	// 		$this->sanitize_array = array(
	// 			'Nama_Tim_Kerja' => 'sanitize_string',
	// 			'Nomor' => 'sanitize_string',
	// 			'Jenis_Kegiatan' => 'sanitize_string',
	// 			'Nama_Kegiatan' => 'sanitize_string',
	// 			'Tanggal_Surat' => 'sanitize_string',
	// 			'Nomor_Surat' => 'sanitize_string'
	// 		);
	
	// 		$modeldata = $this->modeldata = $this->validate_form($postdata);
	
	// 		if ($this->validated()) {
	// 			// Process Excel upload if valid
	// 			if (!empty($_FILES['file']['tmp_name'])) {
	// 				// Starting number for "Nomor"
	// 				$startingNomor = $modeldata['Nomor'];
					
	// 				$excelData = $this->processExcel($_FILES['file']['tmp_name'], $startingNomor);

	// 				$lastRowNumber = $excelData['Nomor'];
	
	// 				// For each row in the Excel file, duplicate form data and merge with Excel data
	// 				foreach ($excelData as $row) {
	// 					$mergedData = array_merge($modeldata, $row);

	// 					// Modify Nomor_Surat
	// 					if (isset($mergedData['Nomor_Surat'])) {
	// 						// Replace the first 5 characters with the lastRowNumber
	// 						$newNomorSurat = $row['Nomor'] . substr($mergedData['Nomor_Surat'], 5);
	// 						$mergedData['Nomor_Surat'] = $newNomorSurat; // Update Nomor_Surat in merged data
	// 					}

	// 					$mergedDataList[] = $mergedData;  // Collect all merged data
	// 					$db->insert($tablename, $mergedData);  // Save to DB
	// 				}
					
	// 				// Generate one Word document with all records
	// 				$this->generateToWord($mergedDataList);
	// 				// 
	// 				$this->set_flash_msg("Record added and documents generated successfully", "success");
	// 				return $this->redirect("surat_tugas");
	// 			} else {
	// 				$this->set_page_error();
	// 			}
	// 		}
	// 	}
	
	// 	$page_title = $this->view->page_title = "Tambah Surat Tugas";
	// 	$this->render_view("surat_tugas/add.php");
	// }

	// private function processExcel($file) {
	// 	// Load the Excel file
	// 	if ($xlsx = SimpleXLSX::parse($file)) {
	// 		// Iterate through the rows
	// 		foreach ($xlsx->rows() as $row) {
	// 			$data = [
	// 				'Nama_Tim_Kerja' => isset($row[0]) ? $row[0] : null,
	// 				'Jenis_Kegiatan' => isset($row[1]) ? $row[1] : null,
	// 				'Kode_Sensus' => isset($row[2]) ? $row[2] : null,
	// 				'Subkode_Sensus' => isset($row[3]) ? $row[3] : null,
	// 				'Bagian_Sensus' => isset($row[4]) ? $row[4] : null,
	// 				'Kode_Klasifikasi' => isset($row[5]) ? $row[5] : null,
	// 				'Subkode_Klasifikasi' => isset($row[6]) ? $row[6] : null,
	// 				'Bagian_Klasifikasi' => isset($row[7]) ? $row[7] : null,
	// 				'Nama_Kegiatan' => isset($row[8]) ? $row[8] : null,
	// 				'Tanggal_Surat' => isset($row[9]) ? $row[9] : null,
	// 				'Nomor_Surat' => isset($row[10]) ? $row[10] : null,
	// 				'Nama_Yang_di_Tugaskan' => isset($row[11]) ? $row[11] : null,
	// 				'Bertugas_Sebagai' => isset($row[12]) ? $row[12] : null,
	// 				'Rentang_Waktu_Penugasan' => isset($row[13]) ? $row[13] : null,
	// 				'Kecamatan' => isset($row[14]) ? $row[14] : null // Adjust index if necessary
	// 			];
				
	// 			// Save the record and generate the Word file
	// 			$this->saveRecord($data);
	// 			$this->generateToWord($data);
	// 		}
	// 	} else {
	// 		// Handle error loading the file
	// 		echo SimpleXLSX::parseError();
	// 	}
	// }

	private function saveRecord($data) {
        $db = $this->GetModel();
        $tablename = 'surat_tugas';
        $db->insert($tablename, $data);
    }

    private function generateToWord($dataList) {
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(__DIR__ . '/../../assets/template/Surat Tugas Pendataan Template.docx');

		$templateProcessor->cloneBlock('block_name', count($dataList), true, true);
        foreach ($dataList as $index => $data) {
			// $indexKey = $index + 1;
			// Format Tanggal Surat
			if (isset($data['Tanggal_Surat']) && strtotime($data['Tanggal_Surat'])) {
				$date = new DateTime($data['Tanggal_Surat']);
				$formattedDate = $date->format('d') . ' ' . $this->getIndonesianMonth($date->format('m')) . ' ' . $date->format('Y');
			} else {
				// Handle the case where Tanggal_Surat is invalid
				$formattedDate = 'Invalid Date';
			}
			// Ambil karakter ke-6 dan seterusnya dari Nomor_Surat
			$substringNomorSurat = substr($data['Nomor_Surat'], 5);

			// Ganti 5 karakter pertama dengan nomor dari baris terakhir
			$nomorBaru = $data['Nomor'] . $substringNomorSurat;

			$templateProcessor->setImageValue('Logo#' . ($index + 1), [
				'path' => __DIR__ . '/../../assets/img/logo.png',
				'width' => 300,
				'height' => 153,
				'ratio' => false
			]);
			$templateProcessor->setValue('Nomor#' . ($index + 1), $nomorBaru);
			$templateProcessor->setValue('Nama_Kegiatan#' . ($index + 1), $data['Nama_Kegiatan']);
			$templateProcessor->setValue('Nama_Petugas#' . ($index + 1), $data['Nama_Yang_di_Tugaskan']);
			$templateProcessor->setValue('Sebagai#' . ($index + 1), $data['Bertugas_Sebagai']);
			$templateProcessor->setValue('Rentang_Waktu_Penugasan#' . ($index + 1), $data['Rentang_Waktu_Penugasan']);
			$templateProcessor->setValue('Tanggal_Surat#' . ($index + 1), $formattedDate);
			$templateProcessor->setValue('Kecamatan#' . ($index + 1), $data['Kecamatan']);
	
			// If it's not the last record, clone the entire page for the next record
			if ($index < count($dataList) - 1) {
				$templateProcessor->setValue('PAGE_BREAK#' . ($index + 1),  '<w:br w:type="page"/>');
			} else {
				$templateProcessor->setValue('PAGE_BREAK#' . ($index + 1), ''); // No page break after the last record
			}
		}
		// $templateProcessor->cloneBlock('block_name', 5, true, false);
		$filename = 'SuratTugas_' . $data['Tanggal_Surat'] . '.docx';
        $directory = __DIR__ . '/../../assets/surat_tugas/';
        $filepath = $directory . $filename;

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $templateProcessor->saveAs($filepath);
		
    }

	private function downloadFile($filepath) {
		if (file_exists($filepath)) {
			header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
			header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
			header('Content-Length: ' . filesize($filepath));
			readfile($filepath);
			exit;
		} else {
			throw new Exception("File not found");
		}
	}
	

    private function saveRecordAndGenerateWord($data) {
        $rec_id = $this->suratTugasModel->saveRecord($data);
        if ($rec_id) {
            $this->generateWord($data);
        }
    }

    private function generateWord($data, $rec_id) {  // Add $rec_id as a parameter
		$templatePath = __DIR__ . '/../../assets/template/Surat Tugas Pelatihan Template.docx';
		$templateProcessor = new TemplateProcessor($templatePath);
	
		// Format Tanggal Surat
		$date = new DateTime($data['Tanggal_Surat']);
		$formattedDate = $date->format('d') . ' ' . $this->getIndonesianMonth($date->format('m')) . ' ' . $date->format('Y');
	
		// Format Rentang Waktu Penugasan
		$rentangWaktu = $this->formatRentangWaktuPenugasan($data['Rentang_Waktu_Penugasan']);
	
		// Set template values
		$templateProcessor->setValues([
			'Nomor' => $data['Nomor_Surat'],
			'Nama_Kegiatan' => $data['Nama_Kegiatan'],
			'Nama_Petugas' => $data['Nama_Yang_di_Tugaskan'],
			'Sebagai' => $data['Bertugas_Sebagai'],
			'Rentang_Waktu_Penugasan' => $rentangWaktu,
			'Tanggal_Surat' => $formattedDate,
			'Surat_Pemanggilan' => $data['Surat_Pemanggilan'],
		]);
	
		$filename = 'SuratTugas_' . $rec_id . '.docx';  // Use the $rec_id for the filename
		$directory = __DIR__ . '/../../assets/surat_tugas/';
		$filepath = $directory . $filename;
	
		// Create the directory if it does not exist
		if (!is_dir($directory)) {
			mkdir($directory, 0777, true);
		}
	
		$templateProcessor->saveAs($filepath);
	
		return true;  // Return true when the file is successfully generated
	}
	

	private function getIndonesianMonth($month) {
		$months = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		return $months[$month];
	}
	
	private function formatRentangWaktuPenugasan($rentangWaktu) {
		list($startDate, $endDate) = explode(' - ', $rentangWaktu);
		$start = new DateTime($startDate);
		$end = new DateTime($endDate);
	
		if ($startDate === $endDate) {
			// Single day assignment
			return $start->format('d') . ' ' . $this->getIndonesianMonth($start->format('m')) . ' ' . $start->format('Y');
		} else {
			// Date range assignment
			return $start->format('d') . '-' . $end->format('d') . ' ' . $this->getIndonesianMonth($start->format('m')) . ' ' . $start->format('Y');
		}
	}

	function download($rec_id = null) {
		$db = $this->GetModel();
		$tablename = $this->tablename;
	
		// Retrieve the record based on the ID
		if (!empty($rec_id)) {
			$db->where("surat_tugas.id", $rec_id);
			$record = $db->getOne($tablename);
	
			if ($record) {
				// Format Tanggal_Surat for the date-based filename
				if (isset($record['Tanggal_Surat']) && strtotime($record['Tanggal_Surat'])) {
					$date = new DateTime($record['Tanggal_Surat']);
					$formattedDate = $date->format('Y-m-d'); // Adjust the format if needed
				} else {
					$formattedDate = 'unknown_date'; // Fallback if the date is invalid
				}
	
				// Possible filenames based on the generation type
				$filenameById = 'SuratTugas_' . $rec_id . '.docx';       // Filename for generateWord
				$filenameByDate = 'SuratTugas_' . $formattedDate . '.docx';  // Filename for generateToWord
	
				$directory = __DIR__ . '/../../assets/surat_tugas/';
	
				// Paths for the two possible files
				$filepathById = $directory . $filenameById;
				$filepathByDate = $directory . $filenameByDate;
	
				// Check if either file exists and download the correct one
				if (file_exists($filepathById)) {
					// Download file by ID
					$this->downloadFile($filepathById);
				} elseif (file_exists($filepathByDate)) {
					// Download file by Date
					$this->downloadFile($filepathByDate);
				} else {
					$this->set_flash_msg("File not found", "danger");
					return $this->redirect("surat_tugas");
				}
			} else {
				$this->set_flash_msg("Record not found", "danger");
				return $this->redirect("surat_tugas");
			}
		} else {
			$this->set_flash_msg("Invalid request", "danger");
			return $this->redirect("surat_tugas");
		}
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
		$fields = $this->fields = array(
			'id',
			'Nama_Tim_Kerja',
			'Nomor',
			'Jenis_Kegiatan',
			'Kode_Sensus',
			'Subkode_Sensus',
			'Bagian_Sensus',
			'Kode_Klasifikasi',
			'Subkode_Klasifikasi',
			'Bagian_Klasifikasi',
			'Nama_Kegiatan',
			'Tanggal_Surat',
			'Nomor_Surat',
			'Nama_Yang_di_Tugaskan',
			'Bertugas_Sebagai',
			'Rentang_Waktu_Penugasan',
			'Pembebanan');
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'Nama_Tim_Kerja' => 'required',
				'Nomor' => 'required',
				'Jenis_Kegiatan' => 'required',
				'Nama_Kegiatan' => 'required',
				'Tanggal_Surat' => 'required',
				'Nomor_Surat' => 'required',
				'Nama_Yang_di_Tugaskan' => 'required',
				'Bertugas_Sebagai' => 'required',
				'Rentang_Waktu_Penugasan' => 'required',
				'Pembebanan' => 'required'
			);
			$this->sanitize_array = array(
				'Nama_Tim_Kerja' => 'sanitize_string',
				'Nomor' => 'sanitize_string',
				'Jenis_Kegiatan' => 'sanitize_string',
				'Kode_Sensus' => 'sanitize_string',
				'Subkode_Sensus' => 'sanitize_string',
				'Bagian_Sensus' => 'sanitize_string',
				'Kode_Klasifikasi' => 'sanitize_string',
				'Subkode_Klasifikasi' => 'sanitize_string',
				'Bagian_Klasifikasi' => 'sanitize_string',
				'Nama_Kegiatan' => 'sanitize_string',
				'Tanggal_Surat' => 'sanitize_string',
				'Nomor_Surat' => 'sanitize_string',
				'Nama_Yang_di_Tugaskan' => 'sanitize_string',
				'Bertugas_Sebagai' => 'sanitize_string',
				'Rentang_Waktu_Penugasan' => 'sanitize_string',
				'Pembebanan' => 'sanitize_string'
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("surat_tugas.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("surat_tugas");
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
						return	$this->redirect("surat_tugas");
					}
				}
			}
		}
		$db->where("surat_tugas.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Surat Tugas";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("surat_tugas/edit.php", $data);
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
		$fields = $this->fields = array(
			'id',
			'Nama_Tim_Kerja',
			'Nomor',
			'Jenis_Kegiatan',
			'Kode_Sensus',
			'Subkode_Sensus',
			'Bagian_Sensus',
			'Kode_Klasifikasi',
			'Subkode_Klasifikasi',
			'Bagian_Klasifikasi',
			'Nama_Kegiatan',
			'Tanggal_Surat',
			'Nomor_Surat',
			'Nama_Yang_di_Tugaskan',
			'Bertugas_Sebagai',
			'Rentang_Waktu_Penugasan',
			'Pembebanan');
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'Nama_Tim_Kerja' => 'required',
				'Nomor' => 'required',
				'Jenis_Kegiatan' => 'required',
				'Nama_Kegiatan' => 'required',
				'Tanggal_Surat' => 'required',
				'Nomor_Surat' => 'required',
				'Nama_Yang_di_Tugaskan' => 'required',
				'Bertugas_Sebagai' => 'required',
				'Rentang_Waktu_Penugasan' => 'required',
				'Pembebanan' => 'required'
			);
			$this->sanitize_array = array(
				'Nama_Tim_Kerja' => 'sanitize_string',
				'Nomor' => 'sanitize_string',
				'Jenis_Kegiatan' => 'sanitize_string',
				'Kode_Sensus' => 'sanitize_string',
				'Subkode_Sensus' => 'sanitize_string',
				'Bagian_Sensus' => 'sanitize_string',
				'Kode_Klasifikasi' => 'sanitize_string',
				'Subkode_Klasifikasi' => 'sanitize_string',
				'Bagian_Klasifikasi' => 'sanitize_string',
				'Nama_Kegiatan' => 'sanitize_string',
				'Tanggal_Surat' => 'sanitize_string',
				'Nomor_Surat' => 'sanitize_string',
				'Nama_Yang_di_Tugaskan' => 'sanitize_string',
				'Bertugas_Sebagai' => 'sanitize_string',
				'Rentang_Waktu_Penugasan' => 'sanitize_string',
				'Pembebanan' => 'sanitize_string'
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("surat_tugas.id", $rec_id);;
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
		$db->where("surat_tugas.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("surat_tugas");
	}

}
