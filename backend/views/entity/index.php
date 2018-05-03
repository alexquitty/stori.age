<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\EntitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('cpanel', 'Entities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('cpanel', 'Create Entity'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'letter',
            [
                'attribute' => 'type_code',
                'value' => 'typeCode.name',
            ],
            'name',
            'name_stressed',
            [
            	'attribute' => 'description',
	            'contentOptions' => [ 'class' => 'trunc' ],
            ],
            // 'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>