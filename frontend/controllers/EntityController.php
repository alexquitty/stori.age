<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 24.10.2017
 * Time: 15:05
 */

namespace frontend\controllers;


use common\models\Entity;
use yii\web\Controller;

class EntityController extends Controller
{
	public function actionIndex()
	{
		return '';
	}

	public function actionView($id)
	{
		$model = Entity::findOne(['id' => $id]);

		return $this->render('view', [
			'model' => $model,
		]);
	}
}