<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 30.10.2017
 * Time: 17:39
 */

namespace frontend\controllers;


use common\models\Menu;
use yii\web\Controller;

class StoriageController extends Controller
{
	public function actionIndex()
	{
		$menu = Menu::find()
			->where([
				'parent_code' => $this->id,
				'content' => 1,
			])
			->orderBy([
				'ord' => SORT_ASC,
				'name' => SORT_ASC,
			])
			->asArray()
			->all();

		return $this->render('index', [
			'menu' => $menu,
		]);
	}
}