<?php

namespace backend\models;


use backend\traits\CRUDSearchTrait;
use common\models\SourceMessage;
use yii\data\ActiveDataProvider;

/**
 * TranslationSearch represents the model behind the search form of `common\models\SourceMessage`.
 */
class TranslationSearch extends SourceMessage
{
	use CRUDSearchTrait;


	public $translation;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['category', 'message', 'translation'], 'safe'],
	        [['translation'], 'safe'],
        ];
    }

    /**
     * Creates data provider instance with search query applied.
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = self::find()->joinWith('translation');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['translation'] = [
        	'asc' => ['message.translation' => SORT_ASC],
	        'desc' => ['message.translation' => SORT_DESC],
        ];

        $this->load($params);

        if(!$this->validate())
        {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query
	        ->andFilterWhere(['id' => $this->id])
	        ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'message.translation', $this->translation]);

        return $dataProvider;
    }
}