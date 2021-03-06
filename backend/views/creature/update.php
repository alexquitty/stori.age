<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Creature */

$this->title = Yii::t('cpanel', 'Update Creature: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Creatures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cpanel', 'Update');
?>
<div class="creature-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
