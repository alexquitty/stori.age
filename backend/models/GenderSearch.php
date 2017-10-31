<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\Gender;

/**
 * GenderSearch represents the model behind the search form of `common\models\Gender`.
 */
class GenderSearch extends Gender
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ord', 'type'], 'integer'],
            [['code', 'name'], 'safe'],
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
	            'ord' => $this->ord,
	            'type' => $this->type,
	        ])
	        ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $this->dataProvider;
    }
}
