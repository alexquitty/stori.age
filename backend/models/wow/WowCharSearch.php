<?php

namespace backend\models\wow;

use backend\traits\CRUDSearchTrait;
use yii\data\ActiveDataProvider;

/**
 * WowCharSearch represents the model behind the search form of `backend\models\wow\WowChar`.
 */
class WowCharSearch extends WowChar
{
	use CRUDSearchTrait;


	public $alliance;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'alliance'], 'integer'],
            [['name', 'spec_code', 'race_code', 'prof1_code', 'prof2_code', 'spec_image'], 'safe'],
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
	    $this->__search($params, ['race', 'spec', 'prof1', 'prof2']);

        $this->query
	        ->andFilterWhere(['id' => $this->id])
	        ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'spec_code', $this->spec_code])
            ->andFilterWhere(['like', 'race_code', $this->race_code])
            ->andFilterWhere(['like', 'prof1_code', $this->prof1_code])
            ->andFilterWhere(['like', 'prof2_code', $this->prof2_code])
	        ->orderBy([
	        	WowRace::tableName().'.alliance' => SORT_ASC,
		        WowChar::tableName().'.name' => SORT_ASC,
	        ]);

        return $this->dataProvider;
    }
}
