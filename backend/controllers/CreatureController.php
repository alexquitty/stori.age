<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * CreatureController implements the CRUD actions for Creature model.
 */
class CreatureController extends Controller
{
	use CRUDTrait;


	public $model = 'Creature';
	public $searchModel = 'CreatureSearch';
}
