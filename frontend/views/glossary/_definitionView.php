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
$letter = $models[0]->letter;

?>
<div class="container">
	<h1 class="text-center"><?=$letter?></h1>
	<dl><?php

		foreach($models as $idx => $item)
		{
			if($idx > 0)
				echo '<hr/>';

			?><dt class="lead">
				<?=$item['name']?>
				<button
					type="button"
					role="button"
					data-field="type_code"
					data-value="<?=$item['type_code']?>"
					class="btn btn-link"
				><?=$types[$item['type_code']]?></button>
			</dt>
			<dd><?=$item['description']?></dd><?php
		}

	?></dl>
</div>