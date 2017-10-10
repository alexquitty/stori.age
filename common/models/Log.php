<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "log".
 *
 * @property string $id
 * @property int $user_id ID пользователя
 * @property string $date Дата и время
 * @property string $table_name Таблица
 * @property string $item_key Запись
 * @property string $action Действие
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'date', 'table_name', 'item_key', 'action'], 'required'],
            [['user_id'], 'integer'],
            [['date'], 'safe'],
            [['table_name', 'action'], 'string', 'max' => 150],
            [['item_key'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'ID пользователя',
            'date' => 'Дата и время',
            'table_name' => 'Таблица',
            'item_key' => 'Запись',
            'action' => 'Действие',
        ];
    }
}
