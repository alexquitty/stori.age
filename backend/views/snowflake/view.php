<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Snowflake */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Snowflakes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="snowflake-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
            'description:ntext',
	        [
	        	'attribute' => 'type',
		        'value' => function($model)
		        {
		        	/* @var $model \common\models\Snowflake */
		        	return $model->getType($model->type);
		        },
	        ],
        ],
    ]) ?>

</div>
