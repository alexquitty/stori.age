<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Fraction */

$this->title = Yii::t('cpanel', 'Create Fraction');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Fractions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fraction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
