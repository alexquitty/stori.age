<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Entity */
/* @var $entityType array */

$this->title = Yii::t('cpanel', 'Create Entity');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Entities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
	    'entityType' => $entityType,
        'model' => $model,
    ]) ?>

</div>