<?php

namespace common\models;


use common\traits\QueryTrait;

/**
 * This is the ActiveQuery class for [[Entity]].
 *
 * @see Entity
 */
class EntityTypeQuery extends \yii\db\ActiveQuery
{
	use QueryTrait;
}
