<?php

namespace common\models;


use common\traits\QueryTrait;

/**
 * This is the ActiveQuery class for [[Entity]].
 *
 * @see Entity
 */
class EntityQuery extends \yii\db\ActiveQuery
{
	use QueryTrait;

	/**
	 * @param bool $forSelect
	 *
	 * @return $this
	 */
    public function character($forSelect = false)
    {
	    if($forSelect)
		    $this->prepareForSelect();

	    return $this->andWhere(['type_code' => 'character', 'cloned_id' => null]);
    }

	/**
	 * @param bool $forSelect
	 *
	 * @return $this
	 */
	public function race($forSelect = false)
	{
		if($forSelect)
			$this->prepareForSelect();

		return $this->andWhere(['type_code' => 'race']);
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
