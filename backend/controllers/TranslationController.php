<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * TranslationController implements the CRUD actions for SourceMessage model.
 */
class TranslationController extends Controller
{
	use CRUDTrait {
		CRUDTrait::init as public parentInit;
	}


	public $model = 'SourceMessage';
	public $model2 = 'Message';
	public $searchModel = 'TranslationSearch';

	/**
	 * @param $model
	 * @param $params
	 *
	 * @return bool
	 */
	protected function __afterModelSaved(&$model, &$params)
	{
		$result = false;

		/**
		 * @var $model2 \common\models\Message
		 */
		$model2 = $this->findModel2($model->id) ?: new $this->model2();

		$params[ucfirst($model2::tableName())]['id'] = $model->id;

		if($model2->load($params) && $model2->save())
		{
			$this->viewParams = [
				'model2' => $model2,
			];
			$result = true;
		}

		return $result;
	}

	/**
	 * @param $model \common\models\SourceMessage
	 * @param $params
	 */
	protected function __beforeActionChange(&$model, &$params)
	{
		$model->loadDefaultValues();

		$model2 = $this->findModel2($model->id);
		if(empty($model2))
			$model2 = new $this->model2();

		$this->viewParams = [
			'model2' => $model2,
		];
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	protected function findModel2($id)
	{
		$modelName = $this->model2;

		return $modelName::findOne($id);
	}

    /**
     * Lists all SourceMessage models.
     * @return mixed
     */
    public function actionIndex()
    {
    	return $this->__actionIndex([
		    'defaultOrder' => [
			    'message' => SORT_ASC,
		    ],
	    ]);
    }

	/**
	 *
	 */
	public function init()
	{
		if('\\' != $this->model2[0])
			$this->model2 = $this->modelPrefix . $this->model2;

		$this->parentInit();
	}
}
