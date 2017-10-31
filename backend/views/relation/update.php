<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Relation */

$this->title = Yii::t('cpanel', 'Update Relation: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Relations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = Yii::t('cpanel', 'Update');
?>
<div class="relation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
