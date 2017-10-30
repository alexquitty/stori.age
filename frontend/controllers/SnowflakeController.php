<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 26.10.2017
 * Time: 16:46
 */

namespace frontend\controllers;


use common\models\Annotation;
use common\models\Book;
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
			'type' => Snowflake::getType(),
		]);
	}

	public function actionView($id)
	{
		$model = Snowflake::findOne(['id' => $id]);

		$annotation = Annotation::find()
			->where([
				'snowflake_id' => $id,
				'book_id' => \Yii::$app->request->get('book_id'),
			])->one();

		if(empty($annotation))
			$annotation = new Annotation();

		$book = Book::find()
			->select('name')
			->indexBy('id')
			->asArray()
			->column();

		return $this->render('view', [
			'model' => $model,
			'annotation' => $annotation,
			'book' => $book,
		]);
	}
}