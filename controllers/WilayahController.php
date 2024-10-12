<?php

namespace app\controllers;

use app\models\Wilayah;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class WilayahController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        
        $wilayah = Wilayah::find()->all();
        return $this->render('index', ['wilayah' => $wilayah]);
    }

    public function actionCreate()
    {
        $wilayah = new Wilayah();

        if ($wilayah->load(Yii::$app->request->post()) && $wilayah->validate()) {
            if ($wilayah->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', ['wilayah' => $wilayah]);
    }

    public function actionUpdate($id)
    {
        $wilayah = $this->findModel($id);

        if ($wilayah->load(Yii::$app->request->post()) && $wilayah->validate()) {
            if ($wilayah->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', ['wilayah' => $wilayah]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Wilayah::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}