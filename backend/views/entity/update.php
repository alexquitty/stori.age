<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Entity */
/* @var $entityType array */

$this->title = Yii::t('cpanel', 'Update Entity: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Entities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cpanel', 'Update');
?>
<div class="entity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
	    'entityType' => $entityType,
        'model' => $model,
    ]) ?>

</div>
