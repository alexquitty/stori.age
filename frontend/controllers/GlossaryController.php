<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 24.10.2017
 * Time: 15:16
 */

namespace frontend\controllers;


use common\models\EntitySearch;
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

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}
}