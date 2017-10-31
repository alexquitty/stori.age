<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use common\models\Bookpart;
use common\models\Entity;
use common\models\Gender;
use yii\web\Controller;

/**
 * CharacterController implements the CRUD actions for Character model.
 */
class CharacterController extends Controller
{
	use CRUDTrait;


	public $model = 'Character';
	public $searchModel = 'CharacterSearch';

	protected function __afterModelSaved(&$model, &$params)
	{
		return true;
	}

	/**
	 * @param $model \yii\db\ActiveRecord
	 * @param $params
	 */
	protected function __beforeActionChange(&$model, &$params)
	{
		$bookpart = Bookpart::find()->prepareForSelect()->column();
		$char = Entity::find()->character(true)->column();
		$gender = Gender::find()->gender(true)->column();
		$sex = Gender::find()->sex(true)->column();
		$race = Entity::find()->race(true)->column();

		$this->viewParams = [
			'bookpart' => $bookpart,
			'char' => $char,
			'gender' => $gender,
			'race' => $race,
			'sex' => $sex,
		];
	}
}
