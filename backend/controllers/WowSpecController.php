<?php

namespace backend\controllers;

use Yii;
use backend\models\wow\WowSpec;
use backend\models\wow\WowSpecSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WowSpecController implements the CRUD actions for WowSpec model.
 */
class WowSpecController extends Controller
{
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
        ];
    }

    /**
     * Lists all WowSpec models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WowSpecSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WowSpec model.
     * @param string $code
     * @param string $class_code
     * @return mixed
     */
    public function actionView($code, $class_code)
    {
        return $this->render('view', [
            'model' => $this->findModel($code, $class_code),
        ]);
    }

    /**
     * Creates a new WowSpec model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WowSpec();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'code' => $model->code, 'class_code' => $model->class_code]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WowSpec model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $code
     * @param string $class_code
     * @return mixed
     */
    public function actionUpdate($code, $class_code)
    {
        $model = $this->findModel($code, $class_code);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'code' => $model->code, 'class_code' => $model->class_code]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WowSpec model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $code
     * @param string $class_code
     * @return mixed
     */
    public function actionDelete($code, $class_code)
    {
        $this->findModel($code, $class_code)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WowSpec model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $code
     * @param string $class_code
     * @return WowSpec the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($code, $class_code)
    {
        if (($model = WowSpec::findOne(['code' => $code, 'class_code' => $class_code])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
