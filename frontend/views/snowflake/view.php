<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 26.10.2017
 * Time: 18:28
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Snowflake */
/* @var $annotation common\models\Annotation */
/* @var $book array */

$this->title = 'Шаг '.$model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('website', 'Snowflake'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?><div class="snowflake-view">

	<h1><?=Html::encode($this->title)?></h1>

	<?=$model->description?>

	<?php

	if(Yii::$app->user->can('author'))
	{
		Pjax::begin();

		// $form = ActiveForm::begin([
		// 	'layout' => 'horizontal',
		// 	'action' => [ 'view' ],
		// 	'method' => 'get',
		// 	'options' => [
		// 		'data-pjax' => 1,
		// 	],
		// ]);

		echo Html::beginForm('view', 'get', [
			'class' => 'form-horizontal',
			'data-pjax' => 1,
		]);

		echo Html::hiddenInput('id', $model->id);

		?>
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="input-group w-100"><?php
					echo Html::label('Просмотреть для книги:', 'book_id', [
						'class' => 'control-label pull-left',
					]);
					?><div class="col-md-3"><?php
						echo Html::dropDownList('book_id', $annotation->book_id, $book ?: [],
							[
								'class' => 'form-control',
								'id' => 'book_id',
								'prompt' => 'Выберите книгу',
							]);
					?></div>
				</div>
			</div>
			<div class="panel-body">
				Для просмотра аннотации выберите книгу.
			</div>
		</div><?

		echo Html::endForm();

		Pjax::end();
	}

?></div>