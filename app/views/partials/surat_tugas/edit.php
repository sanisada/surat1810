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
                    <h4 class="record-title">Edit  Surat Tugas</h4>
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("surat_tugas/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Nama_Tim_Kerja">Nama Tim Kerja <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select id="ctrl-Nama_Tim_Kerja" name="Nama_Tim_Kerja" placeholder="-- Pilih --" class="custom-select">
                                                        <option value="">-- Pilih --</option>
                                                        <option value="18100">18100 - Umum Kantor</option>
                                                        <?php
                                                            $rec = $data['Nama_Tim_Kerja'];
                                                            $Nama_Tim_Kerja_options = $comp_model -> suratkeluar_Nama_Tim_Kerja_option_list();
                                                            if(!empty($Nama_Tim_Kerja_options)){
                                                            foreach($Nama_Tim_Kerja_options as $option){
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $selected = ( $value == $rec ? 'selected' : null );
                                                            ?>
                                                            <option 
                                                                <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $label; ?>
                                                            </option>
                                                            <?php
                                                            }
                                                            }
                                                        ?>
                                                    </select>
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
                                                        <input id="ctrl-Tanggal_Surat" class="form-control" type="date" value="<?php  echo $data['Tanggal_Surat']; ?>" name="Tanggal_Surat">
                                                        <!-- <div id="tanggal_display" class="mt-2"></div> -->
                                                    </div>
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
                                                    <input id="ctrl-Nomor_Surat"  value="<?php  echo $data['Nomor_Surat']; ?>" type="text" placeholder="Enter Nomor Surat" name="Nomor_Surat"  class="form-control " />
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
                                                        <input id="ctrl-Nama_Yang_di_Tugaskan"  value="<?php  echo $data['Nama_Yang_di_Tugaskan']; ?>" type="text" placeholder="Enter Nama Yang Di Tugaskan" name="Nama_Yang_di_Tugaskan"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="Nama_Kegiatan">Nama Kegiatan <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-Nama_Kegiatan"  value="<?php  echo $data['Nama_Kegiatan']; ?>" type="text" placeholder="Enter Nama Kegiatan"  name="Nama_Kegiatan"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="Bertugas_Sebagai">Bertugas Sebagai <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-Bertugas_Sebagai"  value="<?php  echo $data['Bertugas_Sebagai']; ?>" type="text" placeholder="Enter Bertugas Sebagai"  name="Bertugas_Sebagai"  class="form-control " />
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
                                                                    <input class="form-control" type="date" id="datepicker-start" value="<?php echo date('Y-m-d', strtotime(explode(' - ', $data['Rentang_Waktu_Penugasan'])[0])); ?>">
                                                                    <input class="form-control" type="date" id="datepicker-end" value="<?php echo date('Y-m-d', strtotime(explode(' - ', $data['Rentang_Waktu_Penugasan'])[1])); ?>">
                                                                    <input type="hidden" id="Rentang_Waktu_Penugasan" name="Rentang_Waktu_Penugasan" value="<?php  echo $data['Rentang_Waktu_Penugasan']; ?>">
                                                                </div>
                                                            </div>
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
