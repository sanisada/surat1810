<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Neraca Produksi</h4>
                </div>
                <div class="col-sm-3 ">
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("dokumentasi/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Tambah SOP 
                    </a>
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                        <i class="fa fa-plus"></i> Tambah Surat Tugas 
                    </button> -->
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('dokumentasi'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class="">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <div id="surat_tugas-list-records">
                                <div id="page-report-body" class="table-responsive">
                                <table class="table  table-striped table-sm text-left">
                                    <thead class="table-header bg-light">
                                        <tr>
                                            <th class="td-sno">#</th>
                                            <th  class="td-Nomor"> Nomor SOP</th>
                                            <th  class="td-Judul"> Judul</th>
                                            <th  class="td-Tanggal-Pembuatan"> Tanggal Pembuatan</th>
                                            <th  class="td-Tanggal-Revisi"> Tanggal Revisi</th>
                                            <th  class="td-Tanggal-Efektif"> Tanggal Efektif</th>
                                            <th  class="td-File-Doc"> File .docx</th>
                                            <th  class="td-File-Pdf"> File .pdf</th>
                                            <th class="td-btn"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $counter = 0;
                                        if (!empty($records)) {
                                            foreach ($records as $data) {
                                                $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                                $counter++;
                                        ?>
                                        <tr>
                                            <th class="td-sno"><?php echo $counter; ?></th>
                                            <td><?= htmlspecialchars($data['Nomor_SOP']); ?></td>
                                            <td><?= htmlspecialchars($data['Judul']); ?></td>
                                            <td><?= htmlspecialchars($data['Tanggal_Pembuatan']); ?></td>
                                            <td><?= htmlspecialchars($data['Tanggal_Revisi']); ?></td>
                                            <td><?= htmlspecialchars($data['Tanggal_Efektif']); ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-primary has-tooltip" href="<?php print_link("dokumentasi/downloadFile/doc/$rec_id")?>"><i class="fa fa-download"></i> Download Word File</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info has-tooltip" href="<?php print_link("dokumentasi/openPdf/$rec_id")?>" target="_blank"><i class="fa fa-file"></i> Open PDF File</a>
                                            </td>
                                            <th class="td-btn">
                                                <?php if (USER_ROLE === 'Admin') { ?>
                                                    <a class="btn btn-sm btn-success has-tooltip" title="Edit This Record" href="<?php print_link("dokumentasi/edit/$rec_id"); ?>">
                                                        <i class="fa fa-edit"></i> 
                                                    </a>
                                                    <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("dokumentasi/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                        <i class="fa fa-trash"></i> 
                                                    </a>
                                                <?php } ?>
                                            </th>
                                        </tr>
                                        <?php 
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php 
                                if(empty($records)){
                                ?>
                                <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                    <i class="fa fa-ban"></i> No record found
                                </h4>
                                <?php
                                }
                                ?>
                            </div>
                            <?php
                            if( $show_footer && !empty($records)){
                            ?>
                        <div class=" border-top mt-2">
                            <div class="row justify-content-center">    
                                <div class="col-md-auto justify-content-center">    
                                    <div class="p-3 d-flex justify-content-between">    
                                        <div class="col">   
                                            <?php
                                            if($show_pagination == true){
                                            $pager = new Pagination($total_records, $record_count);
                                            $pager->route = $this->route;
                                            $pager->show_page_count = true;
                                            $pager->show_record_count = true;
                                            $pager->show_page_limit =true;
                                            $pager->limit_count = $this->limit_count;
                                            $pager->show_page_number_list = true;
                                            $pager->pager_link_range=5;
                                            $pager->render();
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>