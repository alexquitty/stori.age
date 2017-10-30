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
		?><div class="panel panel-default">
			<div class="panel-heading">
				<a href="<?=\yii\helpers\Url::to(['snowflake/view', 'id' => $item['id']])?>" class="btn btn-default btn-sm">
					Шаг <?=$item['id']?>
					&nbsp;
					<span class="glyphicon glyphicon-eye-open"></span>
				</a>
			</div>
			<div class="panel-body"><?=$item['description']?></div>
		</div><?php
	}
?></div>