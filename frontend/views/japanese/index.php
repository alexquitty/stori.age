<?php

/* @var $this yii\web\View */
/* @var $question */
/* @var $answers */
/* @var $index */
/* @var $score */

$this->title = 'Learning Japanese Alphabet';

?><div>
	<h1><?=$this->title?></h1>

	<h2><?=$question?></h2>

	<?= isset($msg) ? '<h3>'.$msg.'</h3>' : '' ?>

	<form method="post">
		<div style="font-size: 24px; line-height: 50px"><?php
			foreach($answers as $k => $answer)
			{
				?><div style="width: 25%; float: left"><?php
					foreach($answer as $item)
					{
						?><label><input type="radio" name="<?=$k?>" value="<?=$item['index']?>"> <?=$item['glyph']?></label><br/><?php
					}
				?></div><?php
			}
		?></div>
		<input type="hidden" name="score" value="<?=$score?>"/>
		<input type="hidden" name="index" value="<?=$index?>"/>
		<button type="submit" style="font-size: 26px; padding: 5px 15px">Check!</button>
	</form>

	<hr/>
	<div style="margin-top: 20px">
		You score is <?=$score?>
	</div>
</div>