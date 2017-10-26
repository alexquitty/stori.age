<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 26.10.2017
 * Time: 18:28
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Snowflake */
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
			'action' => [ 'index' ],
			'method' => 'get',
			'options' => [
				'data-pjax' => 1,
			],
		]);

		?>
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="row">
					<?=$form
						->field($model, 'id', [
							'options' => [ 'class' => 'col-md-2' ]
						])
						->label('Заполнить для книги:', [
							'class' => 'pull-left'
						])
						->dropDownList($books ? : [], [
							'prompt' => 'Выберите книгу',
						])?>
				</div>
			</div>
			<div class="panel-body">
				<?=$form
					->field($model, 'description')
					->label(false)
					->textarea()?>
			</div>
		</div><?

		ActiveForm::end();

		Pjax::end();
	}

?></div>