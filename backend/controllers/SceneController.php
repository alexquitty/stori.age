<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * SceneController implements the CRUD actions for Scene model.
 */
class SceneController extends Controller
{
	use CRUDTrait;


	public $model = 'Scene';
	public $searchModel = 'SceneSearch';
}
