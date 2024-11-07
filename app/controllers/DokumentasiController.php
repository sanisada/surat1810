<?php 
/**
 * Dokumentasi Page Controller
 * @category  Controller
 */
class DokumentasiController extends SecureController{
	function __construct(){
		parent::__construct();
		// $this->tablename = "dokumentasi";
	}
	
	public function index($page, $fieldname = null, $fieldvalue = null) {
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = "dokumentasi_sop"; 
		$fields = array(
			"id",
			"Kategori",
			"Nomor_SOP",
			"Judul",
			"Tanggal_Pembuatan",
			"Tanggal_Revisi",
			"Tanggal_Efektif",
			"File_Doc",
			"File_Pdf"
		);
	
		// Map page names to Kategori values
		$kategoriMapping = [
			'administrasi_umum' => 1,
			'administrasi_keuangan' => 2,
			'administrasi_kepegawaian' => 3,
			'pmss' => 41,
			'statistik_kependudukan_ketenagakerjaan' => 421,
			'statistik_ketahanan_sosial' => 422,
			'statistik_kesejahteraan_rakyat' => 423,
			'tphp' => 431,
			'ppk' => 432,
			'industri' => 433,
			'pek' => 434,
			'harga' => 441,
			'distribusi' => 442,
			'ktip' => 443,
			'neraca_produksi' => 451,
			'neraca_pengeluaran' => 452,
			'aps' => 453,
			'diseminasi' => 46,
			'pti' => 5
		];
	
		// Set the Kategori based on the page name
		if (isset($kategoriMapping[$page])) {
			$kategori = $kategoriMapping[$page];
			$db->where('Kategori', $kategori);
		} else {
			$this->set_page_error("Invalid page category.");
			return $this->redirect("dokumentasi/list.php"); // Default view if not found
		}
	
		// Pagination
		$pagination = $this->get_pagination(MAX_RECORD_COUNT);

		// Pencarian dalam tabel
		if (!empty($request->search)) {
			$text = trim($request->search);
			$search_condition = "(
				dokumentasi_sop.Nomor_SOP LIKE ? OR 
				dokumentasi_sop.Judul LIKE ?
			)";
			$search_params = ["%$text%", "%$text%"];
			$db->where($search_condition, $search_params);
			// Load the search template view if in search mode
			$this->view->search_template = "dokumentasi/index/$page/search.php";
		}
	

		// Sorting
		if (!empty($request->orderby)) {
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		} else {
			$db->orderBy("dokumentasi_sop.id", ORDER_TYPE);
		}
	
		// Filter based on a specific field if provided
		if ($fieldname && $fieldvalue) {
			$db->where($fieldname, $fieldvalue);
		}
	
		// Fetching records with total count
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
	
		// Prepare data to send to the view
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = count($records);
		$data->total_records = intval($tc->totalCount);
		$data->pagination = $pagination;
	
		// Handle any database errors
		if ($db->getLastError()) {
			$this->set_page_error();
		}
	
		// Set view parameters
		$this->view->page_title = "SOP " . $page;
		$this->view->report_filename = date('Y-m-d') . '-' . $this->view->page_title;
		$this->view->report_title = $this->view->page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
	
