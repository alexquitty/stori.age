<?php

namespace backend\controllers;


use backend\traits\CRUDTrait;

/**
 * LogContentController implements the CRUD actions for LogContent model.
 */
class LogContentController extends \yii\web\Controller
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
	 * Creates a new LogContent model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		return $this->__actionCreate('log_id');
	}

    /**
     * Lists all LogContent models.
     * @return mixed
     */
    public function actionIndex()
    {
    	return $this->__actionIndexWithSearch([
    		'defaultOrder' => [
    			'date' => SORT_DESC,
		    ],
	    ]);
    }

    /**
     * Updates an existing LogContent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->log_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
}
