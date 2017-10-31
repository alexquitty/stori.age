<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Character */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Characters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="character-view">

    <h1><?= Html::encode($this->title) ?> <small>(<?=$model->entity->name?>)</small></h1>

    <p>
	    <?= Html::a(Yii::t('cpanel', 'Create Character'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('cpanel', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('cpanel', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('cpanel', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
            	'attribute' => 'entity_id',
	            'value' => function($model)
	            {
	            	return $model->entity->name;
	            },
            ],
            [
            	'attribute' => 'bookpart_id',
	            'value' => function($model)
	            {
	            	return $model->bookpart->name;
	            },
            ],
            'firstname',
            'middlename',
            'lastname',
            [
            	'attribute' => 'gender',
	            'value' => function($model)
	            {
	            	return $model->gender->name;
	            },
            ],
            'birthplace:ntext',
            'birthdate:ntext',
            'age',
            'appearance:ntext',
	        [
	        	'attribute' => 'sex',
		        'value' => function($model)
		        {
		        	return $model->sex->name;
		        },
	        ],
            'profession:ntext',
            'deathplace:ntext',
            'deathdate:ntext',
            'ord',
	        [
                'attribute' => 'hidden',
		        'format' => 'boolean',
	        ],
        ],
    ]) ?>

</div>
