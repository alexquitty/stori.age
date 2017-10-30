<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Snowflake */

$this->title = Yii::t('cpanel', 'Create Snowflake');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cpanel', 'Snowflakes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="snowflake-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
