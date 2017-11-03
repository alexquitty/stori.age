<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cycle".
 *
 * @property string $id
 * @property string $cycle_id
 * @property string $name Название
 * @property string $description Описание
 * @property string $ord Порядок
 *
 * @property Book[] $books
 * @property Cycle $cycle
 * @property Cycle[] $cycles
 */
class Cycle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cycle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cycle_id', 'ord'], 'integer'],
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['cycle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cycle::className(), 'targetAttribute' => ['cycle_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cycle_id' => 'Цикл',
            'name' => 'Название',
            'description' => 'Описание',
            'ord' => 'Порядок',
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
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['cycle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCycle()
    {
        return $this->hasOne(Cycle::className(), ['id' => 'cycle_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCycles()
    {
        return $this->hasMany(Cycle::className(), ['cycle_id' => 'id']);
    }
}
