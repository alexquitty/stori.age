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
            [['id', 'ord'], 'integer'],
            [['name', 'cycle_id', 'description'], 'safe'],
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
        $this->__search($params, [
        	'cycle' => function(\yii\db\ActiveQuery $query)
	        {
	        	$query->from(Cycle::tableName().' AS c2');
	        },
        ]);

        // grid filtering conditions
        $this->query
	        ->andFilterWhere([
	            'id' => $this->id,
	            // 'cycle_id' => $this->cycle_id,
	            'ord' => $this->ord,
	        ])
	        ->andFilterWhere(['like', 'c2.name', $this->cycle_id])
	        ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $this->dataProvider;
    }
}
