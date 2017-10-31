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
/* @var $annotation common\models\Annotation */
/* @var $book array */

Pjax::begin();

echo Html::beginForm('view', 'get', [
	'class' => 'form-horizontal',
	'data-pjax' => 1,
]);

echo Html::hiddenInput('id', $model->id);

?><div class="panel panel-info">
	<div class="panel-heading">
		<div class="input-group w-100"><?php
			echo Html::label('Просмотреть для книги:', 'book_id', [
				'class' => 'control-label pull-left',
			]);
			?><div class="col-md-3"><?php
				echo Html::dropDownList('book_id', isset($annotation) ? $annotation->book_id : null, $book ?: [],
					[
						'class' => 'form-control',
						'id' => 'book_id',
						'prompt' => 'Выберите книгу',
					]);
				?></div>
		</div>
	</div>
	<div class="panel-body"><?php
		echo !isset($annotation) || empty($annotation->content)
			? 'Для просмотра аннотации выберите книгу.'
			: $annotation->content;
	?></div>
</div><?

echo Html::endForm();

Pjax::end();