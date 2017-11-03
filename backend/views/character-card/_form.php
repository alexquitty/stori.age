<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CharacterCard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="character-card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'entity_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bookpart_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'story')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'motivation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'aim')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'conflict')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'clarification')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'events')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ord')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hidden')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cpanel', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
