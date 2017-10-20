<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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

		$model2 = $this->findModel2($model->id);
		if(isset($model2))
		{
			$params[ucfirst($model2::tableName())]['id'] = $model->id;

			if($model2->load($params) && $model2->save())
			{
				$this->viewParams = [
					'model2' => $model2,
				];
				$result = true;
			}
		}

		return $result;
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException
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
