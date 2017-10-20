<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * LogController implements the CRUD actions for Log model.
 */
class LogController extends Controller
{
	use CRUDTrait;


	public $model = '\Log';
	public $searchModel = 'LogSearch';

	/**
	 * @inheritdoc
	 */
	protected function __getBehaviorAccessRules()
	{
		return [
			[
				'actions' => ['index','view'],
				'allow' => true,
				'roles' => ['@'],
			],
			[
				'actions' => ['create','update','delete'],
				'allow' => true,
				'roles' => ['admin'],
			],
		];
	}

    /**
     * Lists all Log models.
     * @return mixed
     */
    public function actionIndex()
    {
    	return $this->__actionIndex([
        	'defaultOrder' => [
        		'date' => SORT_DESC,
	        ],
        ]);
    }
}
