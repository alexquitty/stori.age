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
	<h1><?= Html::encode($this->title) ?></h1><?php

	if(empty($menu))
	{
		?><div class="panel panel-info">
			<div class="panel-heading">Подразделов не найдено.</div>
		</div><?php
	}
	else
	{
		?><div class="panel panel-default">
			<div class="panel-body">
				<ul><?php
					foreach($menu as $item)
					{
						?><li><a href="/<?=$item['parent_code']?>/<?=$item['code']?>/"><?=$item['name']?></a></li><?php
					}
				?></ul>
			</div>
		</div><?php
	}

	?>
</div>