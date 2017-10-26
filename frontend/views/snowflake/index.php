<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 26.10.2017
 * Time: 16:48
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $data array */

$this->title = Yii::t('website', 'Snowflake');
$this->params['breadcrumbs'][] = $this->title;

?><div class="snowflake-index">
	<h1><?= Html::encode($this->title) ?></h1><?php

	foreach($data as $item)
	{
		?><h2>Шаг <?=$item['id']?></h2>
		<div class="col-md-12 text-justify"><?=$item['description']?></div><?php
	}
?></div>