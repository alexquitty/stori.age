<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * GenderController implements the CRUD actions for Gender model.
 */
class GenderController extends Controller
{
	use CRUDTrait;


	public $model = 'Gender';
	public $searchModel = 'GenderSearch';
}
