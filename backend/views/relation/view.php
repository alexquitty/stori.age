<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Relation */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Relations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	    <?= Html::a(Yii::t('cpanel', 'Create Relation'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('cpanel', 'Update'), ['update', 'id' => $model->code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('cpanel', 'Delete'), ['delete', 'id' => $model->code], [
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
            'code',
            'name',
            [
            	'attribute' => 'cognate',
                'format' => 'boolean',
            ],
            [
            	'attribute' => 'negative',
	            'format' => 'boolean',
            ],
        ],
    ]) ?>

</div>
