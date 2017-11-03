<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use common\models\Bookpart;
use common\models\Entity;
use common\models\Snowflake;
use yii\web\Controller;

/**
 * CharacterCardController implements the CRUD actions for CharacterCard model.
 */
class CharacterCardController extends Controller
{
    use CRUDTrait;


    public $model = 'CharacterCard';
    public $searchModel = 'CharacterCardSearch';

	/**
	 * @param $model \yii\db\ActiveRecord
	 * @param $params
	 */
	protected function __beforeActionChange(&$model, &$params)
	{
		$bookpart = Bookpart::find()->prepareForSelect()->column();
		$entity = Entity::find()->character()->prepareForSelect()->column();
		$snowflake = Snowflake::find()
			->select('id')
			->indexBy('id')
			->where(['type' => 'character'])
			->asArray()
			->column();

		$snowflake = array_map(function($item)
		{
			return 'Шаг '.$item;
		}, $snowflake);

		$this->viewParams = [
			'bookpart' => $bookpart,
			'entity' => $entity,
			'snowflake' => $snowflake,
		];
	}
}