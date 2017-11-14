<?php

namespace backend\models\wow;


class WowRaceGender extends \yii\db\ActiveRecord
{
	public static function tableName()
	{
		return 'wow_race_gender';
	}

	public function rules()
	{
		return [
			[['code', 'gender'], 'required'],
			[['gender'], 'integer'],
			[['code'], 'string', 'max' => 15],
			[['image'], 'string', 'max' => 250],
			[['code', 'gender'], 'unique'],
		];
	}

	public function attributeLabels()
	{
		return [
			'code' => 'Code',
			'gender' => 'Gender',
			'image' => 'Image',
		];
	}

	public function getRace()
	{
		return $this->hasOne(WowRace::className(), ['code' => 'race_code'])->orderBy([WowRace::tableName().'.alliance' => SORT_ASC]);
	}
}