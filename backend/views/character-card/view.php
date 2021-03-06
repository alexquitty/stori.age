<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CharacterCard */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Character Cards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="character-card-view">

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
            'entity_id',
            'bookpart_id',
            'name',
            'story:ntext',
            'motivation:ntext',
            'aim:ntext',
            'conflict:ntext',
            'clarification:ntext',
            'events:ntext',
            'ord',
            'hidden',
        ],
    ]) ?>

</div>
