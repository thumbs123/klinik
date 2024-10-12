<?php

namespace app\controllers;

use app\models\Obat;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class ObatController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        
        $obat = Obat::find()->all();
        return $this->render('index', ['obat' => $obat]);
    }

    public function actionCreate()
    {
        $obat = new Obat();

        if ($obat->load(Yii::$app->request->post()) && $obat->validate()) {
            if ($obat->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', ['obat' => $obat]);
    }

    public function actionUpdate($id)
    {
        $obat = $this->findModel($id);

        if ($obat->load(Yii::$app->request->post()) && $obat->validate()) {
            if ($obat->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', ['obat' => $obat]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Obat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}