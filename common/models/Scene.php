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
            [['chapter_id', 'snowflake_id', 'ord', 'hidden'], 'integer'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['chapter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chapter::className(), 'targetAttribute' => ['chapter_id' => 'id']],
	        [['snowflake_id'], 'exist', 'skipOnError' => true, 'targetClass' => Snowflake::className(), 'targetAttribute' => ['snowflake_id' => 'id']],
	        [['ord', 'hidden'], 'default', 'value' => 0],
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
	        'snowflake_id' => 'Шаг снежинки',
            'name' => 'Название',
            'content' => 'Текст',
            'ord' => 'Порядок',
            'hidden' => 'Не показывать',
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
    public function getChapter()
    {
        return $this->hasOne(Chapter::className(), ['id' => 'chapter_id']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSnowflake()
	{
		return $this->hasOne(Snowflake::className(), ['id' => 'snowflake_id']);
	}
}
