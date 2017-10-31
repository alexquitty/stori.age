<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Character */
/* @var $bookpart */
/* @var $entity */
/* @var $gender */
/* @var $race */
/* @var $sex */

$this->title = Yii::t('cpanel', 'Create Character');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Characters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="character-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	    'bookpart' => $bookpart,
	    'entity' => $entity,
	    'gender' => $gender,
	    'race' => $race,
	    'sex' => $sex,
    ]) ?>

</div>
