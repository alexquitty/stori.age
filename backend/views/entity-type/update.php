<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EntityType */

$this->title = Yii::t('cpanel', 'Update Entity Type: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Entity Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = Yii::t('cpanel', 'Update');
?>
<div class="entity-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
