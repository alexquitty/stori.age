<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\Cycle;

/**
 * CycleSearch represents the model behind the search form of `common\models\Cycle`.
 */
class CycleSearch extends Cycle
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cycle_id', 'ord'], 'integer'],
            [['name', 'description'], 'safe'],
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
	            'cycle_id' => $this->cycle_id,
	            'ord' => $this->ord,
	        ])
	        ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $this->dataProvider;
    }
}
