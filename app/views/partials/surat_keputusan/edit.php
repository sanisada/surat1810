<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Edit SK</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("surat_keputusan/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="ctrl-Nomor">Nomor <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-Nomor" value="<?php  echo $data['Nomor']; ?>" type="text" placeholder="Enter Nomor" required="" name="Nomor" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="ctrl-Tanggal_Surat">Tanggal Surat <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-Tanggal_Surat" class="form-control" type="date" name="Tanggal_Surat" value="<?php  echo $data['Tanggal_Surat']; ?>" required="">
                                                <!-- <div id="tanggal_display" class="mt-2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="ctrl-Perihal">Perihal <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-Perihal" value="<?php  echo $data['Perihal']; ?>" type="text" placeholder="Enter Perihal" required="" name="Perihal" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="ctrl-Catatan">Catatan <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-Catatan" value="<?php  echo $data['Catatan']; ?>" type="text" placeholder="Enter Catatan" required="" name="Catatan" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="ctrl-Waktu_Pelaksanaan">Waktu Pelaksanaan</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-Waktu_Pelaksanaan" value="<?php  echo $data['Waktu_Pelaksanaan']; ?>" type="text" placeholder="Enter Waktu Pelaksanaan" name="Waktu_Pelaksanaan" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="file-upload"><h6>Upload PDF File</h6></label><br/>

                                        </div>
                                        <div class="col-sm-8">
                                            <input type="file" name="file_pdf" id="file-upload" accept=".pdf" />
                                            <?php if (!empty($data['file_pdf'])): ?>
                                                <small>File saat ini: <?php echo htmlspecialchars($data['file_pdf']); ?></small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-ajax-status"></div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary" type="submit">
                                        Update
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

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const input = document.getElementById('ctrl-Tanggal_Surat');
    const display = document.getElementById('tanggal_display');
    
    input.addEventListener('change', function() {
      const tanggal = new Date(this.value);
      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      const formattedDate = tanggal.toLocaleDateString('id-ID', options);
      display.innerText = formattedDate;
    });
  });
</script>