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
	
	public function index() {
        $page_title = $this->view->page_title = "Dokumentasi SOP";
        $this->render_view("dokumentasi/list.php");
    }

	function administrasi_umum() {
		// Initialize $view_data array
		$this->view_data = array();
	
		$file_directory = __DIR__ . '/../../assets/dokumentasi/';
		$pdf_file = 'administrasi_umum.pdf';
		$word_file = 'administrasi_umum.docx';
	
		// Check if PDF exists for display
		if (file_exists($file_directory . $pdf_file)) {
			$this->view_data['pdf_url'] = print_link("assets/dokumentasi/$pdf_file");
		} else {
			$this->view_data['pdf_url'] = '';
		}
	
		// Check if any file exists for download
		if (file_exists($file_directory . $pdf_file)) {
			$this->view_data['file_url'] = print_link("assets/dokumentasi/$pdf_file");
		} elseif (file_exists($file_directory . $word_file)) {
			$this->view_data['file_url'] = print_link("assets/dokumentasi/$word_file");
		} else {
			$this->view_data['file_url'] = '';
		}
	
		// Render view with $this->view_data
		$this->view->render("dokumentasi/administrasi_umum.php", $this->view_data);
	}
	

	public function upload_file() {
		// Definisikan direktori tujuan
		$file_directory = __DIR__ . '/../../assets/dokumentasi/';
		
		// Pastikan direktori tujuan ada
		if (!file_exists($file_directory)) {
			mkdir($file_directory, 0777, true);
		}
		
		// Ambil data file dari input
		$file_tmp_name = $_FILES['file']['tmp_name'];
		$file_name = $_FILES['file']['name'];
		$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
		
		// Tentukan nama file berdasarkan jenis file
		if ($file_extension == 'pdf') {
			$destination = $file_directory . 'administrasi_umum.pdf';
		} elseif ($file_extension == 'doc' || $file_extension == 'docx') {
			$destination = $file_directory . 'administrasi_umum.docx';
		} else {
			$this->set_flash_msg("Invalid file type", "danger");
			return $this->redirect("dokumentasi/administrasi_umum");
		}
		
		// Upload file ke direktori
		move_uploaded_file($file_tmp_name, $destination);
		
		// Pesan sukses
		$this->set_flash_msg("File uploaded successfully", "success");
		
		return $this->redirect("dokumentasi/administrasi_umum");
	}
	
	
	function download_file($id) {
		$db = $this->GetModel();
		
		// Ambil data file berdasarkan ID
		$db->where("id", $id);
		$file = $db->getOne("dokumen");
		
		if ($file) {
			// Set header untuk mengunduh file
			header("Content-Type: " . $file['tipe_file']);
			header("Content-Disposition: attachment; filename=\"" . $file['nama_file'] . "\"");
			header("Content-Length: " . $file['ukuran_file']);
			
			echo $file['file_data'];
			exit;
		} else {
			$this->set_flash_msg("File not found", "danger");
			return $this->redirect("dokumentasi/administrasi_umum");
		}
	}
	
}
