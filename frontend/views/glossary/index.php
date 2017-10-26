<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EntitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $types */
/* @var $letters */
$this->title = Yii::t('website', 'Entities');
$this->params['breadcrumbs'][] = $this->title;

?><div class="entity-index">
    <h1><?= Html::encode($this->title) ?></h1><?php

	Pjax::begin();

	if(!\Yii::$app->user->isGuest)
	{
		// ?><!--<p>--><?//=Html::a(Yii::t('cpanel', 'Create Entity'), ['create'], ['class' => 'btn btn-success'])?><!--</p>--><?php
	}

	echo $this->render('_search', [
		'model' => $searchModel,
		'items' => $types,
	]);

	echo $this->render('_letterPanel', [
		'model' => $searchModel,
		'items' => $letters,
	]);

	echo $this->render('_definitionView', [
		'dataProvider' => $dataProvider,
		'model' => $searchModel,
		'types' => $types,
	]);

	echo LinkPager::widget([
		'pagination' => $dataProvider->getPagination(),
		'options' => [
			'class' => 'pagination pull-right',
		],
	]);

	Pjax::end();

?></div>
