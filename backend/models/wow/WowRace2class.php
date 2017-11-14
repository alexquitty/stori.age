<?php

namespace backend\models\wow;

use Yii;

/**
 * This is the model class for table "wow_race2class".
 *
 * @property string $class_code
 * @property string $race_code
 */
class WowRace2class extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wow_race2class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_code', 'race_code'], 'required'],
            [['class_code', 'race_code'], 'string', 'max' => 15],
            [['class_code', 'race_code'], 'unique', 'targetAttribute' => ['class_code', 'race_code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'class_code' => 'Class Code',
            'race_code' => 'Race Code',
        ];
    }

	public function getRace()
	{
		return $this->hasOne(WowRace::className(), ['code' => 'race_code']);
	}
}
