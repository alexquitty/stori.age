<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Creature */

$this->title = Yii::t('cpanel', 'Create Creature');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Creatures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="creature-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
