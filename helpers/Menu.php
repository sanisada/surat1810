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
			'path' => 'surat_internal', 
			'label' => 'SURAT INTERNAL', 
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
		),

		array(
			'path' => 'dokumentasi', 
			'label' => 'SOP', 
			'icon' => '',
			'submenu' => array(
				array(
					'path' => 'dokumentasi/index/administrasi_umum',
					'label' => 'Administrasi Umum',
					'icon' => ''
				),
				array(
					'path' => 'dokumentasi/index/administrasi_keuangan',
					'label' => 'Administrasi Keuangan',
					'icon' => ''
				),
				array(
					'path' => 'dokumentasi/index/administrasi_kepegawaian',
					'label' => 'Administrasi Kepegawaian',
					'icon' => ''
				),
				array(
					'path' => 'dokumentasi/index/sensus_survei',
					'label' => 'Sensus dan Survei',
					'icon' => '',
					'submenu' => array(
						array(
							'path' => 'dokumentasi/index/pmss',
							'label' => 'Pengembangan Metodologi Sensus dan Survei',
							'icon' => ''
						),
						array(
							'path' => 'dokumentasi/index/statistik_sosial',
							'label' => 'Statistik Sosial',
							'icon' => '',
							'submenu' => array(
								array(
									'path' => 'dokumentasi/index/statistik_kependudukan_ketenagakerjaan',
									'label' => 'Statistik Kependudukan dan Ketenagakerjaan',
									'icon' => ''
								),
								array(
									'path' => 'dokumentasi/index/statistik_ketahanan_sosial',
									'label' => 'Statistik Ketahanan Sosial',
									'icon' => ''
								),
								array(
									'path' => 'dokumentasi/index/statistik_kesejahteraan_rakyat',
									'label' => 'Statistik Kesejahteraan Rakyat',
									'icon' => ''
								),
							)
						),
						array(
							'path' => 'dokumentasi/index/statistik_produksi',
							'label' => 'Statistik Ekonomi Produksi',
							'icon' => '',
							'submenu' => array(
								array(
									'path' => 'dokumentasi/index/tphp',
									'label' => 'Statistik Tanaman Pangan, Hortikultura dan Perkebunan',
									'icon' => ''
								),
								array(
									'path' => 'dokumentasi/index/ppk',
									'label' => 'Statistik Peternakan, Perikanan, dan Kehutanan',
									'icon' => ''
								),
								array(
									'path' => 'dokumentasi/index/industri',
									'label' => 'Statistik Industri',
									'icon' => ''
								),
								array(
									'path' => 'dokumentasi/index/pek',
									'label' => 'Statistik Pertambangan, Energi, dan Konstruksi',
									'icon' => ''
								),
							)
						),
						array(
							'path' => 'dokumentasi/index/statistik_distribusi',
							'label' => 'Statistik Ekonomi Distribusi',
							'icon' => '',
							'submenu' => array(
								array(
									'path' => 'dokumentasi/index/harga',
									'label' => 'Statistik Harga',
									'icon' => ''
								),
								array(
									'path' => 'dokumentasi/index/distribusi',
									'label' => 'Statistik Distribusi',
									'icon' => ''
								),
								array(
									'path' => 'dokumentasi/index/ktip',
									'label' => 'Statistik Keuangan, Teknologi Informasi, dan Pariwisata',
									'icon' => ''
								),
							)
						),
						array(
							'path' => 'dokumentasi/index/nerwilis',
							'label' => 'Neraca Wilayah',
							'icon' => '',
							'submenu' => array(
								array(
									'path' => 'dokumentasi/index/neraca_produksi',
									'label' => 'Neraca Produksi',
									'icon' => ''
								),
								array(
									'path' => 'dokumentasi/index/neraca_pengeluaran',
									'label' => 'Neraca Pengeluaran',
									'icon' => ''
								),
								array(
									'path' => 'dokumentasi/index/aps',
									'label' => 'Analisis dan Pengembangan Statistik',
									'icon' => ''
								),
							)
						),
						array(
							'path' => 'dokumentasi/index/diseminasi',
							'label' => 'Diseminasi Statistik',
							'icon' => ''
						),
					),
				),
				array(
					'path' => 'dokumentasi/index/pti',
					'label' => 'Pelayanan dan Teknologi Informasi',
					'icon' => ''
				),
			),
		),
		
		array(
			'path' => 'pengguna', 
			'label' => 'PENGGUNA', 
			'icon' => ''
		)
	);
		
	
	
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