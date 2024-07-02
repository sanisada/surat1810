<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Surat Tugas</h4>
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
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['Nomor']) ? urlencode($data['Nomor']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-Nomor">
                                        <th class="title"> Nomor: </th>
                                        <td class="value"> <?php echo $data['Nomor']; ?></td>
                                    </tr>
                                    <tr  class="td-Tanggal_Surat">
                                        <th class="title"> Tanggal Surat: </th>
                                        <td class="value">
                                            <span  data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['Tanggal_Surat']; ?>" 
                                                data-pk="<?php echo $data['Nomor'] ?>" 
                                                data-url="<?php print_link("surat_tugas/editfield/" . urlencode($data['Nomor'])); ?>" 
                                                data-name="Tanggal_Surat" 
                                                data-title="Enter Tanggal Surat" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                 >
                                                <?php echo $data['Tanggal_Surat']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Nomor_Surat">
                                        <th class="title"> Nomor Surat: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['Nomor_Surat']; ?>" 
                                                data-pk="<?php echo $data['Nomor'] ?>" 
                                                data-url="<?php print_link("surat_tugas/editfield/" . urlencode($data['Nomor'])); ?>" 
                                                data-name="Nomor_Surat" 
                                                data-title="Enter Nomor Surat" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                 >
                                                <?php echo $data['Nomor_Surat']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Nama_Yang_di_Tugaskan">
                                        <th class="title"> Nama Yang Di Tugaskan: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['Nama_Yang_di_Tugaskan']; ?>" 
                                                data-pk="<?php echo $data['Nomor'] ?>" 
                                                data-url="<?php print_link("surat_tugas/editfield/" . urlencode($data['Nomor'])); ?>" 
                                                data-name="Nama_Yang_di_Tugaskan" 
                                                data-title="Enter Nama Yang Di Tugaskan" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                 >
                                                <?php echo $data['Nama_Yang_di_Tugaskan']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Isi_Tugas">
                                        <th class="title"> Isi Tugas: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['Isi_Tugas']; ?>" 
                                                data-pk="<?php echo $data['Nomor'] ?>" 
                                                data-url="<?php print_link("surat_tugas/editfield/" . urlencode($data['Nomor'])); ?>" 
                                                data-name="Isi_Tugas" 
                                                data-title="Enter Isi Tugas" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                 >
                                                <?php echo $data['Isi_Tugas']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Rentang_Waktu_Penugasan">
                                        <th class="title"> Rentang Waktu Penugasan: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['Rentang_Waktu_Penugasan']; ?>" 
                                                data-pk="<?php echo $data['Nomor'] ?>" 
                                                data-url="<?php print_link("surat_tugas/editfield/" . urlencode($data['Nomor'])); ?>" 
                                                data-name="Rentang_Waktu_Penugasan" 
                                                data-title="Enter Rentang Waktu Penugasan" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                 >
                                                <?php echo $data['Rentang_Waktu_Penugasan']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-save"></i> Export
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                        </a>
                                        <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                        <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                            <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                            </a>
                                            <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                            <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                </a>
                                                <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                    <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                    </a>
                                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                    <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                        <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                        </a>
                                                    </div>
                                                </div>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("surat_tugas/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("surat_tugas/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
