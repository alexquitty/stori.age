<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Entity */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Entities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	    <?= Html::a(Yii::t('cpanel', 'Create Entity'), ['create'], ['class' => 'btn btn-success']) ?>
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
            	'attribute' => 'type_code',
	            'value' => function($model)
                {
	                return $model->typeCode->name;
				},
            ],
            'name',
            'description:ntext',
        ],
    ]) ?>

</div>