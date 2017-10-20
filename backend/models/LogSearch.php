<?php

namespace backend\models;


use backend\traits\CRUDSearchTrait;
use Log;
use yii\data\ActiveDataProvider;

/**
 * LogSearch represents the model behind the search form of `common\models\Log`.
 */
class LogSearch extends Log
{
	use CRUDSearchTrait;

	public $username;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['date', 'table_name', 'item_key', 'action', 'username'], 'safe'],
        ];
    }

    /**
     * Creates data provider instance with search query applied.
     *
     * @param array $params
     *
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params)
    {
	    $query = Log::find()->joinWith('user');

	    $dataProvider = new ActiveDataProvider([
		    'query' => $query,
	    ]);
	    $dataProvider->sort->attributes['username'] = [
		    'asc' => ['user.username' => SORT_ASC],
		    'desc' => ['user.username' => SORT_DESC],
	    ];

	    $this->load($params);

	    if(!$this->validate())
	    {
		    // uncomment the following line if you do not want to return any records when validation fails
		    // $query->where('0=1');
		    return $dataProvider;
	    }

    	$this->__search($params);

        $query
	        ->andFilterWhere([
	            'id' => $this->id,
	            // 'user_id' => $this->user_id,
	            // 'date' => $this->date,
	        ])
	        ->andFilterWhere(['like', 'user.username', $this->username])
	        ->andFilterWhere(['or',
	        	['like', 'YEAR(`date`)', $this->date],
		        ['like', 'MONTH(`date`)', $this->date],
		        ['like', 'DAY(`date`)', $this->date],
		        ['like', 'HOUR(`date`)', $this->date],
		        ['like', 'MINUTE(`date`)', $this->date],
		        ['like', 'SECOND(`date`)', $this->date],
		        ['like', 'DATE(`date`)', $this->date],
	        ])
	        ->andFilterWhere(['like', 'table_name', $this->table_name])
            ->andFilterWhere(['like', 'item_key', $this->item_key])
            ->andFilterWhere(['like', 'action', $this->action]);

        return $dataProvider;
    }
}