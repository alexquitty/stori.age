<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chapter".
 *
 * @property string $id
 * @property string $bookpart_id Часть книги
 * @property string $name Название
 * @property string $ord Порядок
 * @property int $hidden Не показывать
 *
 * @property Bookpart $bookpart
 * @property Scene[] $scenes
 */
class Chapter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chapter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bookpart_id', 'ord', 'hidden'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['bookpart_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bookpart::className(), 'targetAttribute' => ['bookpart_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bookpart_id' => 'Часть книги',
            'name' => 'Название',
            'ord' => 'Порядок',
            'hidden' => 'Не показывать',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookpart()
    {
        return $this->hasOne(Bookpart::className(), ['id' => 'bookpart_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScenes()
    {
        return $this->hasMany(Scene::className(), ['chapter_id' => 'id']);
    }
}
