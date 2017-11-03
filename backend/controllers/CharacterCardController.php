<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
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
		// $bookpart = Bookpart::find()->prepareForSelect()->column();
	}
}