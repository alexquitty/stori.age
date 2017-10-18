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
use yii\helpers\Json;

trait CRUDTrait
{
	protected $modelPrefix = '\common\models\\';
	protected $searchModelPrefix = '\backend\models\\';

	/**
	 * IMPORTANT! Must be defined in controller!
	 */
	// public $model = 'Model';
	// public $searchModel = 'SearchModel';


	/**
	 * @param string $primaryKey
	 *
	 * @return mixed
	 */
	protected function __actionCreate($primaryKey = 'id')
	{
		/**
		 * @var $model \yii\db\ActiveRecord
		 */
		$model = new $this->model();

		if($model->load(\Yii::$app->request->post()) && $model->save())
			return $this->redirect(['view', 'id' => $model->$primaryKey]);
		else
			\func::d($model->errors);

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * @param null $params
	 *
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
	 * @param null $model
	 */
	protected function __logAction($model = null)
	{
		$action = $this->module->requestedAction->id;

		$logRecord = new \Log([
			'user_id' => \Yii::$app->user->id,
			'table_name' => $this->id,
			'action' => $action,
			'item_key' => $this->actionParams['id'],
		]);

		if($logRecord->save())
		{
			if(isset($model))
			{
				$logContentRecord = new \LogContent([
					'log_id' => $logRecord->id,
					'content' => Json::encode($model),
				]);
				if(false == $logContentRecord->save())
					\func::d($logContentRecord->errors);
			}
		}
		else
		{
			\func::d($logRecord->errors);
		}
	}

	/**
	 * Displays a single %{tableName} model.
	 * @param string $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		$model = $this->findModel($id);

		if(isset($model))
			$this->__logAction($model);

		return $this->render('view', [
			'model' => $model,
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
		if('\\' != $this->model[0])
			$this->model = $this->modelPrefix . $this->model;
		if('\\' != $this->searchModel[0])
			$this->searchModel = $this->searchModelPrefix . $this->searchModel;

		parent::init();
	}
}