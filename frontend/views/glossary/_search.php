<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EntitySearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $items */
?>

<div class="entity-search panel panel-default">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
	        'class' => 'one-liner-search panel-body',
            'data-pjax' => 1,
        ],
    ]);

    ?><div class="row">

    <?= $form->field($model, 'id', [
    	'options' => ['class' => 'col-md-2']
    ])->label(false)->textInput([
	    'placeholder' => $model->getAttributeLabel('id')
    ]);
    ?>

	<?= $form->field($model, 'letter', [
		'options' => ['class' => 'none']
	])->label(false)->hiddenInput() ?>

    <?= $form->field($model, 'type_code', [
    	'options' => ['class' => 'col-md-2']
    ])->label(false)->dropDownList($items ?: [], [
    	'prompt' => $model->getAttributeLabel('type_code')
    ]);
    ?>

    <?= $form->field($model, 'name', [
    	'options' => ['class' => 'col-md-3']
    ])->label(false)->textInput([
    	'placeholder' => $model->getAttributeLabel('name')
    ]);
    ?>

    <?= $form->field($model, 'description', [
    	'options' => ['class' => 'col-md-3']
    ])->label(false)->textInput([
    	'placeholder' => $model->getAttributeLabel('description')
    ]);
    ?>
    <div class="col-md-2">
        <?= Html::submitButton(Yii::t('cpanel', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cpanel', 'Reset'), ['class' => 'btn btn-default pull-right']) ?>
    </div>
	</div>
    <?php ActiveForm::end(); ?>

</div>
