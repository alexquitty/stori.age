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
            [['entity_id', 'bookpart_id', 'gender', 'age', 'sex', 'ord', 'hidden'], 'integer'],
            [['birthplace', 'birthdate', 'appearance', 'profession', 'deathplace', 'deathdate'], 'string'],
            [['firstname', 'middlename', 'lastname'], 'string', 'max' => 250],

            [['entity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entity::className(), 'targetAttribute' => ['entity_id' => 'id']],
            [['bookpart_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bookpart::className(), 'targetAttribute' => ['bookpart_id' => 'id']],

	        [['firstname', 'middlename', 'lastname', 'gender', 'birthplace', 'birthdate', 'age', 'appearance', 'sex', 'profession', 'deathplace', 'deathdate'], 'default'],
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
            'gender' => 'Пол',
            'birthplace' => 'Место рождения',
            'birthdate' => 'Дата рождения',
            'age' => 'Возраст',
            'appearance' => 'Внешность',
            'sex' => 'Сексуальные предпочтения',
            'profession' => 'Род деятельности',
            'deathplace' => 'Место смерти',
            'deathdate' => 'Дата смерти',
            'ord' => 'Порядок',
            'hidden' => 'Скрыть',
        ];
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
}
