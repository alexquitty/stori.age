<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Fraction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fraction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fraction_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entity_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bookpart_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hidden')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cpanel', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
