<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LogContent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'log_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'before')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'after')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cpanel', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
