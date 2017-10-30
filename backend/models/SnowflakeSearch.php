<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\Snowflake;

/**
 * SnowflakeSearch represents the model behind the search form of `common\models\Snowflake`.
 */
class SnowflakeSearch extends Snowflake
{

	use CRUDSearchTrait;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['description'], 'safe'],
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

        // grid filtering conditions
        $this->query
	        ->andFilterWhere(['id' => $this->id])
	        ->andFilterWhere(['like', 'description', $this->description]);

        return $this->dataProvider;
    }
}
