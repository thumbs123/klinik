<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Obat;
use app\models\Pasien;
use app\models\Tindakan;
use app\models\Transaksi;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'], // Actions that don't require authentication
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'contact', 'pasien'], // Actions that require authentication
                        'allow' => true,
                        'roles' => ['@'], // Allows authenticated users
                    ],
                    [
                        'actions' => ['*'], // Restrict all other actions
                        'allow' => false,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }    
    

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
    
        $jumlahPasien = Pasien::find()->count();
        $jumlahObat = Obat::find()->count();
        $jumlahTindakan = Tindakan::find()->count();
        $jumlahTransaksi = Transaksi::find()->count();
    
        return $this->render('index', [
            'jumlahPasien' => $jumlahPasien,
            'jumlahObat' => $jumlahObat,
            'jumlahTindakan' => $jumlahTindakan,
            'jumlahTransaksi' => $jumlahTransaksi,
        ]);
    }
    

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionPasien()
    {
        $pasien = Pasien::find()->all();
        return $this->render('pasien.index', ['pasien' => $pasien]);
    }
}
