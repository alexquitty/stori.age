<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Annotation */

$this->title = Yii::t('cpanel', 'Create Annotation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Annotations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="annotation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
