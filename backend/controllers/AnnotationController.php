<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * AnnotationController implements the CRUD actions for Annotation model.
 */
class AnnotationController extends Controller
{
	use CRUDTrait;

	public $model = 'Annotation';
	public $searchModel = 'AnnotationSearch';
}
