<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use common\models\Book;
use yii\web\Controller;

/**
 * BookpartController implements the CRUD actions for Bookpart model.
 */
class BookpartController extends Controller
{
	use CRUDTrait;


	public $model = 'Bookpart';
	public $searchModel = 'BookpartSearch';

	/**
	 * @param $model \yii\db\ActiveRecord
	 * @param $params
	 */
	protected function __beforeActionChange(&$model, &$params)
	{
		$book = Book::find()
			->select('name')
			->indexBy('id')
			->asArray()
			->column();

		$this->viewParams = [
			'book' => $book,
		];
	}
}
