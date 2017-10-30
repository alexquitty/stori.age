<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\Book;
use common\models\Cycle;

/**
 * BookSearch represents the model behind the search form of `common\models\Book`.
 */
class BookSearch extends Book
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ord', 'hidden'], 'integer'],
            [['cycle_id', 'name', 'description'], 'safe'],
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
        $this->__search($params);

        // grid filtering conditions
        $this->query->
	        andFilterWhere([
	            'id' => $this->id,
	            // 'cycle_id' => $this->cycle_id,
	            'ord' => $this->ord,
		        'hidden' => $this->hidden,
	        ])
	        ->andFilterWhere(['like', Cycle::tableName().'.name', $this->cycle_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $this->dataProvider;
    }
}
