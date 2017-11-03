<?php

namespace common\models;

/**
 * This is the model class for table "character_card".
 *
 * @property string $id
 * @property string $entity_id Сущность
 * @property string $bookpart_id Часть книги
 * @property string $name Имя
 * @property string $story История жизни
 * @property string $motivation Мотивация
 * @property string $aim Цель
 * @property string $conflict Конфликт
 * @property string $clarification Прозрение
 * @property string $events События
 * @property string $ord Порядок
 * @property int $hidden Скрыть
 *
 * @property Entity $entity
 * @property Bookpart $bookpart
 */
class CharacterCard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entity_id', 'bookpart_id', 'snowflake_id', 'ord', 'hidden'], 'integer'],
            [['story', 'motivation', 'aim', 'conflict', 'clarification', 'events'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['entity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entity::className(), 'targetAttribute' => ['entity_id' => 'id']],
            [['bookpart_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bookpart::className(), 'targetAttribute' => ['bookpart_id' => 'id']],
	        [['snowflake_id'], 'exist', 'skipOnError' => true, 'targetClass' => Snowflake::className(), 'targetAttribute' => ['snowflake_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entity_id' => 'Сущность',
            'bookpart_id' => 'Часть книги',
	        'snowflake_id' => 'Шаг снежинки',
            'name' => 'Имя',
            'story' => 'История жизни',
            'motivation' => 'Мотивация',
            'aim' => 'Цель',
            'conflict' => 'Конфликт',
            'clarification' => 'Прозрение',
            'events' => 'События',
            'ord' => 'Порядок',
            'hidden' => 'Скрыть',
        ];
    }

	/**
	 * @return CommonQuery
	 */
	public static function find()
	{
		return new CommonQuery(get_called_class());
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntity()
    {
        return $this->hasOne(Entity::className(), ['id' => 'entity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookpart()
    {
        return $this->hasOne(Bookpart::className(), ['id' => 'bookpart_id']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSnowflake()
	{
		return $this->hasOne(Snowflake::className(), ['id' => 'snowflake_id']);
	}
}
