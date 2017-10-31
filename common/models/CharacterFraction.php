<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "character_fraction".
 *
 * @property string $character_id Персонаж
 * @property string $fraction_id Фракция
 * @property string $relation_type Отношение
 */
class CharacterFraction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_fraction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['character_id', 'fraction_id', 'relation_type'], 'required'],
            [['character_id', 'fraction_id'], 'integer'],
            [['relation_type'], 'string', 'max' => 150],
            [['character_id', 'fraction_id'], 'unique', 'targetAttribute' => ['character_id', 'fraction_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'character_id' => 'Персонаж',
            'fraction_id' => 'Фракция',
            'relation_type' => 'Отношение',
        ];
    }
}
