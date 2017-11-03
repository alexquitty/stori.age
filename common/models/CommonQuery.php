<?php

namespace common\models;


use common\traits\QueryTrait;

/**
 * This is the ActiveQuery class for [[Entity]].
 *
 * @see Entity
 */
class CommonQuery extends \yii\db\ActiveQuery
{
	use QueryTrait;
}
