<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\Book;
use yii\data\ActiveDataProvider;
use common\models\Annotation;

/**
 * AnnotationSearch represents the model behind the search form of `common\models\Annotation`.
 */
class AnnotationSearch extends Annotation
{
	use CRUDSearchTrait;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'book_id', 'snowflake_id'], 'integer'],
            [['content'], 'safe'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $this->__search($params, ['book']);

        // grid filtering conditions
        $this->query
	        ->andFilterWhere([
                'id' => $this->id,
                // 'book_id' => $this->book_id,
                'snowflake_id' => $this->snowflake_id,
            ])
	        ->andFilterWhere(['like', 'content', $this->content])
	        ->andFilterWhere(['like', Book::tableName().'.name', $this->book_id]);

        return $this->dataProvider;
    }
}
