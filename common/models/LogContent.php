<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "log_content".
 *
 * @property string $log_id
 * @property string $before До
 * @property string $after После
 */
class LogContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['log_id'], 'required'],
            [['log_id'], 'integer'],
            [['before', 'after'], 'string'],
            [['log_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'log_id' => 'Log ID',
            'before' => 'До',
            'after' => 'После',
        ];
    }
}
