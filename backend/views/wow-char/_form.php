<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\wow\WowChar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wow-char-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spec_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'race_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prof1_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prof2_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
