<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add" data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php if ($show_header): ?>
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="record-title">Tambah SOP</h4>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class="bg-light p-3 animated fadeIn page-content">
                        <form id="dokumentasi-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("dokumentasi/add?csrf_token=$csrf_token") ?>" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="Kategori">Kategori <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select id="ctrl-Kategori" name="Kategori" placeholder="-- Pilih --" class="custom-select" required>
                                            <option value="">-- Pilih --</option>
                                            <?php 
                                            $Kategori_options = $comp_model->dokumentasi_Kategori_option_list();
                                            if (!empty($Kategori_options)) {
                                                foreach ($Kategori_options as $option) {
                                                    $value = !empty($option['value']) ? $option['value'] : null;
                                                    $label = !empty($option['label']) ? $option['label'] : $value;
                                                    $selected = $this->set_field_selected('Kategori', $value, "");
                                                    echo "<option $selected value=\"$value\">$label</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="Nomor_SOP">Nomor SOP <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="ctrl-Nomor_SOP" value="<?php echo $this->set_field_value('Nomor_SOP'); ?>" type="text" placeholder="Enter Nomor" name="Nomor_SOP" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="Judul">Judul</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="ctrl-Judul" value="<?php echo $this->set_field_value('Judul', ""); ?>" type="text" placeholder="Enter Judul" name="Judul" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="ctrl-Tanggal_Pembuatan">Tanggal Pembuatan</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="ctrl-Tanggal_Pembuatan" class="form-control" type="date" name="Tanggal_Pembuatan" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="ctrl-Tanggal_Revisi">Tanggal Revisi</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="ctrl-Tanggal_Revisi" class="form-control" type="date" name="Tanggal_Revisi" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="ctrl-Tanggal_Efektif">Tanggal Efektif</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="ctrl-Tanggal_Efektif" class="form-control" type="date" name="Tanggal_Efektif" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="file-upload"><h6>Upload Word File</h6></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="file" name="file_word" id="file-upload" accept=".docx, .doc" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="file-upload"><h6>Upload PDF File</h6></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="file" name="file_pdf" id="file-upload" accept=".pdf"/>
                                    </div>
                                </div>
                            </div>
                            <div id="submit-btn" class="form-group form-submit-btn-holder text-center mt-3">
                                <div class="form-ajax-status"></div>
                                <button class="btn btn-md btn-primary" type="submit">
                                    Submit
                                    <i class="fa fa-send"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
