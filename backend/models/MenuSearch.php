<?php

namespace backend\models;


/**
 * MenuSearch represents the model behind the search form of `common\models\Menu`.
 */
class MenuSearch extends \common\models\Menu
{
	use \backend\traits\CRUDSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'parent_code', 'name', 'icon'], 'safe'],
            [['ord', 'content', 'access'], 'integer'],
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
		    ->andFilterWhere([
			    'ord' => $this->ord,
			    'content' => $this->content,
			    'access' => $this->access,
		    ]);

	    $this->query
		    ->andFilterWhere([ 'like', 'code', $this->code ])
		    ->andFilterWhere([ 'like', 'parent_code', $this->parent_code ])
		    ->andFilterWhere([ 'like', 'name', $this->name ])
		    ->andFilterWhere([ 'like', 'icon', $this->icon ]);

	    return $this->dataProvider;
    }
}
