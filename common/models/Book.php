<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property string $id
 * @property string $name Название
 * @property string $cycle_id ID цикла
 * @property string $description Описание
 * @property string $ord Порядок
 *
 * @property Annotation[] $annotations
 * @property Cycle $cycle
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['cycle_id', 'ord', 'hidden'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['cycle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cycle::className(), 'targetAttribute' => ['cycle_id' => 'id']],
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
            'name' => 'Название',
            'cycle_id' => 'Цикл',
            'description' => 'Описание',
            'ord' => 'Порядок',
	        'hidden' => 'Скрыть',
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
    public function getAnnotations()
    {
        return $this->hasMany(Annotation::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCycle()
    {
        return $this->hasOne(Cycle::className(), ['id' => 'cycle_id']);
    }
}
