<?php

/** @var yii\web\View $this */
/** @var app\models\Pasien $pasien */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Update Pasien: ' . $pasien->nama;
?>
<div class="site-update">

    <div class="jumbotron text-center bg-transparent mt-3 mb-3">
        <h3 class="display-5">Update Pasien</h3>
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
                <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
