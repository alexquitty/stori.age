<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\wow\WowChar */

$this->title = 'Update Wow Char: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Wow Chars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wow-char-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
