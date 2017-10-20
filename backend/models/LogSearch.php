<?php

namespace backend\models;


use backend\traits\CRUDSearchTrait;
use Log;

/**
 * LogSearch represents the model behind the search form of `common\models\Log`.
 */
class LogSearch extends Log
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['date', 'table_name', 'item_key', 'action'], 'safe'],
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

        $this->query
	        ->andFilterWhere([
	            'id' => $this->id,
	            'user_id' => $this->user_id,
	            'date' => $this->date,
	        ])
	        ->andFilterWhere(['like', 'table_name', $this->table_name])
            ->andFilterWhere(['like', 'item_key', $this->item_key])
            ->andFilterWhere(['like', 'action', $this->action]);

        return $this->dataProvider;
    }
}
