<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "scene".
 *
 * @property string $id
 * @property string $chapter_id Глава книги
 * @property string $name Название
 * @property string $content Текст
 * @property string $ord Порядок
 * @property int $hidden Не показывать
 *
 * @property Chapter $chapter
 */
class Scene extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'scene';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chapter_id', 'ord', 'hidden'], 'integer'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['chapter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chapter::className(), 'targetAttribute' => ['chapter_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chapter_id' => 'Глава книги',
            'name' => 'Название',
            'content' => 'Текст',
            'ord' => 'Порядок',
            'hidden' => 'Не показывать',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChapter()
    {
        return $this->hasOne(Chapter::className(), ['id' => 'chapter_id']);
    }
}
