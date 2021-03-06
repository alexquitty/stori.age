<?php

namespace common\models;

/**
 * This is the model class for table "character".
 *
 * @property string $id
 * @property string $entity_id Сущность
 * @property string $bookpart_id На момент
 * @property string $firstname Имя
 * @property string $middlename Дополнительные имена
 * @property string $lastname Фамилия
 * @property int $gender Пол
 * @property string $birthplace Место рождения
 * @property string $birthdate Дата рождения
 * @property string $age Возраст
 * @property string $appearance Внешность
 * @property int $sex Сексуальные предпочтения
 * @property string $profession Род деятельности
 * @property string $deathplace Место смерти
 * @property string $deathdate Дата смерти
 * @property string $ord Порядок
 * @property int $hidden Скрыть
 *
 * @property Entity $entity
 * @property Bookpart $bookpart
 * @property CharacterCharacter[] $characterCharacters
 */
class Character extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entity_id', 'bookpart_id', 'gender_id', 'age', 'sex_id', 'ord', 'hidden'], 'integer'],
            [['birthplace', 'birthdate', 'appearance', 'profession', 'deathplace', 'deathdate'], 'string'],
            [['firstname', 'middlename', 'lastname'], 'string', 'max' => 250],

            [['entity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entity::className(), 'targetAttribute' => ['entity_id' => 'id']],
            [['bookpart_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bookpart::className(), 'targetAttribute' => ['bookpart_id' => 'id']],
	        [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
	        [['sex_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['sex_id' => 'id']],

	        [['firstname', 'middlename', 'lastname', 'gender_id', 'birthplace', 'birthdate', 'age', 'appearance', 'sex_id', 'profession', 'deathplace', 'deathdate'], 'default'],
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
            'entity_id' => 'Сущность',
            'bookpart_id' => 'На момент',
            'firstname' => 'Имя',
            'middlename' => 'Дополнительные имена',
            'lastname' => 'Фамилия',
            'gender_id' => 'Пол',
            'birthplace' => 'Место рождения',
            'birthdate' => 'Дата рождения',
            'age' => 'Возраст',
            'appearance' => 'Внешность',
            'sex_id' => 'Сексуальные предпочтения',
            'profession' => 'Род деятельности',
            'deathplace' => 'Место смерти',
            'deathdate' => 'Дата смерти',
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
	public function getGender()
	{
		return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRaces()
	{
		return $this->hasMany(CharacterRace::className(), ['character_id' => 'id']);
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelations()
    {
        return $this->hasMany(CharacterCharacter::className(), ['character_id' => 'id']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSex()
	{
		return $this->hasOne(Gender::className(), ['id' => 'sex_id']);
	}
}
