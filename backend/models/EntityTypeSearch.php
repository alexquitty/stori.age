<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\EntityType;

/**
 * EntityTypeSearch represents the model behind the search form of `common\models\EntityType`.
 */
class EntityTypeSearch extends EntityType
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'parent_code', 'name'], 'safe'],
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
	        ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'parent_code', $this->parent_code])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $this->dataProvider;
    }
}
