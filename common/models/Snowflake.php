<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "snowflake".
 *
 * @property string $id
 * @property string $description Описание
 */
class Snowflake extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'snowflake';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Описание',
        ];
    }
}
