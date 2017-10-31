<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "character_race".
 *
 * @property string $character_id Персонаж
 * @property string $race_id Раса
 */
class CharacterRace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_race';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['character_id', 'race_id'], 'required'],
            [['character_id', 'race_id'], 'integer'],
            [['character_id', 'race_id'], 'unique', 'targetAttribute' => ['character_id', 'race_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'character_id' => 'Персонаж',
            'race_id' => 'Раса',
        ];
    }
}
