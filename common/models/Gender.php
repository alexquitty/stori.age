<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gender".
 *
 * @property string $id
 * @property string $code Иконка
 * @property string $name Название
 * @property string $ord Порядок
 * @property int $type Тип
 */
class Gender extends \yii\db\ActiveRecord
{
	const TYPE_LABEL = [
		0 => 'Пол',
		1 => 'Предпочтения',
	];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gender';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'code', 'name'], 'required'],
            [['id', 'ord', 'type'], 'integer'],
            [['code'], 'string', 'max' => 15],
            [['name'], 'string', 'max' => 150],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Иконка',
            'name' => 'Название',
            'ord' => 'Порядок',
            'type' => 'Тип',
        ];
    }

	public static function getTypeLabel($type = null)
	{
		return isset($type)
			? self::TYPE_LABEL[$type]
			: self::TYPE_LABEL;
	}
}
