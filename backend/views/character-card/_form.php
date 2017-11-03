<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CharacterCard */
/* @var $form yii\widgets\ActiveForm */
/* @var $bookpart */
/* @var $entity */
/* @var $snowflake */
?>

<div class="character-card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'entity_id')->dropDownList($entity ?: []) ?>

    <?= $form->field($model, 'bookpart_id')->dropDownList($bookpart ?: [], [
    	'prompt' => 'Без привязки к части',
    ]) ?>

	<?= $form->field($model, 'snowflake_id')->dropDownList($snowflake ?: [], [
		'prompt' => 'Без привязки к шагу',
	]) ?>

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
