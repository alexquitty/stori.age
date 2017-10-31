<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CharacterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('cpanel', 'Characters');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="character-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('cpanel', 'Create Character'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'entity_id',
                'value' => 'entity.name',
            ],
            [
                'attribute' => 'bookpart_id',
                'value' => 'bookpart.name',
            ],
            //'firstname',
            //'middlename',
            //'lastname',
            //'gender_id',
            //'birthplace:ntext',
            //'birthdate:ntext',
            //'age',
            //'appearance:ntext',
            //'sex_id',
            //'profession:ntext',
            //'deathplace:ntext',
            //'deathdate:ntext',
            'ord',
            [
            	'attribute' => 'hidden',
	            'format' => 'boolean',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
