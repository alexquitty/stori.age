<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 24.10.2017
 * Time: 15:16
 */

namespace frontend\controllers;


use common\models\EntitySearch;
use common\models\EntityType;
use yii\web\Controller;

class GlossaryController extends Controller
{
	public function actionIndex()
	{
		$searchModel = new EntitySearch();

		$dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
		$dataProvider->setSort([
			'defaultOrder' => [
				'name' => SORT_ASC,
			],
		]);

		$items = EntityType::find()
			->select('name')
			->indexBy('code')
			->orderBy(['name' => SORT_ASC])
			->asArray()
			->column();

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'items' => $items,
		]);
	}
}