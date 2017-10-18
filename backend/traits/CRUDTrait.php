<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 18.10.2017
 * Time: 11:53
 */

namespace backend\traits;


use yii\filters\AccessControl;
use yii\filters\VerbFilter;

trait CRUDTrait
{
	protected $modelPrefix = '\common\model\\';
	protected $searchModelPrefix = '\backend\models\\';

	/**
	 * IMPORTANT! Must be defined in controller!
	 */
	// public $model = 'Model';
	// public $searchModel = 'SearchModel';


	/**
	 * @return mixed
	 */
	protected function __actionIndexWithSearch($params = null)
	{
		$searchModel = new $this->searchModel();
		$dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
		if(isset($params))
			$dataProvider->setSort($params);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single %{tableName} model.
	 * @param string $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['index','view','create','update','delete'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
		];
	}

	/**
	 * Finds the Menu model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param string $id
	 * @return \yii\base\Model the loaded model
	 * @throws \yii\web\NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		$modelName = $this->model;
		if(($model = $modelName::findOne($id)) !== null)
			return $model;

		throw new \yii\web\NotFoundHttpException(\Yii::t('cpanel', 'The requested page does not exist.'));
	}

	public function init()
	{
		$this->model = $this->modelPrefix . $this->model;
		$this->searchModel = $this->searchModelPrefix . $this->searchModel;

		parent::init();
	}
}