		// Render the appropriate view based on the page
		$viewPath = "dokumentasi/{$page}.php";
		$this->view->render($viewPath, $data);
	}
	
	
	public function add($formdata = null) {
		if ($formdata) {
			// Check CSRF token
			Csrf::cross_check();
			$db = $this->GetModel();
        	$tablename = 'dokumentasi_sop';
			$request = $this->request;
	
			// Fillable fields
			$this->fields = array(
				'Kategori',
				'Nomor_SOP',
				'Judul',
				'Tanggal_Pembuatan',
				'Tanggal_Revisi',
				'Tanggal_Efektif',
				'File_Doc',
				'File_Pdf'
			);
	
			// Format request data
			$postdata = $this->format_request_data($formdata);
	
			// Validation rules
			$this->rules_array = array(
				'Kategori' => 'required',
				'Nomor_SOP' => 'required', // Will be dynamically generated later
				'Judul' => 'required'
			);
	
			// Sanitize fields
			$this->sanitize_array = array_fill_keys($this->fields, 'sanitize_string');
			$this->filter_vals = true; // Set whether to remove empty fields
	
			// Validate form data
			$modeldata = $this->modeldata = $this->validate_form($postdata);
	
			// Prepare data for insertion
			$data = [
				'Kategori' => $modeldata['Kategori'],
				'Nomor_SOP' => $modeldata['Nomor_SOP'], // Assuming this is generated somewhere
				'Judul' => $modeldata['Judul'],
				'Tanggal_Pembuatan' => $modeldata['Tanggal_Pembuatan'],
				'Tanggal_Revisi' => $modeldata['Tanggal_Revisi'],
				'Tanggal_Efektif' => $modeldata['Tanggal_Efektif'],
				'File_Doc' => null,
            	'File_Pdf' => null
			];

			foreach ($data as $key => $value) {
				if ($value === '') {
					$data[$key] = '-';
				}
			}
			// Handle file uploads
			$wordFile = $_FILES['file_word'];
			$pdfFile = $_FILES['file_pdf'];
			
			// Define upload directory
			$uploadDir = __DIR__ . '/../../assets/sop/';
		
			// Validate and move Word file
			if ($wordFile['error'] == UPLOAD_ERR_OK) {
				$wordFileName = uniqid() . '-' . basename($wordFile['name']);
				if (move_uploaded_file($wordFile['tmp_name'], $uploadDir . $wordFileName)) {
					$data['File_Doc'] = $wordFileName; // Save the filename to the database
				} else {
					// Handle error in moving the file
					$this->set_page_error("Failed to upload Word file.");
					return;
				}
			} else {
				// Handle upload error
				$this->set_page_error("Error uploading Word file: " . $wordFile['error']);
				return;
			}
	
			// Validate and move PDF file
			if ($pdfFile['error'] == UPLOAD_ERR_OK) {
				$pdfFileName = uniqid() . '-' . basename($pdfFile['name']);
				if (move_uploaded_file($pdfFile['tmp_name'], $uploadDir . $pdfFileName)) {
					$data['File_Pdf'] = $pdfFileName; // Save the filename to the database
				} else {
					// Handle error in moving the file
					$this->set_page_error("Failed to upload PDF file.");
					return;
				}
			} else {
				// Handle upload error
				$this->set_page_error("Error uploading PDF file: " . $pdfFile['error']);
				return;
			}
	
			// Insert the data into the database
			$insertedId = $db->insert($tablename, $data);
			
			if ($insertedId) {
				// Set success message
				$this->set_flash_msg("Data successfully added.", 'success');
				
				// Redirect based on the 'Kategori' value
				if ($data['Kategori'] == 1) {
					return $this->redirect("dokumentasi/index/administrasi_umum");
				} elseif ($data['Kategori'] == 2) {
					return $this->redirect("dokumentasi/index/administrasi_keuangan");
				} elseif ($data['Kategori'] == 3) {
					return $this->redirect("dokumentasi/index/administrasi_kepegawaian");
				} elseif ($data['Kategori'] == 41) {
					return $this->redirect("dokumentasi/index/pmss");
				} elseif ($data['Kategori'] == 42) {
					return $this->redirect("dokumentasi/index/statistik_kependudukan_ketenagakerjaan");
				} elseif ($data['Kategori'] == 421) {
					return $this->redirect("dokumentasi/index/statistik_kependudukan_ketenagakerjaan");
				}elseif ($data['Kategori'] == 422) {
					return $this->redirect("dokumentasi/index/statistik_ketahanan_sosial");
				} elseif ($data['Kategori'] == 423) {
					return $this->redirect("dokumentasi/index/statistik_kesejahteraan_rakyat");
				} elseif ($data['Kategori'] == 431) {
					return $this->redirect("dokumentasi/index/tphp");
				} elseif ($data['Kategori'] == 43) {
					return $this->redirect("dokumentasi/index/tphp");
				} elseif ($data['Kategori'] == 432) {
					return $this->redirect("dokumentasi/index/ppk");
				} elseif ($data['Kategori'] == 433) {
					return $this->redirect("dokumentasi/index/industri");
				} elseif ($data['Kategori'] == 434) {
					return $this->redirect("dokumentasi/index/pek");
				} elseif ($data['Kategori'] == 44) {
					return $this->redirect("dokumentasi/index/harga");
				} elseif ($data['Kategori'] == 441) {
					return $this->redirect("dokumentasi/index/harga");
				} elseif ($data['Kategori'] == 442) {
					return $this->redirect("dokumentasi/index/distribusi");
				} elseif ($data['Kategori'] == 443) {
					return $this->redirect("dokumentasi/index/ktip");
				} elseif ($data['Kategori'] == 45) {
					return $this->redirect("dokumentasi/index/neraca_produksi");
				} elseif ($data['Kategori'] == 451) {
					return $this->redirect("dokumentasi/index/neraca_produksi");
				} elseif ($data['Kategori'] == 452) {
					return $this->redirect("dokumentasi/index/neraca_pengeluaran");
				} elseif ($data['Kategori'] == 453) {
					return $this->redirect("dokumentasi/index/aps");
				} elseif ($data['Kategori'] == 46) {
					return $this->redirect("dokumentasi/index/diseminasi");
				} elseif ($data['Kategori'] == 5) {
					return $this->redirect("dokumentasi/index/pti");
				} 
				// Add more conditions as needed
				else {
					return $this->redirect("dokumentasi/list.php"); // Default redirect if no category matches
				}
			} else {
				// Handle database insertion error
				$this->set_page_error("Failed to add data: " . $db->getLastError());
			}
			
		}
	
		$page_title = $this->view->page_title = "Tambah SOP";
		$this->render_view("dokumentasi/add.php");
	}

	public function downloadFile($fileType, $id) {
		$db = $this->GetModel();
		$tablename = 'dokumentasi_sop';
		
		// Fetch the record by ID
		$record = $db->where('id', $id)->getOne($tablename);
		
		if (!$record) {
			$this->set_page_error("Record not found.");
			return;
		}
		
		// Define file path based on file type
		$filePath = '';
		$fileName = '';
		$uploadDir = __DIR__ . '/../../assets/sop/';
		
		if ($fileType === 'doc') {
			$fileName = $record['File_Doc'];
			$filePath = $uploadDir . $fileName;
		} elseif ($fileType === 'pdf') {
			$fileName = $record['File_Pdf'];
			$filePath = $uploadDir . $fileName;
		} else {
			$this->set_page_error("Invalid file type specified.");
			return;
		}
	
		// Check if file exists
		if (!file_exists($filePath)) {
			$this->set_page_error("File not found.");
			return;
		}
	
		// Set headers for file download
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($filePath));
	
		// Clear output buffer and read file
		ob_clean();
		flush();
		readfile($filePath);
		exit;
	}

	public function openPdf($id) {
		$db = $this->GetModel();
		$tablename = 'dokumentasi_sop';
	
		// Fetch the record by ID
		$record = $db->where('id', $id)->getOne($tablename);
		
		if (!$record || empty($record['File_Pdf'])) {
			$this->set_page_error("PDF file not found.");
			return;
		}
		
		// Define the file path
		$pdfFileName = $record['File_Pdf'];
		$uploadDir = __DIR__ . '/../../assets/sop/';
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
	
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = "dokumentasi_sop";
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("dokumentasi_sop.id", $rec_id);
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("dokumentasi/index/administrasi_umum");
	}
	
}
