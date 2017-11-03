<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\Bookpart;
use common\models\CharacterCard;
use common\models\Entity;
use yii\data\ActiveDataProvider;

/**
 * CharacterCardSearch represents the model behind the search form of `common\models\CharacterCard`.
 */
class CharacterCardSearch extends CharacterCard
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'snowflake_id', 'ord', 'hidden'], 'integer'],
            [['entity_id', 'bookpart_id', 'name', 'story', 'motivation', 'aim', 'conflict', 'clarification', 'events'], 'safe'],
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
		$this->__search($params, ['entity', 'bookpart']);

        // grid filtering conditions
        $this->query
	        ->andFilterWhere([
	            'id' => $this->id,
		        'snowflake_id' => $this->snowflake_id,
	            'ord' => $this->ord,
	            'hidden' => $this->hidden,
	        ])
	        ->andFilterWhere(['like', Entity::tableName().'.name', $this->entity_id])
	        ->andFilterWhere(['like', Bookpart::tableName().'.name', $this->bookpart_id])
	        ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'story', $this->story])
            ->andFilterWhere(['like', 'motivation', $this->motivation])
            ->andFilterWhere(['like', 'aim', $this->aim])
            ->andFilterWhere(['like', 'conflict', $this->conflict])
            ->andFilterWhere(['like', 'clarification', $this->clarification])
            ->andFilterWhere(['like', 'events', $this->events]);

        return $this->dataProvider;
    }
}
