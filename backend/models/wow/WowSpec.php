<?php

namespace backend\models\wow;

use Yii;

/**
 * This is the model class for table "wow_spec".
 *
 * @property string $code
 * @property string $class_code
 * @property string $name
 * @property string $type
 */
class WowSpec extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wow_spec';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'class_code', 'name', 'type'], 'required'],
            [['code', 'class_code'], 'string', 'max' => 15],
            [['name'], 'string', 'max' => 50],
            [['type'], 'string', 'max' => 1],
	        [['image'], 'string', 'max' => 250],
            [['code', 'class_code'], 'unique', 'targetAttribute' => ['code', 'class_code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'class_code' => 'Class Code',
            'name' => 'Name',
            'type' => 'Type',
	        'image' => 'Image',
        ];
    }

	public function getClass()
	{
		return $this->hasOne(WowClass::className(), ['code' => 'class_code']);
	}

	public function getChar()
	{
		return $this->hasOne(WowChar::className(), ['spec_code' => 'code']);
	}
}
