<?php

namespace common\models;

/**
 * This is the model class for table "source_message".
 *
 * @property int $id
 * @property string $category Категория
 * @property string $message Сообщение
 *
 * @property Message[] $messages
 */
class SourceMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'source_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['category'], 'string', 'max' => 255],
	        [['category'], 'default', 'value' => 'website'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Категория',
            'message' => 'Оригинал',
	        'translation' => 'Перевод',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['id' => 'id']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTranslation()
	{
		return $this->hasOne(Message::className(), ['id' => 'id'])->andWhere(['message.language' => 'ru']);
	}
}
