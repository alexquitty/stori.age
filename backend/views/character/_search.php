<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CharacterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="character-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'entity_id') ?>

    <?= $form->field($model, 'bookpart_id') ?>

    <?//= $form->field($model, 'firstname') ?>

    <?//= $form->field($model, 'middlename') ?>

    <?php // echo $form->field($model, 'lastname') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'birthplace') ?>

    <?php // echo $form->field($model, 'birthdate') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'appearance') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'profession') ?>

    <?php // echo $form->field($model, 'deathplace') ?>

    <?php // echo $form->field($model, 'deathdate') ?>

    <?php  echo $form->field($model, 'ord') ?>

    <?php  echo $form->field($model, 'hidden') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cpanel', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cpanel', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
