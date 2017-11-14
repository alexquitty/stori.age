<?php

namespace backend\models\wow;

use Yii;

/**
 * This is the model class for table "wow_class".
 *
 * @property string $code
 * @property string $name
 * @property string $color
 */
class WowClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wow_class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'color'], 'required'],
            [['code'], 'string', 'max' => 15],
            [['name'], 'string', 'max' => 30],
            [['color'], 'string', 'max' => 7],
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
            'name' => 'Name',
            'color' => 'Color',
        ];
    }

	public function getAvailableRaces()
	{
		return $this->hasMany(WowRace2class::className(), ['class_code' => 'code'])->joinWith(['race'])->orderBy([
			WowRace::tableName().'.alliance' => SORT_ASC,
			WowRace::tableName().'.name' => SORT_ASC,
		]);
	}
}
