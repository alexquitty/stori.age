<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('cpanel', 'Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>-->
    <!--    --><?//= Html::a(Yii::t('cpanel', 'Create Log'), ['create'], ['class' => 'btn btn-success']) ?>
    <!--</p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'user_id',
	        [
	        	'attribute' => 'username',
		        'value' => 'user.username',
	        ],
            [
            	'attribute' => 'date',
	            'format' => ['date', 'php:d.m.Y H:i:s'],
            ],
            'table_name',
            'item_key',
            //'action',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
