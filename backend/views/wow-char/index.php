<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\WowCharSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wow Chars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wow-char-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Wow Char', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'name',
                'format' => 'html',
	            'value' => function($model)
	            {
	            	return '<strong style="color: '.$model->spec->class->color.'">'.$model->name.'</strong>';
	            },
            ],
            [
            	'attribute' => 'spec_code',
				'format' => 'html',
				'value' => function($model)
				{
	            	return '<img height="30" src="'.$model->spec->image.'" alt="'.$model->spec->name.'"/>';
				},
            ],
            [
            	'attribute' => 'race_code',
	            'format' => 'html',
                'value' => function($model)
                {
	                return '<img height="30" src="'.$model->race->image.'" alt="'.$model->race->race->name.'"/>';
                },
            ],
            [
            	'attribute' => 'alliance',
	            'format' => 'html',
				'value' => function($model)
				{
    	            return '<img height="30" src="https://worldofwarcraft.akamaized.net/static/components/Logo/Logo-'.(0 == $model->race->race->alliance ? 'horde' : 'alliance').'.png"/>';
				},
            ],
            [
            	'attribute' => 'prof1_code',
                'value' => 'prof1.name',
            ],
            [
            	'attribute' => 'prof2_code',
                'value' => 'prof2.name',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
