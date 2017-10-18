<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \LogContent */

$this->title = Yii::t('cpanel', 'Update Log Content: {nameAttribute}', [
    'nameAttribute' => $model->log_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Log Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->log_id, 'url' => ['view', 'id' => $model->log_id]];
$this->params['breadcrumbs'][] = Yii::t('cpanel', 'Update');
?>
<div class="log-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
