<?php

namespace app\controllers;

use Yii;
use app\models\Transaksi;
use app\models\Obat;
use app\models\Pasien;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class TransaksiController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $transaksi = Transaksi::find()->all();
        return $this->render('index', [
            'transaksi' => $transaksi,
        ]);
    }

    public function actionCreate()
    {
        $model = new Transaksi();
        $obatList = Obat::find()->all();  
        $pasienList = Pasien::find()->all();
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
    
        return $this->render('create', [
            'model' => $model,
            'obatList' => $obatList,
            'pasienList' => $pasienList,
        ]);
    }
    

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $obatList = Obat::find()->all();
        $pasienList = Pasien::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'obatList' => $obatList,
            'pasienList' => $pasienList,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Transaksi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
