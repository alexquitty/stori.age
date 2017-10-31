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

		foreach($character as $item)
		{
			echo $item->lastname;
			?><?php
		}
	?></div>
</div><?

echo Html::endForm();

Pjax::end();