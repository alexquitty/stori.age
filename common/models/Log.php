<?php

// namespace common\models;

// use Yii;
use common\models\User;

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
            [['user_id', 'table_name', 'action'], 'required'],
            [['user_id'], 'integer'],
            [['date'], 'safe'],
            [['table_name', 'action'], 'string', 'max' => 150],
            [['item_key'], 'string', 'max' => 250],
	        [['date'], 'default', 'value' => date('c')],
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
	        'username' => 'Пользователь',
            'date' => 'Дата и время',
            'table_name' => 'Таблица',
            'item_key' => 'Запись',
            'action' => 'Действие',
        ];
    }

	public function getActionAttributeAsIcon()
	{
		$prefix = '<span class="glyphicon glyphicon-';
		$postfix = '"></span>';

		$result = $prefix;

		switch($this->action)
		{
			case 'create':
				$result .= 'plus';
				break;
			case 'delete':
				$result .= 'trash';
				break;
			case 'update':
				$result .= 'pencil';
				break;
			case 'view':
				$result .= 'eye-open';
				break;
			default:
				$result = null;
		}

		if(isset($result))
			$result .= $postfix;

		return $result;
	}

	public function getContent()
	{
		return $this->hasOne(LogContent::className(), ['id' => 'log_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getUser()
	{
		return $this->hasOne(User::className(), ['id' => 'user_id']);
	}
}