<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EntityType */
/* @var $entityType array */

$this->title = Yii::t('cpanel', 'Create Entity Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Entity Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entity-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	    'entityType' => $entityType,
    ]) ?>

</div>
