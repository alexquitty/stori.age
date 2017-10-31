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

	/**
	 * @param $model \yii\db\ActiveRecord
	 * @param $params
	 */
	protected function __beforeActionChange(&$model, &$params)
	{
		$bookpart = Bookpart::find()
			->select('name')
			->indexBy('id')
			->asArray()
			->column();

		$char = Entity::find()
			->select('name')
			->indexBy('id')
			->where([
				'cloned_id' => null,
				'type_code' => 'character',
			])
			->asArray()
			->column();

		$gender = Gender::find()
			->select('name')
			->indexBy('id')
			->where(['type' => 0])
			->asArray()
			->column();

		$sex = Gender::find()
			->select('name')
			->indexBy('id')
			->where(['type' => 1])
			->asArray()
			->column();

		$race = Entity::find()
			->select('name')
			->indexBy('id')
			->where([
				'type_code' => 'race',
			])
			->asArray()
			->column();

		$this->viewParams = [
			'bookpart' => $bookpart,
			'char' => $char,
			'gender' => $gender,
			'race' => $race,
			'sex' => $sex,
		];
	}
}
