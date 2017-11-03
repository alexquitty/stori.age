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
use common\models\CharacterCard;
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
			$annotation = Annotation::find()->published()
				->where([
					'snowflake_id' => $id,
					'book_id' => \Yii::$app->request->get('book_id'),
				])
				->one();

			$book = Book::find()->published()->prepareForSelect()->column();
		}

		/* *** */
		$card = null;
		$character = [];
		$bookpart = [];
		if($model->isCharacter())
		{
			$card = new CharacterCard();
			$character = CharacterCard::find()->published()
				->where([
					'snowflake_id' => $id,
					'bookpart_id' => \Yii::$app->request->get('bookpart_id'),
				])
				->orderBy([
					'bookpart_id' => SORT_ASC,
					'ord' => SORT_ASC,
				])
				->asArray()
				->all();
			$bookpart = Bookpart::find()->published()->prepareForSelect()->column();
		}

		/* *** */
		$scene = [];
		$chapter = [];
		$bookpart_id = null;
		$chapter_id = null;
		if($model->isScene())
		{
			$chapter_id = \Yii::$app->request->get('chapter_id');
			if(isset($chapter_id))
				$scene = Scene::find()->published()
					->where([
						'snowflake_id' => $id,
						'chapter_id' => $chapter_id,
					])
					->orderBy(['ord' => SORT_ASC])
					->all();

			$bookpart = Bookpart::find()->published()->prepareForSelect()->column();
			$bookpart_id = \Yii::$app->request->get('bookpart_id');
			$chapter = Chapter::find()->published()
				->where(['bookpart_id' => $bookpart_id])
				->orderBy([
					'bookpart_id' => SORT_ASC,
					'ord' => SORT_ASC,
				])
				->prepareForSelect()->column();
		}

		return $this->render('view', [
			'model' => $model,
			'annotation' => $annotation,
			'book' => $book,
			'bookpart' => $bookpart,
			'bookpart_id' => $bookpart_id,
			'chapter' => $chapter,
			'chapter_id' => $chapter_id,
			'card' => $card,
			'character' => $character,
			'scene' => $scene,
		]);
	}
}