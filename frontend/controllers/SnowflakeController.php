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
use common\models\Bookpart;
use common\models\Chapter;
use common\models\Character;
use common\models\Scene;
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

	/**
	 * @param $id
	 *
	 * @return string
	 */
	public function actionView($id)
	{
		$model = Snowflake::findOne(['id' => $id]);

		/* *** */
		$annotation = [];
		$book = [];
		if($model->isAnnotation())
		{
			$book = Book::find()->prepareForSelect()->column();
			$annotation = Annotation::find()
				->where([
					'snowflake_id' => $id,
					'book_id' => \Yii::$app->request->get('book_id'),
				])->one();
		}

		/* *** */
		$character = [];
		$bookpart = [];
		if($model->isCharacter())
		{
			$character = Character::find()
				->where([
					// 'snowflake_id' => $id,
					'bookpart_id' => \Yii::$app->request->get('bookpart_id'),
				])->all();
			$bookpart = Bookpart::find()->prepareForSelect()->column();
		}

		/* *** */
		$scene = [];
		$chapter = [];
		if($model->isScene())
		{
			$scene = Scene::find()
				->where([
					// 'snowflake_id' => $id,
					'chapter_id' => \Yii::$app->request->get('chapter_id'),
				])->all();
			$chapter = Chapter::find()->prepareForSelect()->column();
		}

		return $this->render('view', [
			'model' => $model,
			'annotation' => $annotation,
			'book' => $book,
			'bookpart' => $bookpart,
			'chapter' => $chapter,
			'character' => $character,
			'scene' => $scene,
		]);
	}
}