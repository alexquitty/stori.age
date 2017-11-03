<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "annotation".
 *
 * @property string $id
 * @property string $book_id
 * @property string $snowflake_id
 * @property string $content
 *
 * @property Book $book
 * @property Snowflake $snowflake
 */
class Annotation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'annotation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'snowflake_id'], 'integer'],
            [['content'], 'string'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['snowflake_id'], 'exist', 'skipOnError' => true, 'targetClass' => Snowflake::className(), 'targetAttribute' => ['snowflake_id' => 'id']],
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
            'snowflake_id' => 'Шаг снежинки',
            'content' => 'Текст',
        ];
    }

	/**
	 * @return CommonQuery
	 */
	public static function find()
	{
		return new CommonQuery(get_called_class());
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
    public function getSnowflake()
    {
        return $this->hasOne(Snowflake::className(), ['id' => 'snowflake_id']);
    }
}
