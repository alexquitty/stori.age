<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CharacterCard */

$this->title = Yii::t('cpanel', 'Create Character Card');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Character Cards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="character-card-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
