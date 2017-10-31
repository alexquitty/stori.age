<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\Relation;
use yii\data\ActiveDataProvider;

/**
 * RelationSearch represents the model behind the search form of `common\models\Relation`.
 */
class RelationSearch extends Relation
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'safe'],
            [['oneway', 'cognate', 'negative'], 'integer'],
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
        $this->__search($params);

        // grid filtering conditions
        $this->query
	        ->andFilterWhere([
	        	'oneway' => $this->oneway,
	            'cognate' => $this->cognate,
	            'negative' => $this->negative,
	        ])
	        ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $this->dataProvider;
    }
}
