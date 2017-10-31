<?php

namespace common\models;

/**
 * This is the model class for table "entity_type".
 *
 * @property string $code Код типа
 * @property string $parent_code Код родителя
 * @property string $name Название
 *
 * @property Entity[] $entities
 * @property EntityType $parentCode
 * @property EntityType[] $entityTypes
 */
class EntityType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entity_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code', 'parent_code'], 'string', 'max' => 150],
            [['name'], 'string', 'max' => 250],
            [['code'], 'unique'],
	        [['parent_code'], 'default'],
            [['parent_code'], 'exist', 'skipOnError' => true, 'targetClass' => EntityType::className(), 'targetAttribute' => ['parent_code' => 'code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Код типа',
            'parent_code' => 'Код родителя',
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntities()
    {
        return $this->hasMany(Entity::className(), ['type_code' => 'code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentCode()
    {
        return $this->hasOne(EntityType::className(), ['code' => 'parent_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntityTypes()
    {
        return $this->hasMany(EntityType::className(), ['parent_code' => 'code']);
    }
}
