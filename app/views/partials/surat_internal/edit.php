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
                    <h4 class="record-title">Edit  Surat Internal</h4>
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("surat_internal/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Nomor">Nomor <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-Nomor"  value="<?php  echo $data['Nomor']; ?>" type="text" placeholder="Enter Nomor"  required="" name="Nomor"  class="form-control " />
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
                                                        <input id="ctrl-Tanggal_Surat" class="form-control" type="date" value="<?php  echo $data['Tanggal_Surat']; ?>" name="Tanggal_Surat" required="">
                                                        <!-- <div id="tanggal_display" class="mt-2"></div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="Tujuan_Surat">Tujuan Surat <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-Tujuan_Surat"  value="<?php  echo $data['Tujuan_Surat']; ?>" type="text" placeholder="Enter Tujuan Surat"  required="" name="Tujuan_Surat"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="Nama_Pegawai">Nama Pegawai <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-Nama_Pegawai"  value="<?php  echo $this->set_field_value('Nama_Pegawai',""); ?>" type="text" placeholder="Enter Nama Pegawai"  required="" name="Nama_Pegawai"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="Nama_Tim_Kerja">Nama Tim Kerja <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <select required=""  id="ctrl-Nama_Tim_Kerja" name="Nama_Tim_Kerja"  placeholder="-- Pilih --"    class="custom-select" >
                                                                    <option value="">-- Pilih --</option>
                                                                    <?php 
                                                                    $Nama_Tim_Kerja_options = $comp_model -> suratkeluar_Nama_Tim_Kerja_option_list();
                                                                    if(!empty($Nama_Tim_Kerja_options)){
                                                                    foreach($Nama_Tim_Kerja_options as $option){
                                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                    $selected = $this->set_field_selected('Nama_Tim_Kerja',$value, "");
                                                                    ?>
                                                                    <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                        <?php echo $label; ?>
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
                                                            <label class="control-label" for="Jenis_Kegiatan">Jenis Kegiatan <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <select required=""  id="ctrl-Jenis_Kegiatan" name="Jenis_Kegiatan"  placeholder="Select a value ..."    class="custom-select" >
                                                                    <option value="">Select a value ...</option>
                                                                    <?php
                                                                    $Jenis_Kegiatan_options = Menu :: $Jenis_Kegiatan;
                                                                    $field_value = $data['Jenis_Kegiatan'];
                                                                    if(!empty($Jenis_Kegiatan_options)){
                                                                    foreach($Jenis_Kegiatan_options as $option){
                                                                    $value = $option['value'];
                                                                    $label = $option['label'];
                                                                    $selected = ( $value == $field_value ? 'selected' : null );
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
                                                            <label class="control-label" for="Nomor_Surat">Nomor Surat <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-Nomor_Surat"  value="<?php  echo $data['Nomor_Surat']; ?>" type="text" placeholder="Enter Nomor Surat"  required="" name="Nomor_Surat"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="Ringkasan_Isi_Surat">Ringkasan Isi Surat <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-Ringkasan_Isi_Surat"  value="<?php  echo $data['Ringkasan_Isi_Surat']; ?>" type="text" placeholder="Enter Ringkasan Isi Surat"  required="" name="Ringkasan_Isi_Surat"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="Keterangan">Keterangan <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-Keterangan"  value="<?php  echo $data['Keterangan']; ?>" type="text" placeholder="Enter Keterangan"  required="" name="Keterangan"  class="form-control " />
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
</script>