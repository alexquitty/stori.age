<?php

use yii\helpers\Html;
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
	// echo $this->render('_search', ['model' => $searchModel]);

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

    // echo GridView::widget([
    //     'dataProvider' => $dataProvider,
    //     'filterModel' => $searchModel,
    //     'layout' => "{items}{summary}\n{pager}",
    //     'columns' => [
    //         ['class' => 'yii\grid\SerialColumn'],
    //
    //         'id',
    //         'letter',
    //         'type_code',
    //         'name',
    //         [
    //         	'attribute' => 'description',
	 //            'contentOptions' => [ 'class' => 'trunc' ],
    //         ],
    //         // 'description:ntext',
    //
    //         ['class' => 'yii\grid\ActionColumn'],
    //     ],
    // ]);

	Pjax::end();

?></div>
