<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Scene */

$this->title = Yii::t('cpanel', 'Update Scene: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Scenes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cpanel', 'Update');
?>
<div class="scene-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	    'chapter' => $chapter,
	    'snowflake' => $snowflake,
    ]) ?>

</div>
