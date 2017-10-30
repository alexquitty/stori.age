<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Snowflake */
/* @var $form yii\widgets\ActiveForm */
/* @var $type */
?>

<div class="snowflake-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'type')->dropDownList($model->getType() ?: [], [
		'prompt' => 'Без привязки',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cpanel', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
