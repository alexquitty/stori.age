<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use common\models\Bookpart;
use common\models\CharacterRace;
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
		$result = true;

		$races = $params['race'];
		$raceModel = CharacterRace::find()
			->where([ 'character_id' => $model->id ])
			->indexBy('race_id')
			->all();

		$raceToRemove = array_keys($raceModel);

		foreach($races as $race)
		{
			if(!empty($key = array_search($race, $raceToRemove)))
				unset($raceToRemove[$key]);
			else
			{
				$newRace = new CharacterRace();
				$newRace->setAttributes([
					'character_id' => $model->id,
					'race_id' => $race,
				]);
				if(!$newRace->save())
				{
					$result = false;
					\func::d($newRace->errors);
				}
			}
		}
		foreach($raceToRemove as $race)
			$raceModel[$race]->delete();

		return $result;
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
