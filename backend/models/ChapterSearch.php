<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\Bookpart;
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
            [['id', 'ord', 'hidden'], 'integer'],
            [['name', 'bookpart_id'], 'safe'],
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
        $this->__search($params, ['bookpart']);

        // grid filtering conditions
        $this->query
	        ->andFilterWhere([
	            'id' => $this->id,
	            'ord' => $this->ord,
	            'hidden' => $this->hidden,
	        ])
	        ->andFilterWhere(['like', Bookpart::tableName().'.name', $this->bookpart_id])
			->andFilterWhere(['like', 'name', $this->name]);

        return $this->dataProvider;
    }
}
