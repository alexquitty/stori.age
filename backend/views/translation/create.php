<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SourceMessage */
/* @var $model2 common\models\Message */

$this->title = Yii::t('cpanel', 'Create Source Message');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	    'model2' => $model2,
    ]) ?>

</div>
