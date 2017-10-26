<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 26.10.2017
 * Time: 14:56
 */

/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\EntitySearch */
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

		<?=$item['name']?>

		<button
			type="button"
			role="button"
			data-field="type_code"
			data-value="<?=$item['type_code']?>"
			class="btn btn-link"
		><?=$types[$item['type_code']]?><span class="fa fa-filter"></span>
		</button>

		<a href="/<?=$item['type_code']?>/?id=<?=$item['id']?>" class="btn btn-xs btn-default">
			<span class="glyphicon glyphicon-eye-open"></span>
		</a><?php

		if(\Yii::$app->user->can('author'))
		{
			?><a href="/cpanel/entity/update?id=<?=$item['id']?>" class="btn btn-xs btn-default pull-right">
				<span class="glyphicon glyphicon-pencil"></span>
			</a><?php
		}

	?></dt>
	<dd class="mb-25"><?=$item['description']?></dd><?php
}

?></dl>