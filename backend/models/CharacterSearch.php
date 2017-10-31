<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\Bookpart;
use common\models\Character;
use common\models\Entity;
use yii\data\ActiveDataProvider;

/**
 * CharacterSearch represents the model behind the search form of `common\models\Character`.
 */
class CharacterSearch extends Character
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'entity_id', 'bookpart_id', 'gender', 'age', 'sex', 'ord', 'hidden'], 'integer'],
            [['firstname', 'middlename', 'lastname', 'birthplace', 'birthdate', 'appearance', 'profession', 'deathplace', 'deathdate'], 'safe'],
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
        $this->__search($params, [
        	'entity',
	        'bookpart',
        ]);

        // grid filtering conditions
        $this->query
	        ->andFilterWhere([
	            'id' => $this->id,
	            // 'entity_id' => $this->entity_id,
	            // 'bookpart_id' => $this->bookpart_id,
	            'gender' => $this->gender,
	            'age' => $this->age,
	            'sex' => $this->sex,
	            'ord' => $this->ord,
	            'hidden' => $this->hidden,
	        ])
	        ->andFilterWhere(['like', Entity::tablename().'.name', $this->entity_id])
	        ->andFilterWhere(['like', Bookpart::tableName().'.name', $this->bookpart_id])
	        ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'middlename', $this->middlename])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'birthplace', $this->birthplace])
            ->andFilterWhere(['like', 'birthdate', $this->birthdate])
            ->andFilterWhere(['like', 'appearance', $this->appearance])
            ->andFilterWhere(['like', 'profession', $this->profession])
            ->andFilterWhere(['like', 'deathplace', $this->deathplace])
            ->andFilterWhere(['like', 'deathdate', $this->deathdate]);

        return $this->dataProvider;
    }
}