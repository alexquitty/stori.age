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
			echo Html::label('Просмотреть для главы:', 'chapter_id', [
				'class' => 'control-label pull-left',
			]);
			?><div class="col-md-3"><?php
				echo Html::dropDownList('chapter_id', isset($scene) ? $scene[0]->chapter_id : null, $chapter ?: [],
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
			echo 'Для просмотра сцен выберите главу.';

		foreach($scene as $item)
		{
			?><?php
		}
	?></div>
</div><?

echo Html::endForm();

Pjax::end();