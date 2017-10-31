<?php

namespace common\models;

/**
 * This is the model class for table "entity".
 *
 * @property int $id
 * @property string $cloned_id Ссылается на
 * @property string $letter Буква
 * @property string $type_code Тип сущности
 * @property string $name Название
 * @property string $description Описание
 *
 * @property Character[] $characters
 * @property EntityType $typeCode
 * @property Entity $cloned
 * @property Entity[] $entities
 */
class Entity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cloned_id'], 'integer'],
            [['description'], 'string'],
            [['letter'], 'string', 'max' => 1],
            [['type_code'], 'string', 'max' => 150],
            [['name'], 'string', 'max' => 250],
            [['type_code'], 'exist', 'skipOnError' => true, 'targetClass' => EntityType::className(), 'targetAttribute' => ['type_code' => 'code']],
            [['cloned_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entity::className(), 'targetAttribute' => ['cloned_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
			'id' => 'ID',
			'cloned_id' => 'Ссылается на',
			'letter' => 'Буква',
			'type_code' => 'Тип сущности',
			'name' => 'Название',
			'description' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacters()
    {
        return $this->hasMany(Character::className(), ['entity_id' => 'id']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getClones()
	{
		return $this->hasMany(Entity::className(), ['cloned_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOriginal()
	{
		return $this->hasOne(Entity::className(), ['id' => 'cloned_id']);
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeCode()
    {
        return $this->hasOne(EntityType::className(), ['code' => 'type_code']);
    }

    /**
     * @inheritdoc
     * @return EntityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EntityQuery(get_called_class());
    }
}