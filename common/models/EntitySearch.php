<?php

namespace common\models;


use backend\traits\CRUDSearchTrait;

/**
 * EntitySearch represents the model behind the search form of `common\models\Entity`.
 */
class EntitySearch extends Entity
{
	use CRUDSearchTrait;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['letter', 'type_code', 'name', 'description'], 'safe'],
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
        $this->__search($params, ['typeCode']);

        // grid filtering conditions
        $this->query
	        ->andFilterWhere(['id' => $this->id])
	        ->andFilterWhere(['like', 'letter', $this->letter])
	        ->andFilterWhere(['type_code' => $this->type_code])
	        // ->andFilterWhere(['like', EntityType::tableName().'.name', $this->type_code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        \DebugBot::send($this->query->createCommand()->getRawSql(), 'aq');

        return $this->dataProvider;
    }
}
