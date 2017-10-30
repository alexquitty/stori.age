<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Annotation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Annotations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="annotation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	    <?= Html::a(Yii::t('cpanel', 'Create Annotation'), ['create'], ['class' => 'btn btn-success']) ?>
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
            'book_id',
            'snowflake_id',
            'content:ntext',
        ],
    ]) ?>

</div>
