<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\Creature;
use yii\data\ActiveDataProvider;

/**
 * CreatureSearch represents the model behind the search form of `common\models\Creature`.
 */
class CreatureSearch extends Creature
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'entity_id', 'hidden'], 'integer'],
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

        $this->query
	        ->andFilterWhere([
	            'id' => $this->id,
	            'entity_id' => $this->entity_id,
	            'hidden' => $this->hidden,
	        ]);

        return $this->dataProvider;
    }
}
