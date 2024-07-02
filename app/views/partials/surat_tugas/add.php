<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Tambah Surat Tugas</h4>
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
                        <form id="surat_tugas-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("surat_tugas/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="ctrl-Tanggal_Surat">Tanggal Surat <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input id="ctrl-Tanggal_Surat" class="form-control" type="date" name="Tanggal_Surat" required="">
                                                    <!-- <div id="tanggal_display" class="mt-2"></div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Nomor_Surat">Nomor Surat <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-Nomor_Surat"  value="<?php  echo $this->set_field_value('Nomor_Surat',""); ?>" type="text" placeholder="Enter Nomor Surat"  required="" name="Nomor_Surat"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="Nama_Yang_di_Tugaskan">Nama Yang Di Tugaskan <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-Nama_Yang_di_Tugaskan"  value="<?php  echo $this->set_field_value('Nama_Yang_di_Tugaskan',""); ?>" type="text" placeholder="Enter Nama Yang Di Tugaskan"  required="" name="Nama_Yang_di_Tugaskan"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="Isi_Tugas">Isi Tugas <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-Isi_Tugas"  value="<?php  echo $this->set_field_value('Isi_Tugas',""); ?>" type="text" placeholder="Enter Isi Tugas"  required="" name="Isi_Tugas"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="Rentang_Waktu_Penugasan">Rentang Waktu Penugasan <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <!-- <input id="ctrl-Rentang_Waktu_Penugasan"  value="<?php  echo $this->set_field_value('Rentang_Waktu_Penugasan',""); ?>" type="text" placeholder="Enter Rentang Waktu Penugasan"  required="" name="Rentang_Waktu_Penugasan"  class="form-control " /> -->
                                                                    <input class="form-control" type="date" id="datepicker-start">
                                                                    <input class="form-control" type="date" id="datepicker-end">
                                                                    <input type="hidden" id="Rentang_Waktu_Penugasan" name="Rentang_Waktu_Penugasan">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group form-submit-btn-holder text-center mt-3">
                                                    <div class="form-ajax-status"></div>
                                                    <button class="btn btn-primary" type="submit">
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

    document.addEventListener('DOMContentLoaded', function() {
        // Menangani perubahan pada input tanggal awal
        document.getElementById('datepicker-start').addEventListener('change', function() {
            updateRentangWaktu();
        });

        // Menangani perubahan pada input tanggal akhir
        document.getElementById('datepicker-end').addEventListener('change', function() {
            updateRentangWaktu();
        });

        // Fungsi untuk menggabungkan nilai dari kedua datepicker
        function updateRentangWaktu() {
            var startDate = document.getElementById('datepicker-start').value;
            var endDate = document.getElementById('datepicker-end').value;

            // Gabungkan nilai ke format yang diinginkan, misalnya: "YYYY-MM-DD - YYYY-MM-DD"
            var rentangWaktu = startDate + ' - ' + endDate;

            // Set nilai pada input hidden
            document.getElementById('Rentang_Waktu_Penugasan').value = rentangWaktu;
        }
    });
</script>
