<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Administrasi Umum</h2><br/>
            <!-- Section to upload a new Word or PDF file -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Upload File Word atau PDF</h4>
                </div>
                <div class="card-body">
                    <!-- <form action="<?= print_link("dokumentasi/upload_file") ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="file">Pilih File (Word atau PDF):</label>
                            <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Unggah File</button>
                    </form> -->
                    <form action="<?php echo print_link('dokumentasi/upload_file'); ?>" method="post" enctype="multipart/form-data">
    <label for="file">Upload File (PDF/DOC/DOCX):</label>
    <input type="file" name="file" id="file" required>
    <button type="submit">Upload</button>
</form>
                </div>
            </div>

            <!-- Section to download the existing file -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Download File</h4>
                </div>
                <div class="card-body">
                    <?php if (!empty($view_data['file_url'])): ?>
                        <?php echo $view_data['file_url'] ?>
                        <iframe src="<?php  $view_data['file_url']  ?>" class="pdf-container"></iframe>
                        <a href="<?php $view_data['file_url'] ?>" class="btn btn-primary" target="_blank">Baca Online</a>
                        <a href="<?= $file_url ?>" class="btn btn-success">Download File</a>
                    <?php else: ?>
                        <p>Tidak ada file yang tersedia untuk diunduh.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
