<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Gender */

$this->title = Yii::t('cpanel', 'Update Gender: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Genders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cpanel', 'Update');
?>
<div class="gender-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
