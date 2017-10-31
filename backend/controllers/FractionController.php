<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * FractionController implements the CRUD actions for Fraction model.
 */
class FractionController extends Controller
{
	use CRUDTrait;


	public $model = 'Fraction';
	public $searchModel = 'FractionSearch';
}
