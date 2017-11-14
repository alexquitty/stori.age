<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\wow\WowSpec */

$this->title = 'Update Wow Spec: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Wow Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'code' => $model->code, 'class_code' => $model->class_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wow-spec-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
