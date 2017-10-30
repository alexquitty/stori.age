<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * CycleController implements the CRUD actions for Cycle model.
 */
class CycleController extends Controller
{
	use CRUDTrait;

	public $model = 'Cycle';
	public $searchModel = 'CycleSearch';
}