<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\Book;
use common\models\Bookpart;

/**
 * BookpartSearch represents the model behind the search form of `common\models\Bookpart`.
 */
class BookpartSearch extends Bookpart
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ord', 'hidden'], 'integer'],
            [['name', 'book_id'], 'safe'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params)
    {
        $this->__search($params, ['book']);

        // grid filtering conditions
        $this->query
	        ->andFilterWhere([
	            'id' => $this->id,
	            // 'book_id' => $this->book_id,
	            'ord' => $this->ord,
	            'hidden' => $this->hidden,
	        ])
	        ->andFilterWhere(['like', Book::tableName().'.name', $this->book_id])
	        ->andFilterWhere(['like', 'name', $this->name]);

        return $this->dataProvider;
    }
}
