<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\wow\WowSpec */

$this->title = 'Create Wow Spec';
$this->params['breadcrumbs'][] = ['label' => 'Wow Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wow-spec-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
