<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Character */
/* @var $form yii\widgets\ActiveForm */
/* @var $bookpart */
/* @var $entity */
/* @var $gender */
/* @var $sex */
?>

<div class="character-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'entity_id')->dropDownList($entity ?: [], [
    	'prompt' => 'Выберите сущность',
    ]) ?>

    <?= $form->field($model, 'bookpart_id')->dropDownList($bookpart ?: [], [
    	'prompt' => 'Базовый профиль',
    ]) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList($gender ?: [], [
    	'prompt' => 'Без указания пола',
    ]) ?>

    <?= $form->field($model, 'birthplace')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'birthdate')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'appearance')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sex')->dropDownList($sex ?: [], [
    	'prompt' => 'Без указания ориентации',
    ]) ?>

    <?= $form->field($model, 'profession')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'deathplace')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'deathdate')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ord')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hidden')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cpanel', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
