<?php

namespace backend\models\wow;

use backend\traits\CRUDSearchTrait;
use yii\data\ActiveDataProvider;

/**
 * WowSpecSearch represents the model behind the search form of `backend\models\wow\WowSpec`.
 */
class WowSpecSearch extends WowSpec
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'class_code', 'name', 'type', 'image'], 'safe'],
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
        $this->__search($params, ['class', 'char']);

        $this->query
	        ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'class_code', $this->class_code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $this->dataProvider;
    }
}
