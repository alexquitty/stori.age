<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bookpart".
 *
 * @property string $id
 * @property string $book_id Книга
 * @property string $name Название
 * @property string $ord Порядок
 * @property int $hidden Не показывать
 *
 * @property Book $book
 * @property Chapter[] $chapters
 */
class Bookpart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bookpart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'ord', 'hidden'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 150],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Книга',
            'name' => 'Название',
            'ord' => 'Порядок',
            'hidden' => 'Не показывать',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChapters()
    {
        return $this->hasMany(Chapter::className(), ['bookpart_id' => 'id']);
    }
}
