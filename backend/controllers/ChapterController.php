<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use common\models\Bookpart;
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
		$this->viewParams = [
			'bookpart' => Bookpart::find()->published()->prepareForSelect()->column(),
		];
	}
}
