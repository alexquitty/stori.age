<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SourceMessage */

$this->title = Yii::t('cpanel', 'Update Source Message: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cpanel', 'Update');
?>
<div class="source-message-update">

    <h1><?= Html::encode($this->title),($model->message ? ' <small>('.$model->message.')</small>' : '') ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	    'model2' => $model2,
    ]) ?>

</div>
