<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use common\models\Cycle;
use yii\web\Controller;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
{
	use CRUDTrait;


	public $model = 'Book';
	public $searchModel = 'BookSearch';

	/**
	 * @param $model \yii\db\ActiveRecord
	 * @param $params
	 */
	protected function __beforeActionChange(&$model, &$params)
	{
		$cycle = Cycle::find()
			->select('name')
			->indexBy('id')
			->asArray()
			->column();

		$this->viewParams = [
			'cycle' => $cycle,
		];
	}
}
