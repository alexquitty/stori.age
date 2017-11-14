<?php

namespace backend\controllers;

use backend\models\wow\WowProf;
use backend\models\wow\WowRace;
use backend\models\wow\WowSpec;
use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * GenderController implements the CRUD actions for Gender model.
 */
class WowCharController extends Controller
{
	use CRUDTrait;


	public $model = '\backend\models\wow\WowChar';
	public $searchModel = '\backend\models\wow\WowCharSearch';

	/**
	 * @param $model \yii\db\ActiveRecord
	 * @param $params
	 */
	protected function __beforeActionChange(&$model, &$params)
	{
		$r = WowRace::find()
			->select('name, alliance, code')
			->asArray()
			->all();

		$races = [];
		foreach($r as $race)
		{
			$label = empty($race['alliance']) ? 'Horde' : 'Alliance';
			$races[$label][$race['code']] = $race['name'];
		}

		$s = WowSpec::find()->alias('s')
			->joinWith('class AS c', false)
			->select('s.code, s.name, c.name AS class_name')
			->orderBy('c.name ASC, s.name ASC')
			->asArray()
			->all();

		$specs = [];
		foreach($s as $spec)
			$specs[$spec['class_name']][$spec['code']] = $spec['name'];

		$profs = WowProf::find()
			->select('name')
			->orderBy('name ASC')
			->indexBy('code')
			->asArray()
			->column();

		$this->viewParams = [
			'races' => $races,
			'specs' => $specs,
			'profs' => $profs,
		];
	}
}
