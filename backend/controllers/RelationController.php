<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * RelationController implements the CRUD actions for Relation model.
 */
class RelationController extends Controller
{
	use CRUDTrait;


	public $model = 'Relation';
	public $searchModel = 'RelationSearch';

	public function actionIndex()
	{
		return $this->__actionIndex([
			'defaultOrder' => [
				'cognate' => SORT_DESC,
				'name' => SORT_ASC,
				'negative' => SORT_ASC,
			],
		]);
	}
}