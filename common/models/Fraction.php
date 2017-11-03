<?php

namespace common\models;

/**
 * This is the model class for table "fraction".
 *
 * @property string $id
 * @property string $fraction_id Фракция
 * @property string $entity_id Сущность
 * @property string $bookpart_id На момент
 * @property int $hidden Скрыть
 *
 * @property Entity $entity
 * @property Bookpart $bookpart
 * @property Fraction $fraction
 * @property Fraction[] $fractions
 */
class Fraction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fraction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fraction_id', 'entity_id', 'bookpart_id', 'hidden'], 'integer'],
            [['entity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entity::className(), 'targetAttribute' => ['entity_id' => 'id']],
            [['bookpart_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bookpart::className(), 'targetAttribute' => ['bookpart_id' => 'id']],
            [['fraction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fraction::className(), 'targetAttribute' => ['fraction_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fraction_id' => 'Фракция',
            'entity_id' => 'Сущность',
            'bookpart_id' => 'На момент',
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
    public function getEntity()
    {
        return $this->hasOne(Entity::className(), ['id' => 'entity_id']);
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
    public function getFraction()
    {
        return $this->hasOne(Fraction::className(), ['id' => 'fraction_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFractions()
    {
        return $this->hasMany(Fraction::className(), ['fraction_id' => 'id']);
    }
}
