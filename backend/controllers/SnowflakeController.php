<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * SnowflakeController implements the CRUD actions for Snowflake model.
 */
class SnowflakeController extends Controller
{
	use CRUDTrait;

	public $model = 'Snowflake';
	public $searchModel = 'SnowflakeSearch';
}
