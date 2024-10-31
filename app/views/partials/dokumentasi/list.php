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
<style>
    .no-background {
        background-color: transparent !important;
        border: none !important;
    }

    .numbering {
        color: black; /* Mengatur warna numbering menjadi hitam */
    }
    
    .list-group-item a {
        color: #007bff;
        text-decoration: none;
    }

    .list-group-item a:hover {
        text-decoration: underline;
    }

    /* Optional: Jika ingin memberi padding pada numbering */
    .list-group-item {
        padding-left: 10px;
    }
</style>



<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Dokumentasi SOP BPS Kabupaten Pringsewu </h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div class="container mt-5">
        <ul class="list-group">
            <li class="list-group-item no-background">
                <span class="numbering">1.</span> <a href="<?php print_link('dokumentasi/administrasi_umum') ?>">Administrasi Umum</a>
            </li>
            <li class="list-group-item no-background">
                <span class="numbering">2.</span> <a href="<?php print_link('administrasi_keuangan') ?>">Administrasi Keuangan</a>
            </li>
            <li class="list-group-item no-background">
                <span class="numbering">3.</span> <a href="<?php print_link('administrasi_kepegawaian') ?>">Administrasi Kepegawaian</a>
            </li>
            <li class="list-group-item no-background">
                <span class="numbering">4.</span> <a href="<?php print_link('sensus_surveys') ?>">Sensus dan Survei</a>
            </li>

            <!-- Submenu for Sensus dan Survei -->
            <ul class="list-group ml-4">
                <li class="list-group-item no-background">
                    <span class="numbering">4.1.</span> <a href="<?php print_link('pengembangan_metodologi') ?>">Pengembangan Metodologi Sensus dan Survei</a>
                </li>
                <li class="list-group-item no-background">
                    <span class="numbering">4.2.</span> <a href="<?php print_link('statistik_sosial') ?>">Statistik Sosial</a>
                </li>

                <!-- Submenu for Statistik Sosial -->
                <ul class="list-group ml-4">
                    <li class="list-group-item no-background">
                        <span class="numbering">4.2.1.</span> <a href="<?php print_link('statistik_kependudukan') ?>">Statistik Kependudukan dan Ketenagakerjaan</a>
                    </li>
                    <li class="list-group-item no-background">
                        <span class="numbering">4.2.2.</span> <a href="<?php print_link('statistik_ketahanan_sosial') ?>">Statistik Ketahanan Sosial</a>
                    </li>
                    <li class="list-group-item no-background">
                        <span class="numbering">4.2.3.</span> <a href="<?php print_link('statistik_kesejahteraan_rakyat') ?>">Statistik Kesejahteraan Rakyat</a>
                    </li>
                </ul>

                <li class="list-group-item no-background">
                    <span class="numbering">4.3.</span> <a href="<?php print_link('statistik_ekonomi_produksi') ?>">Statistik Ekonomi Produksi</a>
                </li>
                <ul class="list-group ml-4">
                    <li class="list-group-item no-background">
                        <span class="numbering">4.3.1.</span> <a href="<?php print_link('statistik_tanaman_pangan') ?>">Statistik Tanaman Pangan, Hortikultura dan Perkebunan</a>
                    </li>
                    <li class="list-group-item no-background">
                        <span class="numbering">4.3.2.</span> <a href="<?php print_link('statistik_petenakan_perikanan') ?>">Statistik Peternakan, Perikanan, dan Kehutanan</a>
                    </li>
                    <li class="list-group-item no-background">
                        <span class="numbering">4.3.3.</span> <a href="<?php print_link('statistik_industri') ?>">Statistik Industri</a>
                    </li>
                    <li class="list-group-item no-background">
                        <span class="numbering">4.3.4.</span> <a href="<?php print_link('statistik_pertambangan') ?>">Statistik Pertambangan, Energi, dan Konstruksi</a>
                    </li>
                </ul>

                <li class="list-group-item no-background">
                    <span class="numbering">4.4.</span> <a href="<?php print_link('statistik_ekonomi_distribusi') ?>">Statistik Ekonomi Distribusi</a>
                </li>
                <ul class="list-group ml-4">
                    <li class="list-group-item no-background">
                        <span class="numbering">4.4.1.</span> <a href="<?php print_link('statistik_harga') ?>">Statistik Harga</a>
                    </li>
                    <li class="list-group-item no-background">
                        <span class="numbering">4.4.2.</span> <a href="<?php print_link('statistik_distribusi') ?>">Statistik Distribusi</a>
                    </li>
                    <li class="list-group-item no-background">
                        <span class="numbering">4.4.3.</span> <a href="<?php print_link('statistik_keuangan') ?>">Statistik Keuangan, Teknologi Informasi, dan Pariwisata</a>
                    </li>
                </ul>

                <li class="list-group-item no-background">
                    <span class="numbering">4.5.</span> <a href="<?php print_link('neraca_wilayah') ?>">Neraca Wilayah</a>
                </li>
                <ul class="list-group ml-4">
                    <li class="list-group-item no-background">
                        <span class="numbering">4.5.1.</span> <a href="<?php print_link('neraca_produksi') ?>">Neraca Produksi</a>
                    </li>
                    <li class="list-group-item no-background">
                        <span class="numbering">4.5.2.</span> <a href="<?php print_link('neraca_pengeluaran') ?>">Neraca Pengeluaran</a>
                    </li>
                    <li class="list-group-item no-background">
                        <span class="numbering">4.5.3.</span> <a href="<?php print_link('analisis_pengembangan') ?>">Analisis dan Pengembangan Statistik</a>
                    </li>
                </ul>

                <li class="list-group-item no-background">
                    <span class="numbering">4.6.</span> <a href="<?php print_link('diseminasi_statistik') ?>">Diseminasi Statistik</a>
                </li>
            </ul>

            <li class="list-group-item no-background">
                <span class="numbering">5.</span> <a href="<?php print_link('pelayanan_teknologi_informasi') ?>">Pelayanan dan Teknologi Informasi</a>
            </li>
        </ul>
    </div>



</section>
