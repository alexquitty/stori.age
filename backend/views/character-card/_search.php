<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CharacterCardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="character-card-search">

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

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'story') ?>

    <?php // echo $form->field($model, 'motivation') ?>

    <?php // echo $form->field($model, 'aim') ?>

    <?php // echo $form->field($model, 'conflict') ?>

    <?php // echo $form->field($model, 'clarification') ?>

    <?php // echo $form->field($model, 'events') ?>

    <?php // echo $form->field($model, 'ord') ?>

    <?php // echo $form->field($model, 'hidden') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cpanel', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cpanel', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
