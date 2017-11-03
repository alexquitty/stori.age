<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use common\models\Chapter;
use common\models\Snowflake;
use yii\web\Controller;

/**
 * SceneController implements the CRUD actions for Scene model.
 */
class SceneController extends Controller
{
	use CRUDTrait;


	public $model = 'Scene';
	public $searchModel = 'SceneSearch';

	protected function __beforeActionChange(&$model, &$params)
	{
		$snowflake = Snowflake::find()
			->select('id')
			->where(['type' => 'scene'])
			->indexBy('id')
			->asArray()
			->column();

		$this->viewParams = [
			'snowflake' => $snowflake,
			'chapter' => Chapter::find()->published()->prepareForSelect()->column(),
		];
	}
}
