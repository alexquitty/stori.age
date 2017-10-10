<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LogContent */

$this->title = Yii::t('cpanel', 'Create Log Content');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Log Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
