<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Screen Background</title>
    <style>
        /* CSS untuk memenuhi layar penuh */
        .full-screen {
            height: 100vh; /* Tinggi sama dengan viewport height */
            width: 100%; /* Lebar 100% */
            background-color: #f0f0f0; /* Warna latar belakang */
            padding: 20px; /* Padding untuk konten di dalamnya */
        }

        /* CSS tambahan sesuai kebutuhan */
        .dashboard-title {
            margin-bottom: 20px;
            color: #333;
        }

        .record-count {
            display: block;
            padding: 15px;
            border-radius: 6px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-decoration: none;
            height: 100%;
        }

        .record-count:hover {
            transform: scale(1.02);
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.2);
        }

        .icon {
            margin-bottom: 10px;
        }

        .title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .value {
            font-size: 20px;
        }
    </style>
</head>
<body>
<?php 
    $page_id = null;
    $comp_model = new SharedController;
    $current_page = $this->set_current_page_link();
?>
    <div class="full-screen bg-light p-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-3">
                    <h3 class="dashboard-title"><?php echo SITE_NAME ?></h3>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <!-- Kartu pertama -->
                    <?php $rec_count = $comp_model->getcount_suratmasuk();  ?>
                    <a class="record-count card bg-light text-dark" href="<?php print_link("surat_masuk/") ?>">
                        <div class="text-center">
                            <div class="icon"><i class="fa fa-inbox fa-3x"></i></div>
                            <div class="title">Surat Masuk</div>
                            <div class="value"><strong><?php echo $rec_count; ?></strong></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <!-- Kartu kedua -->
                    <?php $rec_count = $comp_model->getcount_suratkeluar();  ?>
                    <a class="record-count card bg-light text-dark" href="<?php print_link("suratkeluar/") ?>">
                        <div class="text-center">
                            <div class="icon"><i class="fa fa-paper-plane fa-3x"></i></div>
                            <div class="title">Surat Keluar</div>
                            <div class="value"><strong><?php echo $rec_count; ?></strong></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <!-- Kartu ketiga -->
                    <?php $rec_count = $comp_model->getcount_surattugas();  ?>
                    <a class="record-count card bg-light text-dark" href="<?php print_link("surat_tugas/") ?>">
                        <div class="text-center">
                            <div class="icon"><i class="fa fa-tasks fa-3x"></i></div>
                            <div class="title">Surat Tugas</div>
                            <div class="value"><strong><?php echo $rec_count; ?></strong></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <!-- Kartu keempat -->
                    <?php $rec_count = $comp_model->getcount_sk();  ?>
                    <a class="record-count card bg-light text-dark" href="<?php print_link("surat_keputusan/") ?>">
                        <div class="text-center">
                            <div class="icon"><i class="fa fa-file-text-o fa-3x"></i></div>
                            <div class="title">SK</div>
                            <div class="value"><strong><?php echo $rec_count; ?></strong></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
