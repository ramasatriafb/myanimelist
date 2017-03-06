<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

use yii\data\SqlDataProvider;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {		
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
						'matchCallback' => function(){
                            return (Yii::$app->user->identity->ROLE_ID=='1');
						}
                    ],
                ],
				'denyCallback' => function($rule, $action) {
					return $this->redirect(Yii::$app->urlManagerFront->createUrl('site'));
				}
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                //'actions' => [
                //    'logout' => ['get'],
                //],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
		//$this->layout = 'grafik';
		$this->view->params['menu'] = 'dasbor';
		//Array Hari
		$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
		$hari = $array_hari[date('N')];

		//Format Tanggal
		$tanggal = date ('j');

		//Array Bulan
		$array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember');
		$bulan = $array_bulan[date('n')];

		//Format Tahun
		$tahun = date('Y');

		$hariini = $hari.', '.$tanggal.' '.$bulan.' '.$tahun;
		
		//data adik binaan
		// $sqlhari = 'select * from jadwal a, adikbinaan b, memilih_jadwal c where c.adikbinaan_id = b.adikbinaan_id and c.jadwal_id = a.jadwal_id and a.jadwal_hari like "'.$hari.'"';
		
		// $n = count(CariAdikBinaan::findBySql($sqlhari)->all());
		
		// $adikbinaan = new SqlDataProvider([
		// 	'sql' => $sqlhari,
		// 	'totalCount' => $n,
		// 	'key' => 'ADIKBINAAN_ID',
		// 	'sort' => [
		// 		'attributes' => [
		// 			'ADIKBINAAN_NAMALENGKAP',
		// 			'ADIKBINAAN_TEMPATLAHIR',
		// 			'ADIKBINAAN_TANGGALLAHIR',
		// 		],
		// 	],
		// 	'pagination' => [
		// 		'pageSize' => $n,
		// 	],
		// ]);
		
		//data pengajar
		// $phari = "SELECT * FROM pengajar a, mempunyai_jadwal1 b, jadwal c where b.pengajar_id = a.pengajar_id and b.jadwal_id = c.jadwal_id and c.jadwal_hari like '".$hari."'";
		
		// $m = count(CariPengajar::findBySql($phari)->all());
		
		// $pengajar = new SqlDataProvider([
		// 	'sql' => $phari,
		// 	'totalCount' => $m,
		// 	'key' => 'PENGAJAR_ID',
		// 	'sort' => [
		// 		'attributes' => [
		// 			'PENGAJAR_NAMALENGKAP',
		// 			'PENGAJAR_NOHP',
		// 			'PENGAJAR_ALAMATKOS',
		// 		],
		// 	],
		// 	'pagination' => [
		// 		'pageSize' => $m,
		// 	],
		// ]);
		
		//ketercapaian Iqro
		// $sqlcapai = "select distinct(adikbinaan.adikbinaan_namalengkap) 'nama', adikbinaan.adikbinaan_id 'id', pengajar.pengajar_namapanggilan 'pengajar', keterangan.keterangan_kode 'ket', kelulusan.kelulusan_kode 'kel',  iqro.iqro_jilid 'iqro', max(capaiiqro_tanggal) 'tanggal', capaiiqro_halaman 'hal', (capaiiqro_halaman/iqro_jumlahhalaman)*100 'persen' from ketercapaian_iqro, adikbinaan, pengajar, keterangan, kelulusan, iqro where ketercapaian_iqro.pengajar_id = pengajar.pengajar_id and ketercapaian_iqro.keterangan_id = keterangan.keterangan_id and ketercapaian_iqro.kelulusan_id = kelulusan.kelulusan_id and ketercapaian_iqro.iqro_id = iqro.iqro_id and ketercapaian_iqro.adikbinaan_id = adikbinaan.adikbinaan_id group by nama";
			
		// $ncapai = count(CariKetercapaianIqro::findBySql($sqlcapai)->all());
		
		// $capai = new SqlDataProvider([
		// 	'sql' => $sqlcapai,
		// 	'totalCount' => $ncapai,
		// 	'sort' => [
		// 		'attributes' => [
		// 			'pengajar',
		// 			'nama',
		// 			'iqro',
		// 			'tanggal',
		// 			'ket',
		// 			'kel',
		// 			'hal',
		// 			'persen',
		// 		],
		// 	],
		// 	'pagination' => [
		// 		'pageSize' => $ncapai,
		// 	],
		// ]);
		
		//ketercapaian quran
		// $sqlcapai1 = "select distinct(adikbinaan.adikbinaan_namalengkap) 'nama', adikbinaan.adikbinaan_id 'id', pengajar.pengajar_namapanggilan 'pengajar', keterangan.keterangan_kode 'ket', kelulusan.kelulusan_kode 'kel',  surah.surah_nama 'surah', max(ketercapaian_tanggal) 'tanggal', ketercapaian_halaman 'hal', (ketercapaian_ayat/surah_jumlahayat)*100 'persen' from ketercapaian_quran, adikbinaan, pengajar, keterangan, kelulusan, surah where ketercapaian_quran.pengajar_id = pengajar.pengajar_id and ketercapaian_quran.keterangan_id = keterangan.keterangan_id and ketercapaian_quran.kelulusan_id = kelulusan.kelulusan_id and ketercapaian_quran.surah_id = surah.surah_id and ketercapaian_quran.adikbinaan_id = adikbinaan.adikbinaan_id group by nama";
			
		// $ncapai1 = count(CariKetercapaianQuran::findBySql($sqlcapai1)->all());
		
		// 	$capai1 = new SqlDataProvider([
		// 		'sql' => $sqlcapai1,
		// 		'totalCount' => $ncapai1,
		// 		'sort' => [
		// 			'attributes' => [
		// 				'pengajar',
		// 				'nama',
		// 				'surah',
		// 				'tanggal',
		// 				'ket',
		// 				'kel',
		// 				'hal',
		// 				'persen',
		// 			],
		// 		],
		// 		'pagination' => [
		// 			'pageSize' => $ncapai1,
		// 		],
		// 	]);
			
		return $this->render('hariini', [
				'hariini' => $hariini,
			
		]);		
    }

	//public $layout = 'login';
	
    public function actionLogin()
    {
		$this->layout = "login";
		
		if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
			$this->view->params['menu'] = 'data';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
