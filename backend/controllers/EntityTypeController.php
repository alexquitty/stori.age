<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * EntityTypeController implements the CRUD actions for EntityType model.
 */
class EntityTypeController extends Controller
{
	use CRUDTrait;


	public $model = 'EntityType';
	public $searchModel = 'EntityTypeSearch';
}
