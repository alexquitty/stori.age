<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Book */
/* @var $cycle array */

$this->title = Yii::t('cpanel', 'Create Book');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	    'cycle' => $cycle,
    ]) ?>

</div>
