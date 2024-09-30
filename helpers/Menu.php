<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbarsideleft = array(
		array(
			'path' => 'home', 
			'label' => 'HOME', 
			'icon' => ''
		),
		
		array(
			'path' => 'surat_masuk', 
			'label' => 'SURAT MASUK', 
			'icon' => ''
		),
		
		array(
			'path' => 'suratkeluar', 
			'label' => 'SURAT KELUAR', 
			'icon' => ''
		),
		
		array(
			'path' => 'surat_tugas', 
			'label' => 'SURAT TUGAS', 
			'icon' => ''
		),
		
		array(
			'path' => 'surat_keputusan', 
			'label' => 'SURAT KEPUTUSAN', 
			'icon' => ''
		),
		
		array(
			'path' => 'beritaacara', 
			'label' => 'BERITA ACARA', 
			'icon' => ''
		),
		
		array(
			'path' => 'namatimkerja', 
			'label' => 'NAMA TIM KERJA', 
			'icon' => ''
		),
		
		array(
			'path' => 'kodeklasifikasifasilitatif', 
			'label' => 'KODE KLASIFIKASI FASILITATIF', 
			'icon' => ''
		),
		
		array(
			'path' => 'kodesurveisensus', 
			'label' => 'KODE SURVEI SENSUS', 
			'icon' => ''
		)
	);	
	        // Menambahkan menu 'PENGGUNA' hanya untuk Admin
            public static function addAdminMenu() {
                if (USER_ROLE === 'Admin') {
                    self::$navbarsideleft[] = array(
                        'path' => 'pengguna',
                        'label' => 'PENGGUNA',
                        'icon' => ''
                    );
                }
            }
            
        
			public static $Jenis_Kegiatan = array(
		array(
			"value" => "Survei Sensus", 
			"label" => "Survei Sensus", 
		),
		array(
			"value" => "Klasifikasi", 
			"label" => "Klasifikasi", 
		),);
		
			public static $Kode_Sensus = array(
		array(
			"value" => "PS", 
			"label" => "PS (PERUMUSAN KEBIJAKAN Dl BIDANG STATISTIK MELIPUTI", 
		),
		array(
			"value" => "SS", 
			"label" => "SS(SENSUS PENDUDUK, SENSUS PERTANIAN DAN SENSUS EKONOMI)", 
		),
		array(
			"value" => "VS", 
			"label" => "VS SURVEI", 
		),
		array(
			"value" => "KS", 
			"label" => "KS (KONSOLIDASI DATA STATISTIK)", 
		),
		array(
			"value" => "ES", 
			"label" => "ES (EVALUASI DAN PELAPORAN SENSUS, SURVEI DAN KONSOLIDASI DATA)", 
		),);
		
			public static $Kode_Klasifikasi = array(
		array(
			"value" => "KU", 
			"label" => "KU PELAKSANAAN ANGGARAN", 
		),
		array(
			"value" => "KP", 
			"label" => "KP KEPEGAWAIAN", 
		),
		array(
			"value" => "PR", 
			"label" => "PR PERENCANAAN", 
		),
		array(
			"value" => "HK", 
			"label" => "HK HUKUM", 
		),
		array(
			"value" => "OT", 
			"label" => "OT ORGANISASI DAN TATA LAKSANA", 
		),
		array(
			"value" => "HM", 
			"label" => "HM HUBUNGAN MASYARAKAT", 
		),
		array(
			"value" => "KA", 
			"label" => "KA KEARSIPAN", 
		),
		array(
			"value" => "RT", 
			"label" => "RT KERUMAHTANGGAAN", 
		),
		array(
			"value" => "PL", 
			"label" => "PL PERLENGKAPAN", 
		),
		array(
			"value" => "DL", 
			"label" => "DL PENDIDIKAN DAN LATIHAN", 
		),
		array(
			"value" => "PK", 
			"label" => "PK KEPUSTAKAAN", 
		),
		array(
			"value" => "IF", 
			"label" => "IF INFORMATIKA", 
		),
		array(
			"value" => "PW", 
			"label" => "PW PENGAWASAN", 
		),
		array(
			"value" => "TS", 
			"label" => "TS TRANSFORMASI STATISTIK", 
		),);
		
}

Menu::addAdminMenu();