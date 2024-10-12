<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tagihan $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $obatList */
/** @var array $pasienList */

$this->title = 'Create Tagihan'; 
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-3 mb-3">
        <h3 class="display-5">Create Tagihan</h3>
    </div>

    <div class="body-content">
        <?php $form = ActiveForm::begin(); ?>

        <div class="row mb-3">
            <div class="col-lg-6">
                <?= $form->field($model, 'pasien_id')->dropDownList(
                    \yii\helpers\ArrayHelper::map($pasienList, 'id', 'nama'),
                    ['prompt' => 'Pilih Pasien']
                ) ?>
            </div>

            <div class="col-lg-6">
                <?= $form->field($model, 'obat_id')->dropDownList(
                    \yii\helpers\ArrayHelper::map($obatList, 'id', 'nama'),
                    ['prompt' => 'Pilih Obat']
                ) ?>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-6">
                <?= $form->field($model, 'jumlah')->textInput(['type' => 'number']) ?>
            </div>

            <div class="col-lg-6">
                <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-6">
                <?= $form->field($model, 'status')->dropDownList(
                    ['belum dibayar' => 'Belum Dibayar', 'dibayar' => 'Dibayar'],
                    ['prompt' => 'Pilih Status']
                ) ?>
            </div>

            <div class="col-lg-6">
                <?= $form->field($model, 'tanggal')->textInput(['type' => 'date']) ?>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-6">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
