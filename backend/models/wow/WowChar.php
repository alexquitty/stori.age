<?php

namespace backend\models\wow;

/**
 * This is the model class for table "wow_char".
 *
 * @property string $id
 * @property string $name
 * @property string $spec_code
 * @property string $race_code
 * @property string $prof1_code
 * @property string $prof2_code
 */
class WowChar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wow_char';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'spec_code', 'race_code', 'prof1_code', 'prof2_code'], 'required'],
	        [['gender'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['spec_code', 'race_code', 'prof1_code', 'prof2_code'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
	        'gender' => 'Gender',
            'spec_code' => 'Spec Code',
            'race_code' => 'Race Code',
            'prof1_code' => 'Prof1 Code',
            'prof2_code' => 'Prof2 Code',
        ];
    }

	public function getProf1()
	{
		return $this->hasOne(WowProf::className(), ['code' => 'prof1_code'])->from(WowProf::tableName(). ' prof1');
	}

	public function getProf2()
	{
		return $this->hasOne(WowProf::className(), ['code' => 'prof2_code'])->from(WowProf::tableName(). ' prof2');
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRace()
	{
		return $this->hasOne(WowRaceGender::className(), ['race_code' => 'race_code', 'gender' => 'gender'])->joinWith('race');
	}

	public function getSpec()
	{
		return $this->hasOne(WowSpec::className(), ['code' => 'spec_code']);
	}
}
