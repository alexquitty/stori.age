<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * BookpartController implements the CRUD actions for Bookpart model.
 */
class BookpartController extends Controller
{
	use CRUDTrait;


	public $model = 'Bookpart';
	public $searchModel = 'BookpartSearch';
}
