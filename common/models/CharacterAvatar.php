<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "character_avatar".
 *
 * @property string $character_id Персонаж
 * @property string $file_id Файл
 * @property string $ord Порядок
 * @property int $hidden Скрыть
 */
class CharacterAvatar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_avatar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['character_id', 'file_id'], 'required'],
            [['character_id', 'file_id', 'ord', 'hidden'], 'integer'],
            [['character_id', 'file_id'], 'unique', 'targetAttribute' => ['character_id', 'file_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'character_id' => 'Персонаж',
            'file_id' => 'Файл',
            'ord' => 'Порядок',
            'hidden' => 'Скрыть',
        ];
    }
}
