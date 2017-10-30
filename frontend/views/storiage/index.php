<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 30.10.2017
 * Time: 17:42
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $menu array */

$this->title = Yii::t('website', 'Storiage');
$this->params['breadcrumbs'][] = $this->title;

?><div class="storiage-index">
	<div class="jumbotron">
		<h1><?= Html::encode($this->title) ?></h1>
	</div><?php

	if(empty($menu))
	{
		?><div class="panel panel-info">
			<div class="panel-heading">Подразделов не найдено.</div>
		</div><?php
	}
	else
	{
		?><div class="list-group"><?php
			foreach($menu as $item)
			{
				?><a class="list-group-item list-group-item-action" href="/<?=$item['parent_code']?>/<?=$item['code']?>/"><?=$item['name']?></a><?php
			}
		?></div><?php
	}

	?>
</div>