<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cycle */
/* @var $cycle array */

$this->title = Yii::t('cpanel', 'Create Cycle');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Cycles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cycle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	    'cycle' => $cycle,
    ]) ?>

</div>
