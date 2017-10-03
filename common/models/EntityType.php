<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "entity_type".
 *
 * @property string $code Код типа
 * @property string $name Название
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
            'code' => 'Код типа',
            'name' => 'Название',
        ];
    }
}
