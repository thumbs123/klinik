<?php

namespace app\controllers;

use app\models\Pasien;
use app\models\Wilayah;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class PasienController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        
        $pasien = Pasien::find()->all();
        return $this->render('index', ['pasien' => $pasien]);
    }

    public function actionCreate()
    {
        $pasien = new Pasien();
        $wilayahList = Wilayah::find()->all();
    
        if ($pasien->load(Yii::$app->request->post()) && $pasien->save()) {
            return $this->redirect(['index']);
        }
    
        return $this->render('create', [
            'pasien' => $pasien,
            'wilayahList' => $wilayahList,
        ]);
    }
    

    public function actionUpdate($id)
    {
        $pasien = $this->findModel($id);

        if ($pasien->load(Yii::$app->request->post()) && $pasien->validate()) {
            if ($pasien->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', ['pasien' => $pasien]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Pasien::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}