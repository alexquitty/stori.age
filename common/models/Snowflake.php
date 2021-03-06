<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "snowflake".
 *
 * @property string $id
 * @property string $description Описание
 */
class Snowflake extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'snowflake';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string'],
	        [['type'], 'string', 'max' => 10],
	        [['type'], 'default'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Описание',
	        'type' => 'Тип привязки',
        ];
    }

	/**
	 * @param null $type
	 *
	 * @return array|mixed
	 */
	public static function getType($type = null)
	{
		$result = [
			'annotation' => 'Аннотация',
			'character' => 'Персонажи',
			'scene' => 'Сцены',
		];

		return empty($type)
			? $result
			: $result[$type];
	}

	/**
	 * @return bool
	 */
	public function isAnnotation()
	{
		return 'annotation' == $this->type;
	}

	/**
	 * @return bool
	 */
	public function isCharacter()
	{
		return 'character' == $this->type;
	}

	/**
	 * @return bool
	 */
	public function isScene()
	{
		return 'scene' == $this->type;
	}
}