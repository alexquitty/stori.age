<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use common\models\Snowflake;
use yii\web\Controller;

/**
 * ChapterController implements the CRUD actions for Chapter model.
 */
class ChapterController extends Controller
{
	use CRUDTrait;


	public $model = 'Chapter';
	public $searchModel = 'ChapterSearch';

	protected function __beforeActionChange(&$model, &$params)
	{
		$snowflake = Snowflake::find()
			->select('id')
			->indexBy('id')
			->orderBy(['id' => SORT_ASC])
			->column();

		$this->viewParams = [
			'snowflake' => $snowflake,
		];
	}
}
