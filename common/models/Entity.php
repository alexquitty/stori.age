<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "entity".
 *
 * @property int $id
 * @property string $type_code Тип сущности
 * @property string $name Название
 * @property string $description Описание
 *
 * @property EntityType $typeCode
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
            [['description'], 'string'],
            [['type_code'], 'string', 'max' => 150],
            [['name'], 'string', 'max' => 250],
            [['type_code'], 'exist', 'skipOnError' => true, 'targetClass' => EntityType::className(), 'targetAttribute' => ['type_code' => 'code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_code' => 'Тип сущности',
            'name' => 'Название',
            'description' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeCode()
    {
        return $this->hasOne(EntityType::className(), ['code' => 'type_code']);
    }
}