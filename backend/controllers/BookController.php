<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
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
	// protected function __beforeActionChange(&$model, &$params)
	// {
	// 	$entityType = EntityType::find()
	// 		->select('name')
	// 		->indexBy('code')
	// 		->asArray()
	// 		->column();
	// 	$this->viewParams = [
	// 		'entityType' => $entityType,
	// 	];
	//
	// 	$className = ucfirst($model::tableName());
	// 	$params[$className]['letter'] = mb_substr($params[$className]['name'], 0, 1);
	// }
}
