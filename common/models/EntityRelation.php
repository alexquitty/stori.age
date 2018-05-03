<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "entity_relation".
 *
 * @property string $source_id
 * @property string $relation_code
 * @property string $receiver_id
 */
class EntityRelation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entity_relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['source_id', 'relation_code', 'receiver_id'], 'required'],
            [['source_id', 'receiver_id'], 'integer'],
            [['relation_code'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'source_id' => 'Source ID',
            'relation_code' => 'Relation Code',
            'receiver_id' => 'Receiver ID',
        ];
    }

	public function getReceiver()
	{
		return $this->hasOne(Entity::className(), ['id' => 'receiver_id']);
	}

	public function getRelationData()
	{
		return $this->hasOne(Relation::className(), ['code' => 'relation_code']);
	}

	public function getSource()
	{
		return $this->hasOne(Entity::className(), ['id' => 'source_id']);
	}
}