<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Log */

$this->title = Yii::t('cpanel', 'Create Log');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
