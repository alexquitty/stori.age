<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "race".
 *
 * @property int $id
 * @property string $code Код
 * @property int $name Название
 * @property int $hidden Скрыть
 */
class Race extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'race';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'hidden'], 'integer'],
            [['code'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код',
            'name' => 'Название',
            'hidden' => 'Скрыть',
        ];
    }
}
