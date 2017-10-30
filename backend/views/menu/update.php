<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $menuType array */

$this->title = Yii::t('cpanel', 'Update Menu: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = Yii::t('cpanel', 'Update');
?>
<div class="menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	    'menuType' => $menuType,
    ]) ?>

</div>
