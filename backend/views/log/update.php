<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Log */

$this->title = Yii::t('cpanel', 'Update Log: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cpanel', 'Update');
?>
<div class="log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
