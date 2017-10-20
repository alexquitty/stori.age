<?php

namespace backend\controllers;


use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * EntityController implements the CRUD actions for Entity model.
 */
class EntityController extends Controller
{
	use CRUDTrait;


	public $model = 'Entity';
	public $searchModel = 'EntitySearch';

	/**
	 * @param $model \yii\db\ActiveRecord
	 * @param $params
	 */
	protected function __beforeActionChange(&$model, &$params)
	{
		$className = ucfirst($model::tableName());
		$params[$className]['letter'] = mb_substr($params[$className]['name'], 0, 1);
	}
}
