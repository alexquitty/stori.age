<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $menuType array */

$this->title = Yii::t('cpanel', 'Create Menu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	    'menuType' => $menuType,
    ]) ?>

</div>
