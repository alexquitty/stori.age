<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "creature".
 *
 * @property string $id
 * @property string $entity_id Сущность
 * @property int $hidden Скрыть
 *
 * @property Entity $entity
 */
class Creature extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'creature';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entity_id', 'hidden'], 'integer'],
            [['entity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entity::className(), 'targetAttribute' => ['entity_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entity_id' => 'Сущность',
            'hidden' => 'Скрыть',
        ];
    }

	/**
	 * @return CommonQuery
	 */
	public static function find()
	{
		return new CommonQuery(get_called_class());
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntity()
    {
        return $this->hasOne(Entity::className(), ['id' => 'entity_id']);
    }
}
