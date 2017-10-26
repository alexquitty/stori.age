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
/* @var $bookModel */
/* @var $books array */

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

		$form = ActiveForm::begin([
			'layout' => 'horizontal',
			'action' => [ 'index' ],
			'method' => 'get',
			'options' => [
				'data-pjax' => 1,
			],
			'fieldConfig' => [
				'horizontalCssClasses' => [
					'label' => 'pull-left',
					'offset' => 'col-md-offset-1',
					'wrapper' => 'col-md-3',
				],
			],
		]);

		?>
		<div class="panel panel-info">
			<div class="panel-heading">
				<?=$form
					->field($model, 'id', [
						'options' => ['class' => 'input-group w-100'],
					])
					->label('Просмотреть для книги:')
					->dropDownList($books ?: [], ['prompt' => 'Выберите книгу'])?>
			</div>
			<div class="panel-body">
				Для просмотра аннотации выберите книгу.
			</div>
		</div><?

		ActiveForm::end();

		Pjax::end();
	}

?></div>