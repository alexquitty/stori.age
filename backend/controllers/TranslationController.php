<?php

namespace backend\controllers;

use backend\traits\CRUDTrait;
use Yii;
use common\models\Message;
use common\models\SourceMessage;
use backend\models\TranslationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TranslationController implements the CRUD actions for SourceMessage model.
 */
class TranslationController extends Controller
{
	use CRUDTrait;


	public $model = '';
	public $searchModel = 'TranslationSearch';

    /**
     * Lists all SourceMessage models.
     * @return mixed
     */
    public function actionIndex()
    {
    	return $this->__actionIndex([
		    'defaultOrder' => [
			    'message' => SORT_ASC,
		    ],
	    ]);
    }

    /**
     * Creates a new SourceMessage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SourceMessage();
	    $model2 = new Message();

        if($model->load($params = Yii::$app->request->post()) && $model->save())
        {
        	$params[ucfirst($model2::tableName())]['id'] = $model->id;
	        if($model2->load($params)&& $model2->save())
                return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
	        'model2' => $model2,
        ]);
    }

    /**
     * Updates an existing SourceMessage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model2 = $this->findModel2($id);

        if($model->load($params = Yii::$app->request->post()) && $model->save())
        {
	        $params[ucfirst(Message::tableName())]['id'] = $model->id;
	        if($model2->load($params)&& $model2->save())
                return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
	        'model2' => $model2,
        ]);
    }

    /**
     * Deletes an existing SourceMessage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

	protected function findModel2($id)
	{
		if (($model = Message::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException(Yii::t('cpanel', 'The requested page does not exist.'));
	}
}
