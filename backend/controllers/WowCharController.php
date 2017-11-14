<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * GenderController implements the CRUD actions for Gender model.
 */
class WowCharController extends Controller
{
	use CRUDTrait;


	public $model = 'backend\models\wow\WowChar';
	public $searchModel = 'WowCharSearch';
}
