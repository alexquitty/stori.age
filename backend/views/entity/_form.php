<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Entity */
/* @var $form yii\widgets\ActiveForm */
/* @var $entityType array */

// \func::d($entityType);die();

?>
<div class="entity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_code')->dropDownList($entityType) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cpanel', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
