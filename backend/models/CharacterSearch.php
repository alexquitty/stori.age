<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Character;

/**
 * CharacterSearch represents the model behind the search form of `common\models\Character`.
 */
class CharacterSearch extends Character
{
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
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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
        $query = Character::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'entity_id' => $this->entity_id,
            'bookpart_id' => $this->bookpart_id,
            'gender' => $this->gender,
            'age' => $this->age,
            'sex' => $this->sex,
            'ord' => $this->ord,
            'hidden' => $this->hidden,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'middlename', $this->middlename])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'birthplace', $this->birthplace])
            ->andFilterWhere(['like', 'birthdate', $this->birthdate])
            ->andFilterWhere(['like', 'appearance', $this->appearance])
            ->andFilterWhere(['like', 'profession', $this->profession])
            ->andFilterWhere(['like', 'deathplace', $this->deathplace])
            ->andFilterWhere(['like', 'deathdate', $this->deathdate]);

        return $dataProvider;
    }
}
