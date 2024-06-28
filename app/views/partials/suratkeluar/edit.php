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
                    <h4 class="record-title">Edit  Suratkeluar</h4>
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("suratkeluar/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
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
                                                <label class="control-label" for="Tanggal_Surat">Tanggal Surat <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input id="ctrl-Tanggal_Surat" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['Tanggal_Surat']; ?>" type="datetime" name="Tanggal_Surat" placeholder="Enter Tanggal Surat" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
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
                                                            <input id="ctrl-Nama_Pegawai"  value="<?php  echo $data['Nama_Pegawai']; ?>" type="text" placeholder="Enter Nama Pegawai"  required="" name="Nama_Pegawai"  class="form-control " />
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
                                                                <select required=""  id="ctrl-Nama_Tim_Kerja" name="Nama_Tim_Kerja"  placeholder="Select a value ..."    class="custom-select" >
                                                                    <option value="">Select a value ...</option>
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
                                                            <label class="control-label" for="Kode_Sensus">Kode Sensus </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <select  id="ctrl-Kode_Sensus" data-load-select-options="Subkode_Sensus" name="Kode_Sensus"  placeholder="Select a value ..."    class="custom-select" >
                                                                    <option value="">Select a value ...</option>
                                                                    <?php
                                                                    $Kode_Sensus_options = Menu :: $Kode_Sensus;
                                                                    $field_value = $data['Kode_Sensus'];
                                                                    if(!empty($Kode_Sensus_options)){
                                                                    foreach($Kode_Sensus_options as $option){
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
                                                            <label class="control-label" for="Subkode_Sensus">Subkode Sensus </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <select  id="ctrl-Subkode_Sensus" data-load-path="<?php print_link('api/json/suratkeluar_Subkode_Sensus_option_list') ?>" data-load-select-options="Bagian_Sensus" name="Subkode_Sensus"  placeholder="Select a value ..."    class="custom-select" >
                                                                    <?php
                                                                    $rec = $data['Subkode_Sensus'];
                                                                    $Subkode_Sensus_options = $comp_model -> suratkeluar_Subkode_Sensus_option_list($data['Kode_Sensus']);
                                                                    if(!empty($Subkode_Sensus_options)){
                                                                    foreach($Subkode_Sensus_options as $option){
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
                                                            <label class="control-label" for="Bagian_Sensus">Bagian Sensus </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <select  id="ctrl-Bagian_Sensus" data-load-path="<?php print_link('api/json/suratkeluar_Bagian_Sensus_option_list') ?>" name="Bagian_Sensus"  placeholder="Select a value ..."    class="custom-select" >
                                                                    <?php
                                                                    $rec = $data['Bagian_Sensus'];
                                                                    $Bagian_Sensus_options = $comp_model -> suratkeluar_Bagian_Sensus_option_list($data['Subkode_Sensus']);
                                                                    if(!empty($Bagian_Sensus_options)){
                                                                    foreach($Bagian_Sensus_options as $option){
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
                                                            <label class="control-label" for="Kode_Klasifikasi">Kode Klasifikasi </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <select  id="ctrl-Kode_Klasifikasi" data-load-select-options="Subkode_Klasifikasi" name="Kode_Klasifikasi"  placeholder="Select a value ..."    class="custom-select" >
                                                                    <option value="">Select a value ...</option>
                                                                    <?php
                                                                    $Kode_Klasifikasi_options = Menu :: $Kode_Klasifikasi;
                                                                    $field_value = $data['Kode_Klasifikasi'];
                                                                    if(!empty($Kode_Klasifikasi_options)){
                                                                    foreach($Kode_Klasifikasi_options as $option){
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
                                                            <label class="control-label" for="Subkode_Klasifikasi">Subkode Klasifikasi </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <select  id="ctrl-Subkode_Klasifikasi" data-load-path="<?php print_link('api/json/suratkeluar_Subkode_Klasifikasi_option_list') ?>" data-load-select-options="Bagian_Klasifikasi" name="Subkode_Klasifikasi"  placeholder="Select a value ..."    class="custom-select" >
                                                                    <?php
                                                                    $rec = $data['Subkode_Klasifikasi'];
                                                                    $Subkode_Klasifikasi_options = $comp_model -> suratkeluar_Subkode_Klasifikasi_option_list($data['Kode_Klasifikasi']);
                                                                    if(!empty($Subkode_Klasifikasi_options)){
                                                                    foreach($Subkode_Klasifikasi_options as $option){
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
                                                            <label class="control-label" for="Bagian_Klasifikasi">Bagian Klasifikasi </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <select  id="ctrl-Bagian_Klasifikasi" data-load-path="<?php print_link('api/json/suratkeluar_Bagian_Klasifikasi_option_list') ?>" name="Bagian_Klasifikasi"  placeholder="Select a value ..."    class="custom-select" >
                                                                    <?php
                                                                    $rec = $data['Bagian_Klasifikasi'];
                                                                    $Bagian_Klasifikasi_options = $comp_model -> suratkeluar_Bagian_Klasifikasi_option_list($data['Subkode_Klasifikasi']);
                                                                    if(!empty($Bagian_Klasifikasi_options)){
                                                                    foreach($Bagian_Klasifikasi_options as $option){
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
                                </div>
                            </section>
