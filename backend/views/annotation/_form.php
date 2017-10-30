<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Annotation */
/* @var $form yii\widgets\ActiveForm */
/* @var $book array */
/* @var $snowflake array */
?>

<div class="annotation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_id')->dropDownList($book ?: [], [
    	'prompt' => 'Без книги',
    ]) ?>

    <?= $form->field($model, 'snowflake_id')->dropDownList($snowflake ?: [], [
    	'prompt' => 'Без шага в «Снежинке»',
    ]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cpanel', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
