<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 31.10.2017
 * Time: 15:36
 */

namespace common\models;


use common\traits\QueryTrait;
use yii\db\ActiveQuery;

class GenderQuery extends ActiveQuery
{
	use QueryTrait;

	/**
	 * @param bool $forSelect
	 *
	 * @return $this
	 */
	public function gender($forSelect = false)
	{
		if($forSelect) $this->prepareForSelect();

		return $this->andWhere(['type' => 0]);
	}

	/**
	 * @param bool $forSelect
	 *
	 * @return $this
	 */
	public function sex($forSelect = false)
	{
		if($forSelect) $this->prepareForSelect();

		return $this->andWhere(['type' => 1]);
	}
}