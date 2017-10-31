<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Fraction;

/**
 * FractionSearch represents the model behind the search form of `common\models\Fraction`.
 */
class FractionSearch extends Fraction
{
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
        $query = Fraction::find();

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
            'fraction_id' => $this->fraction_id,
            'entity_id' => $this->entity_id,
            'bookpart_id' => $this->bookpart_id,
            'hidden' => $this->hidden,
        ]);

        return $dataProvider;
    }
}
