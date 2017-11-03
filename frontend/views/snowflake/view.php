<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 26.10.2017
 * Time: 18:28
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Snowflake */
/* @var $annotation common\models\Annotation */
/* @var $card */
/* @var $book array */
/* @var $bookpart array */
/* @var $character common\models\Character */
/* @var $scene common\models\Scene */

$this->title = 'Шаг '.$model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('website', 'Snowflake'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?><div class="snowflake-view">

	<h1><?=Html::encode($this->title)?></h1>

	<?=$model->description?>

	<?php

	if(Yii::$app->user->can('author'))
	{
		switch($model->type)
		{
			case 'annotation':
				echo $this->render('_annotation', [
					'model' => $model,
					'annotation' => $annotation,
					'book' => $book,
				]);
				break;
			case 'character':
				echo $this->render('_character', [
					'model' => $model,
					'card' => $card,
					'character' => $character,
					'bookpart' => $bookpart,
				]);
				break;
			case 'scene':
				echo $this->render('_scene', [
					'model' => $model,
					'scene' => $scene,
					'bookpart' => $bookpart,
				]);
		}
	}

?></div>