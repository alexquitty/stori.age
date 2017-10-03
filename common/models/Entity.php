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
 * @property User $id0
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
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
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
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
