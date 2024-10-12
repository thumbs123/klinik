<?php

/** @var yii\web\View $this */
/** @var app\models\Pasien $pasien */
/** @var yii\data\ArrayDataProvider $wilayahList */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Pasien';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-3 mb-3">
        <h3 class="display-5">Create Pasien</h3>
    </div>

    <div class="body-content">
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($pasien, 'nama')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($pasien, 'tanggal_lahir')->input('date') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($pasien, 'alamat')->textarea(['rows' => 3]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($pasien, 'no_telp')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($pasien, 'wilayah_id')->dropDownList(
                    \yii\helpers\ArrayHelper::map($wilayahList, 'id', 'nama'),
                    ['prompt' => 'Pilih Wilayah']
                ) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
