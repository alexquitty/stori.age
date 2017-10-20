<?php

namespace backend\controllers;


use backend\traits\CRUDTrait;
use yii\web\Controller;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
{
	use CRUDTrait;


	public $model = 'Menu';
	public $searchModel = 'MenuSearch';

	/**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->__actionIndex([
	        'defaultOrder' => [
		        'content' => SORT_DESC,
		        'parent_code' => SORT_ASC,
		        'code' => SORT_ASC,
		        'ord' => SORT_ASC,
	        ],
        ]);
    }
}
