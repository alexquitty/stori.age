<?php

namespace backend\models;

use backend\traits\CRUDSearchTrait;
use common\models\Scene;

/**
 * SceneSearch represents the model behind the search form of `common\models\Scene`.
 */
class SceneSearch extends Scene
{
	use CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'chapter_id', 'ord', 'hidden'], 'integer'],
            [['name', 'content'], 'safe'],
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
	        ->andFilterWhere([
	            'id' => $this->id,
	            'chapter_id' => $this->chapter_id,
	            'ord' => $this->ord,
	            'hidden' => $this->hidden,
	        ])
	        ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $this->dataProvider;
    }
}
