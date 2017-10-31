<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Entity]].
 *
 * @see Entity
 */
class EntityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Entity[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Entity|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

	/**
	 * @param null $as
	 *
	 * @return $this
	 */
	public function selectTypeName($as = null)
	{
		return $this->joinWith(['typeCode'.(empty($as) ? '' : ' AS '.$as)]);
	}
}
