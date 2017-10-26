<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 26.10.2017
 * Time: 16:46
 */

namespace frontend\controllers;


use common\models\Snowflake;
use yii\web\Controller;

class SnowflakeController extends Controller
{
	public function actionIndex()
	{
		$data = Snowflake::find()
			->orderBy(['id' => SORT_ASC])
			->asArray()
			->all();

		return $this->render('index', [
			'data' => $data,
		]);
	}

	public function actionView($id)
	{
		$model = Snowflake::findOne(['id' => $id]);

		$bookModel = Book::find();

		return $this->render('view', [
			'model' => $model,
			'bookModel' => $bookModel,
		]);
	}
}