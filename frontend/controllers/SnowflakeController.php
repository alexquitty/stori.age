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
				])->one();

			$book = empty($annotation) ? []
				: Book::find()->published()->prepareForSelect()->column();
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
				])->asArray()->all();
			$bookpart = empty($character) ? []
				: Bookpart::find()->published()->prepareForSelect()->column();
		}

		/* *** */
		$scene = [];
		$chapter = [];
		if($model->isScene())
		{
			$scene = Scene::find()->published()
				->where([
					// 'snowflake_id' => $id,
					'chapter_id' => \Yii::$app->request->get('chapter_id'),
				])->all();
			$chapter = empty($scene) ? []
				: Chapter::find()->published()->prepareForSelect()->column();
		}

		return $this->render('view', [
			'model' => $model,
			'annotation' => $annotation,
			'book' => $book,
			'bookpart' => $bookpart,
			'chapter' => $chapter,
			'card' => $card,
			'character' => $character,
			'scene' => $scene,
		]);
	}
}