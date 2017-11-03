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
/* @var $scene array of common\models\Scene */
/* @var $chapter array */

Pjax::begin();

echo Html::beginForm('view', 'get', [
	'class' => 'form-horizontal',
	'data-pjax' => 1,
]);

echo Html::hiddenInput('id', $model->id);

?><div class="panel panel-info">
	<div class="panel-heading">
		<div class="input-group w-100"><?php

			echo Html::label('Просмотреть для:', 'chapter_id', [
				'class' => 'control-label pull-left',
			]);
			?><div class="col-md-3"><?php
				echo Html::dropDownList('bookpart_id', isset($bookpart) ? $bookpart_id : null, $bookpart ?: [],
					[
						'class' => 'form-control',
						'id' => 'bookpart_id',
						'prompt' => 'Выберите часть книги',
					]);
				?></div><?php

			echo Html::label('и главы:', 'chapter_id', [
				'class' => 'control-label pull-left',
			]);
			?><div class="col-md-3"><?php
				echo Html::dropDownList('chapter_id', isset($chapter) ? $chapter_id : null, $chapter ?: [],
					[
						'class' => 'form-control',
						'id' => 'chapter_id',
						'prompt' => 'Выберите главу',
					]);
			?></div>

		</div>
	</div>
	<div class="panel-body"><?php
		if(empty($scene[0]))
			echo empty($chapter_id)
				? 'Для просмотра сцен выберите главу.'
				: '<span class="alert-warning">Для этой главый сцены пока отсутсвуют.</span>';

		foreach($scene as $item)
		{
			?><?php
		}
	?></div>
</div><?

echo Html::endForm();

Pjax::end();