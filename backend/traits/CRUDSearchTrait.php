<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 18.10.2017
 * Time: 12:02
 */

namespace backend\traits;


use yii\base\Model;
use yii\data\ActiveDataProvider;

trait CRUDSearchTrait
{
	private $query;
	private $dataProvider;


	/**
	 * @param $params
	 *
	 * @return ActiveDataProvider
	 */
	private function __search($params)
	{
		if(empty($this->query))
			$this->query = self::find();

		// add conditions that should always apply here
		$this->dataProvider = new ActiveDataProvider([
			'query' => $this->query,
		]);

		$this->load($params);

		if(!$this->validate())
		{
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $this->dataProvider;
		}
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios()
	{
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}
}