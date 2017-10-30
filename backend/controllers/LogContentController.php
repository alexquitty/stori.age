<?php

namespace backend\controllers;


use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * LogContentController implements the CRUD actions for LogContent model.
 */
class LogContentController extends Controller
{
	use CRUDTrait;


	public $model = '\LogContent';
	public $searchModel = 'LogContentSearch';

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
     * Lists all LogContent models.
     * @return mixed
     */
    public function actionIndex()
    {
    	return $this->__actionIndex([
    		'defaultOrder' => [
    			'log_id' => SORT_DESC,
		    ],
	    ]);
    }
}
