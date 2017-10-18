<?php

namespace backend\controllers;


/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends \yii\web\Controller
{
	use \backend\traits\CRUDTrait;


	public $model = 'Menu';
	public $searchModel = 'MenuSearch';

	/**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->__actionIndexWithSearch([
	        'defaultOrder' => [
		        'content' => SORT_DESC,
		        'parent_code' => SORT_ASC,
		        'code' => SORT_ASC,
		        'ord' => SORT_ASC,
	        ],
        ]);
    }

    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new $this->model();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->code]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->code]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

	/**
	 * @param \yii\base\Action $action
	 *
	 * @return bool
	 */
	public function beforeAction($action)
	{
		$result = parent::beforeAction($action);
		if($result)
		{

			\func::d($action->id);

			$logRecord = new \Log([
				'user_id' => \Yii::$app->user->id,
				'table_name' => $action->controller->id,
				'action' => $action->id,
				'item_key' => $action->controller->actionParams['id'],
			]);

			if($logRecord->save())
			{

			}
			else
			{
				\func::d($logRecord->errors);
			}

		}

		return $result;
	}
}
