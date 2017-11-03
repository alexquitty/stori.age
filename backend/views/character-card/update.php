<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CharacterCard */
/* @var $bookpart */
/* @var $entity */
/* @var $snowflake */

$this->title = Yii::t('cpanel', 'Update Character Card: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Character Cards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cpanel', 'Update');
?>
<div class="character-card-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	    'bookpart' => $bookpart,
	    'entity' => $entity,
	    'snowflake' => $snowflake,
    ]) ?>

</div>
