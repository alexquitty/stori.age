<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "character_character".
 *
 * @property string $character_id Персонаж (кто)
 * @property string $related_id Персонаж (кому)
 * @property string $relation_type Отношение
 *
 * @property Character $character
 */
class CharacterCharacter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_character';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['character_id', 'related_id', 'relation_type'], 'required'],
            [['character_id', 'related_id'], 'integer'],
            [['relation_type'], 'string', 'max' => 150],
            [['character_id', 'related_id'], 'unique', 'targetAttribute' => ['character_id', 'related_id']],
            [['character_id'], 'exist', 'skipOnError' => true, 'targetClass' => Character::className(), 'targetAttribute' => ['character_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'character_id' => 'Персонаж (кто)',
            'related_id' => 'Персонаж (кому)',
            'relation_type' => 'Отношение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacter()
    {
        return $this->hasOne(Character::className(), ['id' => 'character_id']);
    }
}
