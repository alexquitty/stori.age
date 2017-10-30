<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SceneSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scene-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'chapter_id') ?>

    <?= $form->field($model, 'name') ?>

    <?//= $form->field($model, 'content') ?>

    <?= $form->field($model, 'ord') ?>

    <?php // echo $form->field($model, 'hidden') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cpanel', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cpanel', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
