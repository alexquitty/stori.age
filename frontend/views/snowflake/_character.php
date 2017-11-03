<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 30.10.2017
 * Time: 18:39
 */

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $model common\models\Snowflake */
/* @var $card common\models\CharacterCard */
/* @var $character array of common\models\Character */
/* @var $bookpart array */

Pjax::begin();

echo Html::beginForm('view', 'get', [
	'class' => 'form-horizontal',
	'data-pjax' => 1,
]);

echo Html::hiddenInput('id', $model->id);

?><div class="panel panel-info">
	<div class="panel-heading">
		<div class="input-group w-100"><?php
			echo Html::label('Просмотреть для:', 'bookpart_id', [
				'class' => 'control-label pull-left',
			]);
			?><div class="col-md-3"><?php
				echo Html::dropDownList('bookpart_id', isset($character) ? $character[0]->bookpart_id : null, $bookpart ?: [],
					[
						'class' => 'form-control',
						'id' => 'bookpart_id',
						'prompt' => 'Выберите часть',
					]);
				?></div>
		</div>
	</div>
	<div class="panel-body"><?php
		if(empty($character))
			echo 'Для просмотра анкет выберите часть книги.';

		else
		{
			foreach($character as $char)
			{
				?><h4><?=$char['name']?></h4><?php
				?><dl class="row"><?php
					foreach($char as $key => $item)
						if('name' != $key && false === strpos($key, 'id'))
						{
							?><dt class="col-sm-3"><?=$card->getAttributeLabel($key)?></dt>
							<dd class="col-sm-9"><?=$item ?: '<i>(Не указано)</i>'?></dd><?php
						}
				?></dl><?php
			}
		}
	?></div>
</div><?

echo Html::endForm();

Pjax::end();