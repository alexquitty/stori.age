<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use common\models\Cycle;
use yii\web\Controller;

/**
 * CycleController implements the CRUD actions for Cycle model.
 */
class CycleController extends Controller
{
	use CRUDTrait;


	public $model = 'Cycle';
	public $searchModel = 'CycleSearch';

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