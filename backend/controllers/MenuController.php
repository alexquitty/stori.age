<?php

namespace backend\controllers;


use backend\traits\CRUDTrait;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends \yii\web\Controller
{
	use CRUDTrait;


	public $model = 'Menu';
	public $searchModel = 'MenuSearch';

	/**
	 * Creates a new Menu model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		return $this->__actionCreate();
	}

	/**
	 * Deletes an existing Menu model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param string $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		return $this->__actionDelete($id);
	}

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
}
