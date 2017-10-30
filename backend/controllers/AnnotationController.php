<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use common\models\Book;
use common\models\Snowflake;
use yii\web\Controller;

/**
 * AnnotationController implements the CRUD actions for Annotation model.
 */
class AnnotationController extends Controller
{
	use CRUDTrait;

	public $model = 'Annotation';
	public $searchModel = 'AnnotationSearch';

	protected function __beforeActionChange(&$model, &$params)
	{
		$book = Book::find()
			->select('name')
			->indexBy('id')
			->asArray()
			->column();

		$snowflake = Snowflake::find()
			->select('id')
			->indexBy('id')
			->asArray()
			->column();

		$this->viewParams = [
			'book' => $book,
			'snowflake' => $snowflake,
		];
	}
}
