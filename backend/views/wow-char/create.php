<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\wow\WowChar */

$this->title = 'Create Wow Char';
$this->params['breadcrumbs'][] = ['label' => 'Wow Chars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wow-char-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
