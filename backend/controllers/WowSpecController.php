<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * WowSpecController implements the CRUD actions for WowSpec model.
 */
class WowSpecController extends Controller
{
	use CRUDTrait;

	public $model = '\backend\models\wow\WowSpec';
	public $searchModel = '\backend\models\wow\WowSpecSearch';

	public function actionIndex()
	{
		return $this->__actionIndex([
			'defaultOrder' => [
				'class_code' => SORT_ASC,
				'name' => SORT_ASC,
			],
			'pageSize' => 40,
		]);
	}
}
