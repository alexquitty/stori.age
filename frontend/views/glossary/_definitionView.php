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
			echo '</dl>';
		$letter = $item['letter'];
		?><h1 class="well well-sm text-center"><?=$letter?></h1><dl class="container"><?php
	}

	?><dt class="h4">
		<?=$item['name']?>
		<button
			type="button"
			role="button"
			data-field="type_code"
			data-value="<?=$item['type_code']?>"
			class="btn btn-link"
		><?=$types[$item['type_code']]?></button>
	</dt>
	<dd class="mb-25"><?=$item['description']?></dd><?php
}

?></dl>