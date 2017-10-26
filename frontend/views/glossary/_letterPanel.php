<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 26.10.2017
 * Time: 14:20
 */

/* @var $items */
/* @var $model common\models\EntitySearch */

if(!empty($items))
{
	?><div class="panel panel-default">
		<div class="panel-body"><?php

			foreach($items as $id => $item)
			{
				?><button role="button" type="button" data-field="letter" class="btn btn-link<?= $item == $model->letter ? ' active" aria-pressed="true' : '' ?>"><?=$item?></button><?php
			}

	?></div></div><?php
}