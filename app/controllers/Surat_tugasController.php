<?php 
/**
 * Surat_tugas Page Controller
 * @category  Controller
 */
use PhpOffice\PhpWord\PhpWord;
// use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

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
			"Pembebanan"
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
				    $page_title = $this->view->page_title = "Tambah Surat Tugas";
					return $this->render_view("surat_tugas/add.php");
				} else if($selectedJenis == 'pelatihan'){
					// return $this->render_view("surat_tugas/upload_form.php");
					return $this->render_view("errors/error_coming_soon.php");
				} else {
					// return $this->render_view("surat_tugas/list.php");
					return $this->render_view("errors/error_coming_soon.php");
				}
			} else {
				echo "No jenis selected.";
			}
		}        
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
			$fields = $this->fields = array('Nama_Tim_Kerja',
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
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
                $rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
                if($rec_id){
                    // if($this->generateWord($modeldata)){
                        $this->set_flash_msg("Record added successfully", "success");
                        return $this->redirect("surat_tugas");
                    // } else {
                        // $this->set_flash_msg("Failed to generate document", "danger");
                    // }
                } else {
                    $this->set_page_error();
                }
            }
		}
		$page_title = $this->view->page_title = "Tambah Surat Tugas";
		$this->render_view("surat_tugas/add.php");
	}

	// private function generateWord($data) {
    //     $templatePath = __DIR__ . '/../../assets/Surat Tugas Template.docx';
	// 	$templateProcessor = new TemplateProcessor($templatePath);

	// 	// Format the date
	// 	$date = new DateTime($data['Tanggal_Surat']);
	// 	$formattedDate = $date->format('d') . ' ' . $this->getIndonesianMonth($date->format('m')) . ' ' . $date->format('Y');

	// 	// Format the Rentang Waktu Penugasan
	// 	$rentangWaktu = $this->formatRentangWaktuPenugasan($data['Rentang_Waktu_Penugasan']);

	// 	// Set template values
	// 	$templateProcessor->setValues([
	// 		'Nomor' => $data['Nomor_Surat'],
	// 		'Nama_Kegiatan' => $data['Nama_Kegiatan'],
	// 		'Nama_Petugas' => $data['Nama_Yang_di_Tugaskan'],
	// 		'Sebagai' => $data['Bertugas_Sebagai'],
	// 		'Rentang_Waktu_Penugasan' => $rentangWaktu,
	// 		'Tanggal_Surat' => $formattedDate
	// 	]);

	// 	$filename = 'SuratTugas_' . time() . '.docx';
	// 	$directory = __DIR__ . '/../../assets/surat_tugas/';
	// 	$filepath = $directory . $filename;

	// 	// Create the directory if it does not exist
	// 	if (!is_dir($directory)) {
	// 		mkdir($directory, 0777, true);
	// 	}

	// 	// Save the file
	// 	try {
	// 		$templateProcessor->saveAs($filepath);

	// 		// Check if the file exists
	// 		if (file_exists($filepath)) {
	// 			// Redirect to the generated file
	// 			header('Location: ' . '/assets/surat_tugas/' . $filename);
	// 			exit;
	// 		} else {
	// 			throw new Exception("File not created");
	// 		}
	// 	} catch (Exception $e) {
	// 		error_log("Error creating document: " . $e->getMessage());
	// 		return false;
	// 	}
        
    // }
	
	public function uploadForm() {
        $this->view->render('surat_tugas/upload_form.php');
    }

    public function upload() {
        if ($_FILES['file']['name']) {
            $filePath = $_FILES['file']['tmp_name'];
            $spreadsheet = IOFactory::load($filePath);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            foreach ($sheetData as $row) {
                // Skip header row
                if ($row['A'] == 'Nama_Tim_Kerja') {
                    continue;
                }

                $data = [
                    'Nama_Tim_Kerja' => $row['A'],
                    'Jenis_Kegiatan' => $row['B'],
                    'Kode_Sensus' => $row['C'],
                    'Subkode_Sensus' => $row['D'],
                    'Bagian_Sensus' => $row['E'],
                    'Kode_Klasifikasi' => $row['F'],
                    'Subkode_Klasifikasi' => $row['G'],
                    'Bagian_Klasifikasi' => $row['H'],
                    'Nama_Kegiatan' => $row['I'],
                    'Tanggal_Surat' => $row['J'],
                    'Nomor_Surat' => $row['K'],
                    'Nama_Yang_di_Tugaskan' => $row['L'],
                    'Bertugas_Sebagai' => $row['M'],
                    'Rentang_Waktu_Penugasan' => $row['N'],
					'Pembebanan' => $row['O']
                ];

                $this->saveRecordAndGenerateWord($data);
            }

            $this->view->set_flash_msg("Upload and processing complete.", "success");
            return $this->redirect("surat_tugas");
        }
    }

    private function saveRecordAndGenerateWord($data) {
        $rec_id = $this->suratTugasModel->saveRecord($data);
        if ($rec_id) {
            $this->generateWord($data);
        }
    }

    private function generateWord($data) {
        $templatePath = __DIR__ . '/../../assets/Surat Tugas Template.docx';
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
            'Tanggal_Surat' => $formattedDate
        ]);

        $filename = 'SuratTugas_' . time() . '.docx';
        $directory = __DIR__ . '/../../assets/surat_tugas/';
        $filepath = $directory . $filename;

        // Create the directory if it does not exist
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $templateProcessor->saveAs($filepath);
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

	public function download($id) {
        $db = $this->GetModel();
        $surat = $db->where('id', $id)->getOne('surat_tugas');
        // $pegawai_ids = $db->where('id', $id)->get('surat_tugas', null, 'pegawai_id');
        // $pegawai_ids = array_column($pegawai_ids, 'pegawai_id');

        // Generate Word Document
		if ($surat) {
            // Generate Word Document
            $this->generateWord($surat);
        } else {
            echo "Surat Tugas not found!";
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
