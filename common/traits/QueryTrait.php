<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 31.10.2017
 * Time: 15:39
 */

namespace common\traits;


trait QueryTrait
{
	public function prepareForSelect($textKey = 'name', $idKey = 'id')
	{
		$this
			->select($textKey)
			->indexBy($idKey)
			->orderBy([$textKey => SORT_ASC])
			->asArray();

		return $this;
	}
}