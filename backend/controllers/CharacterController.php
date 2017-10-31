<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * CharacterController implements the CRUD actions for Character model.
 */
class CharacterController extends Controller
{
	use CRUDTrait;


	public $model = 'Character';
	public $searchModel = 'CharacterSearch';
}
