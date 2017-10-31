<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use common\models\EntityType;
use yii\web\Controller;

/**
 * EntityTypeController implements the CRUD actions for EntityType model.
 */
class EntityTypeController extends Controller
{
	use CRUDTrait;


	public $model = 'EntityType';
	public $searchModel = 'EntityTypeSearch';

	/**
	 * @param $model \yii\db\ActiveRecord
	 * @param $params
	 */
	protected function __beforeActionChange(&$model, &$params)
	{
		$entityType = EntityType::find()
			->select('name')
			->indexBy('code')
			->orderBy(['name' => SORT_ASC])
			->asArray()
			->column();

		$this->viewParams = [
			'entityType' => $entityType,
		];
	}
}