<?php

namespace backend\models\wow;

/**
 * This is the model class for table "wow_race".
 *
 * @property string $code
 * @property int $alliance
 * @property string $name
 */
class WowRace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wow_race';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['alliance'], 'integer'],
            [['code'], 'string', 'max' => 15],
            [['name'], 'string', 'max' => 50],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'alliance' => 'Alliance',
            'name' => 'Name',
        ];
    }

	public function getGender()
	{
		return $this->hasOne(WowRaceGender::className(), ['race_code' => 'code', 'gender' => 'gender']);
	}
}
