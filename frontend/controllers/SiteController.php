<?php
namespace frontend\controllers;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use frontend\models\LoginForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Karcis;
use frontend\models\TicketSearch;
use frontend\models\ConfirmationForm;
use common\models\JenisKereta;
use common\models\Kelas;
use common\models\Stasiun;
use common\models\Jadwal;
use common\models\HistoryTransaksi;
use Da\QrCode\QrCode;
date_default_timezone_set('Asia/Jakarta');

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['signup'],
                'except' => ['login', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup','login','index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function () {
                    return Yii::$app->response->redirect(['site/login']);
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $dateNow = date('Y-m-d H:i:00');
        $jadwalKereta = Jadwal::find()->where(['waktu_berangkat'=>date("Y-m-d H:i:s", strtotime($dateNow.' +1 day')) ])->all();
        $model = new TicketSearch();
        $namaKereta = ArrayHelper::map(JenisKereta::find()->all(),'id_kereta', 'nama_kereta');
        $kelasKereta = ArrayHelper::map(Kelas::find()->all(),'id_kelas', 'nama_kelas');
        $stasiun =  ArrayHelper::map(Stasiun::find()->all(),'id_stasiun', 'nama_stasiun');

        if($model->load(Yii::$app->request->post())){
            $jadwalKereta = Jadwal::find()->where(['id_kelas'=>$model->kelas,'id_jenis'=>$model->kereta,'asal_stasiun'=>$model->asalstasiun,'tujuan_stasiun'=>$model->tujuanstasiun,'waktu_berangkat'=>$model->waktu])->andWhere(['>=','sisa_tiket',$model->orang])->all();
        }

        return $this->render('index',
            [
            'jadwalKereta'=>$jadwalKereta, 
            'model'=>$model,
            'namaKereta' => $namaKereta,
            'kelasKereta' => $kelasKereta,
            'stasiun' => $stasiun
            ]
        );
    }

    public function actionPesan($id,$tkt){
        $modelKarcis = new Karcis();
        $modelHistory = new HistoryTransaksi();
        $id = base64_decode($id);
        $tkt = base64_decode($tkt);
        $harga = Jadwal::find()->select('harga')->where(['id_jadwal'=>$id])->scalar();
        if($modelKarcis->load(Yii::$app->request->post())){
            $modelHistory->atas_nama = Yii::$app->request->post('Karcis')['atas_nama'];
            $modelHistory->id_karcis = mt_rand();
            $modelHistory->id_user = Yii::$app->user->identity->id;
            $modelHistory->jumlah_tiket = $tkt;
            $modelHistory->tanggal_beli = date("Y-m-d H:m:i");
            $modelHistory->total_harga = $tkt * $harga;
            $modelHistory->status_bayar = "BB";
            $modelHistory->status_pembelian = "Aktif";
            $modelHistory->id_jadwal = $id;

            if($modelHistory->save()){
                return $this->redirect('index');
            }else{
                return $this->render('pesan',['model'=>$modelKarcis]);
            }
        }
        return $this->render('pesan',['model'=>$modelKarcis,'harga'=>$harga]);
    }

    public function actionHistory(){
        $data = HistoryTransaksi::find()->where(['id_user'=>Yii::$app->user->identity->id])->orderBy("status_bayar")->all();
        return $this->render('history',['data'=>$data]);
    }

    public function actionConfirmation($id){
        $id = base64_decode($id);
        $model = new ConfirmationForm();
        $model2 = HistoryTransaksi::findOne($id);
        $data = HistoryTransaksi::find()->select(['total_harga','jumlah_tiket'])->where(['id'=>$id])->all();

        if($model->load(Yii::$app->request->post())){
            $namaFile = 'BKT-'.date("Ymii").$model->bukti;
            $model->bukti = UploadedFile::getInstance($model,'bukti');
            $namaEkstensi = $model->bukti->extension;
            $model->bukti->saveAs(Yii::getAlias("@backend").'/web/bukti/'.$namaFile.'.'.$namaEkstensi);
            $model2->bukti_pembayaran = $namaFile.'.'.$namaEkstensi;
            $model2->status_pembelian = "Pending";
            $model2->status_bayar = "SB";
            if($model2->update()){
                return $this->redirect('history');
            }
        }

        return $this->render('confirmation',['model'=>$model,'data'=>$data]);
    }

    public function actionDownload($id){
            $id = base64_decode($id);
            $qrCode = new QrCode("Id Karcis : $id");

            header('Content-Type: ' . $qrCode->getContentType());
            $qrCode->writeFile(__DIR__ . '/code.png');
            $path = __DIR__.'/code.png';
            Yii::$app->response->sendFile($path);
            return unlink($path);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

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

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
