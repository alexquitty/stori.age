<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\Chapter;

/**
 * ChapterSearch represents the model behind the search form of `common\models\Chapter`.
 */
class ChapterSearch extends Chapter
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bookpart_id', 'ord', 'hidden'], 'integer'],
            [['name'], 'safe'],
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
        $this->query
	        ->andFilterWhere([
	            'id' => $this->id,
	            'bookpart_id' => $this->bookpart_id,
	            'ord' => $this->ord,
	            'hidden' => $this->hidden,
	        ])
			->andFilterWhere(['like', 'name', $this->name]);

        return $this->dataProvider;
    }
}
