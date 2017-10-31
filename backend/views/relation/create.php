<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Relation */

$this->title = Yii::t('cpanel', 'Create Relation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Relations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
