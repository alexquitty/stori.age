<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
{
	use CRUDTrait;

	public $model = 'Book';
	public $searchModel = 'BookSearch';
}
