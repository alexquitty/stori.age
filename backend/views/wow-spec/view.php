<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\wow\WowSpec */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Wow Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wow-spec-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'code' => $model->code, 'class_code' => $model->class_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'code' => $model->code, 'class_code' => $model->class_code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'code',
            'class_code',
            'name',
            'type',
            'image',
        ],
    ]) ?>

</div>
