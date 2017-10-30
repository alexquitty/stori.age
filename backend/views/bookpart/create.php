<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Bookpart */
/* @var $book array */

$this->title = Yii::t('cpanel', 'Create Bookpart');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Bookparts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookpart-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	    'book' => $book,
    ]) ?>

</div>
