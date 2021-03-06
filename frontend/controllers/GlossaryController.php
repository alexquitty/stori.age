<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 24.10.2017
 * Time: 15:16
 */

namespace frontend\controllers;


use common\models\Entity;
use common\models\EntitySearch;
use common\models\EntityType;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class GlossaryController extends Controller
{
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['index'],
				'rules' => [
					[
						'actions' => ['index'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			// 'verbs' => [
			// 	'class' => VerbFilter::className(),
			// 	'actions' => [
			// 		'logout' => ['post'],
			// 	],
			// ],
		];
	}

	public function actionIndex()
	{
		$searchModel = new EntitySearch();

		$dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
		$dataProvider->setSort([
			'defaultOrder' => [
				'name' => SORT_ASC,
			],
		]);
		$dataProvider->setPagination([
			// 'pageSize' => 2,
		]);

		$letters = Entity::find()
			->select('letter')
			->groupBy('letter')
			->orderBy(['letter' => SORT_ASC])
			->asArray()
			->column();

		$types = EntityType::find()
			->select('name')
			->indexBy('code')
			->orderBy(['name' => SORT_ASC])
			->asArray()
			->column();

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'types' => $types,
			'letters' => $letters,
		]);
	}
}