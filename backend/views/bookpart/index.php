<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BookpartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('cpanel', 'Bookparts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookpart-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('cpanel', 'Create Bookpart'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'book_id',
	        [
	        	'attribute' => 'book_id',
		        'value' => 'book.name',
	        ],
            'name',
            'ord',
            // 'hidden',
	        [
		        'attribute' => 'hidden',
		        'format' => 'boolean',
	        ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
