<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;
use backend\models\SignupForm;
use backend\models\JadwalSearch;
use common\models\JenisKereta;
use common\models\Kelas;
use common\models\Stasiun;
use common\models\Jadwal;
use common\models\HistoryTransaksi;

class SiteController extends Controller
{

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
                        'actions' => ['logout', 'index', 'jadwal', 'create', 'delete', 'update', 'user','confirmasi','signup'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['post']
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
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionJadwal()
    {
        $searchModel = new JadwalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('jadwal', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     public function actionCreate()
    {
        $model = new Jadwal();
        $namaKereta = ArrayHelper::map(JenisKereta::find()->all(),'id_kereta', 'nama_kereta');
        $kelasKereta = ArrayHelper::map(Kelas::find()->all(),'id_kelas', 'nama_kelas');
        $stasiun =  ArrayHelper::map(Stasiun::find()->all(),'id_stasiun', 'nama_stasiun');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('jadwal');
        }

        return $this->render('create', [
            'model' => $model,
            'namaKereta' => $namaKereta,
            'kelasKereta' => $kelasKereta,
            'stasiun' => $stasiun
        ]);
    }

     public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['jadwal']);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $namaKereta = ArrayHelper::map(JenisKereta::find()->all(),'id_kereta', 'nama_kereta');
        $kelasKereta = ArrayHelper::map(Kelas::find()->all(),'id_kelas', 'nama_kelas');
        $stasiun =  ArrayHelper::map(Stasiun::find()->all(),'id_stasiun', 'nama_stasiun');

        if ($model->load(Yii::$app->request->post()) && $model->update()) {
            return $this->redirect('jadwal');
        }

        return $this->render('update', [
            'model' => $model,
            'namaKereta' => $namaKereta,
            'kelasKereta' => $kelasKereta,
            'stasiun' => $stasiun
        ]);
    }

    public function actionUser(){
        $query = HistoryTransaksi::find();

         $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $data = $query->orderBy('status_bayar')->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('usersetting',['data'=>$data,'pagination'=>$pagination]);
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

    public function actionConfirmasi($confir){
        $confir = base64_decode($confir);
        $data = HistoryTransaksi::findOne($confir);
        $data->status_pembelian = "Aktif";
        $data->id_karcis = mt_rand();
        $data->update();
        return $this->redirect("user");
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

     protected function findModel($id)
    {
        if ( ($model = Jadwal::findOne(base64_decode($id)) ) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
