<?php

namespace backend\models;


use backend\traits\CRUDSearchTrait;
use LogContent;

/**
 * LogContentSearch represents the model behind the search form of `common\models\LogContent`.
 */
class LogContentSearch extends LogContent
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['log_id'], 'integer'],
            [['content'], 'safe'],
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

        $this->query
            ->andFilterWhere(['log_id' => $this->log_id])
			->andFilterWhere(['like', 'content', $this->content]);

        return $this->dataProvider;
    }
}
