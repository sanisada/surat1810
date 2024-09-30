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
                                                <label class="control-label" for="Nama_Tim_Kerja">Nama Tim Kerja <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select required="" id="ctrl-Nama_Tim_Kerja" name="Nama_Tim_Kerja" placeholder="-- Pilih --" class="custom-select">
                                                        <option value="">-- Pilih --</option>
                                                        <option value="18100">18100 - Umum Kantor</option>
                                                        <?php 
                                                        $Nama_Tim_Kerja_options = $comp_model->suratkeluar_Nama_Tim_Kerja_option_list();
                                                        if (!empty($Nama_Tim_Kerja_options)) {
                                                            foreach ($Nama_Tim_Kerja_options as $option) {
                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                $display = $value . ' - ' . $label;
                                                                $selected = $this->set_field_selected('Nama_Tim_Kerja', $value, "");
                                                                ?>
                                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                    <?php echo $display; ?>
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
                                    <!-- Nomor Field -->
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Nomor">Nomor <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-Nomor" value="<?php echo $this->set_field_value('Nomor'); ?>" type="text" placeholder="Enter Nomor" required="" name="Nomor" class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Jenis_Kegiatan">Jenis Kegiatan <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select required=""  id="ctrl-Jenis_Kegiatan" name="Jenis_Kegiatan"  placeholder="-- Pilih --"    class="custom-select" >
                                                        <option value="">-- Pilih --</option>
                                                        <?php
                                                        $Jenis_Kegiatan_options = Menu :: $Jenis_Kegiatan;
                                                        if(!empty($Jenis_Kegiatan_options)){
                                                        foreach($Jenis_Kegiatan_options as $option){
                                                        $value = $option['value'];
                                                        $label = $option['label'];
                                                        $selected = $this->set_field_selected('Jenis_Kegiatan', $value, "");
                                                        ?>
                                                        <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                            <?php echo $label ?>
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
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Kode_Sensus">Kode </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select id="ctrl-Kode_Sensus" data-load-select-options="Subkode_Sensus" name="Kode_Sensus" placeholder="-- Pilih --" class="custom-select">
                                                        <option value="">-- Pilih --</option>
                                                        <?php
                                                        $Kode_Sensus_options = Menu:: $Kode_Sensus;
                                                        if (!empty($Kode_Sensus_options)) {
                                                            foreach ($Kode_Sensus_options as $option) {
                                                                $value = $option['value'];
                                                                $label = $option['label'];
                                                                $selected = $this->set_field_selected('Kode_Sensus', $value, "");
                                                                ?>
                                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                    <?php echo $label ?>
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

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Subkode_Sensus">Subkode </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select id="ctrl-Subkode_Sensus" data-load-path="<?php print_link('api/json/suratkeluar_Subkode_Sensus_option_list') ?>" name="Subkode_Sensus" placeholder="-- Pilih --" class="custom-select">
                                                        <option value="">-- Pilih --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Bagian_Sensus">Klasifikasi </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select id="ctrl-Bagian_Sensus" name="Bagian_Sensus" placeholder="-- Pilih --" class="custom-select">
                                                        <option value="">-- Pilih --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Sub_Bagian_Sensus">Subklasifikasi </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select  id="ctrl-Sub_Bagian_Sensus" placeholder="-- Pilih --"    class="custom-select" >
                                                        <option value="">-- Pilih --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Kode_Klasifikasi">Kode </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select  id="ctrl-Kode_Klasifikasi" data-load-select-options="Subkode_Klasifikasi" name="Kode_Klasifikasi"  placeholder="-- Pilih --"    class="custom-select" >
                                                        <option value="">-- Pilih --</option>
                                                        <?php
                                                        $Kode_Klasifikasi_options = Menu :: $Kode_Klasifikasi;
                                                        if(!empty($Kode_Klasifikasi_options)){
                                                        foreach($Kode_Klasifikasi_options as $option){
                                                        $value = $option['value'];
                                                        $label = $option['label'];
                                                        $selected = $this->set_field_selected('Kode_Klasifikasi', $value, "");
                                                        ?>
                                                        <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                            <?php echo $label ?>
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
                                                <label class="control-label" for="Subkode_Klasifikasi">Subkode </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select  id="ctrl-Subkode_Klasifikasi" data-load-path="<?php print_link('api/json/suratkeluar_Subkode_Klasifikasi_option_list') ?>" name="Subkode_Klasifikasi"  placeholder="-- Pilih --"    class="custom-select" >
                                                        <option value="">-- Pilih --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Bagian_Klasifikasi">Klasifikasi </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select  id="ctrl-Bagian_Klasifikasi" name="Bagian_Klasifikasi"  placeholder="-- Pilih --"    class="custom-select" >
                                                        <option value="">-- Pilih --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Sub_Bagian_Klasifikasi">Subklasifikasi </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select  id="ctrl-Sub_Bagian_Klasifikasi" name="Sub_Bagian_Klasifikasi"  placeholder="-- Pilih --"    class="custom-select" >
                                                        <option value="">-- Pilih --</option>
                                                    </select>
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
                                                <label class="control-label" for="Nama_Kegiatan">Nama Kegiatan<span class="text-danger">*</span><br/>
                                                <small>(Diisi sesuai dengan detail pada POK)</small> </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-Nama_Kegiatan"  value="<?php  echo $this->set_field_value('Nama_Kegiatan',""); ?>" type="text" placeholder="Enter Nama Kegiatan"  required="" name="Nama_Kegiatan"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Nama_Yang_di_Tugaskan">Nama Yang Di Tugaskan <span class="text-danger">*</span><br/>
                                                <small>Tulis nama lengkap dan gelar, jika lebih dari 1 pegawai pisahkan dengan tanda koma ( , )</small></label>
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
                                                <label class="control-label" for="Bertugas_Sebagai">Bertugas Sebagai <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-Bertugas_Sebagai"  value="<?php  echo $this->set_field_value('Bertugas_Sebagai',""); ?>" type="text" placeholder="Enter Tugas Sebagai"  required="" name="Bertugas_Sebagai"  class="form-control " />
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
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="ctrl-Pembebanan">Pembebanan <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input id="ctrl-Pembebanan" class="form-control" type="text" name="Pembebanan" required="">
                                                    <!-- <div id="tanggal_display" class="mt-2"></div> -->
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
                                                    <input id="ctrl-Tanggal_Surat" class="form-control" type="date" name="Tanggal_Surat" required="">
                                                    <!-- <div id="tanggal_display" class="mt-2"></div> -->
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
                                </div>
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

    $(document).on('change', '#ctrl-Kode_Sensus, #ctrl-Subkode_Sensus', function() {
        var kodeSensus = $('#ctrl-Kode_Sensus').val();
        var subkodeSensus = $('#ctrl-Subkode_Sensus').val();
        var path = '<?php print_link('api/json/suratkeluar_Bagian_Sensus_option_list') ?>/' + encodeURIComponent(kodeSensus) + '/' + encodeURIComponent(subkodeSensus);

        $('#ctrl-Bagian_Sensus').html('<option value="">Loading...</option>');

        $.ajax({
            type: 'GET',
            url: path,
            dataType: 'json',
            success: function(data) {
                var options = '<option value="">-- Pilih --</option>';
                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].value + '">' + data[i].label + '</option>';
                }
                $('#ctrl-Bagian_Sensus').html(options);
            },
            error: function(data) {
                $('#ctrl-Bagian_Sensus').html('<option value="">-- Pilih --</option>');
            }
        });
    });

    $(document).on('change', '#ctrl-Kode_Sensus, #ctrl-Subkode_Sensus, #ctrl-Bagian_Sensus', function() {
        var kodeSensus = $('#ctrl-Kode_Sensus').val();
        var subkodeSensus = $('#ctrl-Subkode_Sensus').val();
        var bagianSensus = $('#ctrl-Bagian_Sensus').val();
        var path = '<?php print_link('api/json/suratkeluar_Sub_Bagian_Sensus_option_list') ?>/' + encodeURIComponent(kodeSensus) + '/' + encodeURIComponent(subkodeSensus) + '/' + encodeURIComponent(bagianSensus);

        $('#ctrl-Sub_Bagian_Sensus').html('<option value="">Loading...</option>');

        $.ajax({
            type: 'GET',
            url: path,
            dataType: 'json',
            success: function(data) {
                var options = '<option value="">-- Pilih --</option>';
                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].value + '">' + data[i].label + '</option>';
                }
                $('#ctrl-Sub_Bagian_Sensus').html(options);
            },
            error: function(data) {
                $('#ctrl-Sub_Bagian_Sensus').html('<option value="">-- Pilih --</option>');
            }
        });
    });

    $(document).on('change', '#ctrl-Kode_Klasifikasi, #ctrl-Subkode_Klasifikasi', function() {
        var kodeKlasifikasi = $('#ctrl-Kode_Klasifikasi').val();
        var subkodeKlasifikasi = $('#ctrl-Subkode_Klasifikasi').val();
        var path = '<?php print_link('api/json/suratkeluar_Bagian_Klasifikasi_option_list') ?>/' + encodeURIComponent(kodeKlasifikasi) + '/' + encodeURIComponent(subkodeKlasifikasi);

        $('#ctrl-Bagian_Klasifikasi').html('<option value="">Loading...</option>');

        $.ajax({
            type: 'GET',
            url: path,
            dataType: 'json',
            success: function(data) {
                var options = '<option value="">-- Pilih --</option>';
                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].value + '">' + data[i].label + '</option>';
                }
                $('#ctrl-Bagian_Klasifikasi').html(options);
            },
            error: function(data) {
                $('#ctrl-Bagian_Klasifikasi').html('<option value="">-- Pilih --</option>');
            }
        });
    });

    $(document).on('change', '#ctrl-Kode_Klasifikasi, #ctrl-Subkode_Klasifikasi, #ctrl-Bagian_Klasifikasi', function() {
        var kodeKlasifikasi = $('#ctrl-Kode_Klasifikasi').val();
        var subkodeKlasifikasi = $('#ctrl-Subkode_Klasifikasi').val();
        var bagianKlasifikasi = $('#ctrl-Bagian_Klasifikasi').val();
        var path = '<?php print_link('api/json/suratkeluar_Sub_Bagian_Klasifikasi_option_list') ?>/' + encodeURIComponent(kodeKlasifikasi) + '/' + encodeURIComponent(subkodeKlasifikasi) + '/' + encodeURIComponent(bagianKlasifikasi);

        $('#ctrl-Sub_Bagian_Klasifikasi').html('<option value="">Loading...</option>');

        $.ajax({
            type: 'GET',
            url: path,
            dataType: 'json',
            success: function(data) {
                var options = '<option value="">-- Pilih --</option>';
                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].value + '">' + data[i].label + '</option>';
                }
                $('#ctrl-Sub_Bagian_Klasifikasi').html(options);
            },
            error: function(data) {
                $('#ctrl-Sub_Bagian_Klasifikasi').html('<option value="">-- Pilih --</option>');
            }
        });
    });

    $(document).on('change', '#ctrl-Nama_Tim_Kerja', function() {
        var namaTimKerja = $(this).val();
        var path = '<?php echo print_link('api/json/surat_tugas_number'); ?>/' + encodeURIComponent(namaTimKerja);

        $.ajax({
            type: 'GET',
            url: path,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#ctrl-Nomor').val(response.nomor);
                } else {
                    $('#ctrl-Nomor').val('B-xxx');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', status, error);
                $('#ctrl-Nomor').val('');
            }
        });
    });
</script>
