<?php

/** @var yii\web\View $this */
/** @var app\models\Obat $obat */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Update Obat: ' . $obat->nama;
?>
<div class="site-update">

    <div class="jumbotron text-center bg-transparent mt-3 mb-3">
        <h3 class="display-5">Update Obat</h3>
    </div>

    <div class="body-content">
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($obat, 'nama')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($obat, 'harga')->textInput(['maxlength' => true]) ?>
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
