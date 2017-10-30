<?php

namespace backend\controllers;


use backend\traits\CRUDTrait;
use common\models\Menu;
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
	 * @param $model \yii\db\ActiveRecord
	 * @param $params
	 */
	protected function __beforeActionChange(&$model, &$params)
	{
		$menuType = Menu::find()
			->select('code')
			->indexBy('code')
			->where(['content' => 0])
			->asArray()
			->column();

		$this->viewParams = [
			'menuType' => $menuType,
		];
	}

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
