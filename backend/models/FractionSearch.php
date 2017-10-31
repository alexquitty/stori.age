<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\Fraction;
use yii\data\ActiveDataProvider;

/**
 * FractionSearch represents the model behind the search form of `common\models\Fraction`.
 */
class FractionSearch extends Fraction
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'fraction_id', 'entity_id', 'bookpart_id', 'hidden'], 'integer'],
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
	            'id' => $this->id,
	            'fraction_id' => $this->fraction_id,
	            'entity_id' => $this->entity_id,
	            'bookpart_id' => $this->bookpart_id,
	            'hidden' => $this->hidden,
	        ]);

        return $this->dataProvider;
    }
}
