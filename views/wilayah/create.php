<?php

/** @var yii\web\View $this */
/** @var app\models\Wilayah $wilayah */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Wilayah';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-3 mb-3">
        <h3 class="display-5">Create Wilayah</h3>
    </div>

    <div class="body-content">
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($wilayah, 'nama')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($wilayah, 'deskripsi')->textInput(['maxlength' => true]) ?>
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
