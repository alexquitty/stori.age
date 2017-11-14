<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\wow\WowSpecSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wow Specs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wow-spec-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>-->
    <!--    --><?//= Html::a('Create Wow Spec', ['create'], ['class' => 'btn btn-success']) ?>
    <!--</p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'code',
            // 'class_code',
            // 'name',
	        [
		        'attribute' => 'name',
		        'format' => 'html',
		        'value' => function($model)
		        {
			        return '<img height="30" src="'.$model->class->image.'"/>&nbsp;<img height="30" src="'.$model->image.'"/> <span style="margin-left: 10px; color: '.$model->class->color.'">'.$model->name.'</span>';
		        },
	        ],
	        [
	        	'attribute' => 'available',
		        'format' => 'raw',
		        'value' => function($model)
		        {
	                $result = '<span onclick="$(this).next().toggle()">...</span><div style="display: none">';

			        $races = $model->class->availableRaces;
		        	foreach($races as $race)
		        		$result .= (empty($result)?'':'<br/>').$race->race->name.' <img height="16" src="https://worldofwarcraft.akamaized.net/static/components/Logo/Logo-'.(0 == $race->race->alliance ? 'horde' : 'alliance').'.png" alt="'.(0 == $race->race->alliance ? 'Horde' : 'Alliance').'"/>';

		        	return $result.'</div>';
		        },
	        ],
	        [
	        	'attribute' => 'character',
		        'format' => 'html',
		        'value' => function($model)
		        {
		        	return $model->char->name;
		        },
	        ],
            // [
            // 	'attribute' => 'type',
	         //    'value' => function($model)
	         //    {
	         //    	switch($model->type)
		     //        {
			 //            case 'd':
			 //            	return 'Damage Dealer';
			 //            case 'h':
			 //            	return 'Healer';
			 //            default:
			 //            	return 'Tank';
		     //        }
	         //    },
            // ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
