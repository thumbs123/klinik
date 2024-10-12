<?php

namespace app\controllers;

use app\models\Tindakan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class TindakanController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        
        $tindakan = Tindakan::find()->all();
        return $this->render('index', ['tindakan' => $tindakan]);
    }

    public function actionCreate()
    {
        $tindakan = new Tindakan();

        if ($tindakan->load(Yii::$app->request->post()) && $tindakan->validate()) {
            if ($tindakan->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', ['tindakan' => $tindakan]);
    }

    public function actionUpdate($id)
    {
        $tindakan = $this->findModel($id);

        if ($tindakan->load(Yii::$app->request->post()) && $tindakan->validate()) {
            if ($tindakan->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', ['tindakan' => $tindakan]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Tindakan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}