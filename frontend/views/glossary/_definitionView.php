<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 26.10.2017
 * Time: 14:56
 */

use common\classes\WordHelper;
use common\models\EntityRelation;

/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\EntitySearch */
/* @var $relation array */
/* @var $types array */


$models = $dataProvider->getModels();
$letter = null;

foreach($models as $item)
{
	if($letter != $item['letter'])
	{
		if(!empty($letter))
			echo '</dl><div class="row"></div>';

		$letter = $item['letter'];
		?><h1 class="clearfix well well-sm text-center"><?=$letter?></h1><dl class="col-xs-12"><?php
	}

	?><dt class="h4">

		<a href="/<?=$item['type_code']?>/?id=<?=$item['id']?>"><?= WordHelper::stress($item['name_stressed'], 'span class="stress"', '_', 'span class="stress upper"') ?: $item['name'] ?></a>

		<button
			type="button"
			role="button"
			data-field="type_code"
			data-value="<?=$item['type_code']?>"
			class="btn btn-link"
		><?=$types[$item['type_code']]?><span class="fa fa-filter"></span></button><?php

		if(\Yii::$app->user->can('author'))
		{
			?><a href="/cpanel/entity/update?id=<?=$item['id']?>" class="btn btn-xs btn-default">
				<span class="glyphicon glyphicon-pencil"></span>
			</a><?php
		}


		$relation = EntityRelation::find()
			->select('r.type_code, rd.name AS relation, r.name, r.id')
			->joinWith(['relationData rd'])
			->joinWith(['receiver r'])
			->where(['source_id' => $item['id']])
			->orderBy(['cognate' => SORT_DESC, 'relation_code' => SORT_ASC])
			->asArray()
			->all();

		foreach($relation as $rel)
		{
			?><a class="label label-info" data-custom href="?EntitySearch[id]=<?=$rel['id']?>"><?=$rel['relation'], empty($rel['relation']) ? '' : ' ', $rel['name']?></a><?
		}

	?></dt>
	<dd class="mb-25"><?=$item['description']?></dd><?php
}

?></dl>