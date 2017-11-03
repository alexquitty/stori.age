<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "relation".
 *
 * @property string $code Код
 * @property string $name Название
 * @property int $cognate Кровная связь
 * @property int $negative Негативное отношение
 */
class Relation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['cognate', 'negative', 'oneway'], 'integer'],
            [['code'], 'string', 'max' => 150],
            [['name'], 'string', 'max' => 250],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Код',
            'name' => 'Название',
	        'oneway' => 'Однонаправленное',
            'cognate' => 'Кровная связь',
            'negative' => 'Негативное отношение',
        ];
    }

	/**
	 * @return CommonQuery
	 */
	public static function find()
	{
		return new CommonQuery(get_called_class());
	}
}
