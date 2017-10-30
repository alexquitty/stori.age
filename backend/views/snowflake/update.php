<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Snowflake */

$this->title = Yii::t('cpanel', 'Update Snowflake: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Snowflakes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cpanel', 'Update');
?>
<div class="snowflake-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
