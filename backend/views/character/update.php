<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Character */
/* @var $bookpart */
/* @var $entity */
/* @var $gender */
/* @var $sex */

$this->title = Yii::t('cpanel', 'Update Character: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Characters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cpanel', 'Update');
?>
<div class="character-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	    'bookpart' => $bookpart,
	    'entity' => $entity,
	    'gender' => $gender,
	    'sex' => $sex,
    ]) ?>

</div>
