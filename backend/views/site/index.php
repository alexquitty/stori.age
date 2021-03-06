<?php

use common\classes\WordHelper;

/* @var $this yii\web\View */
/* @var $logProvider */
/* @var $entityByType */

function countEntity($data)
{
	$result = 0;

	foreach($data as $item)
		$result += $item['quantity'];

	return $result;
}

?>
<div class="site-index">

	<div class="jumbotron">

		<h1>Уже добавлено <?= countEntity($entityByType) ?> сущностей!</h1>

		<p class="lead">Из них: <?php
			foreach($entityByType as $idx => $item)
			{
				?><span class="nowrap"><?=$item['quantity'], ' ', WordHelper::wordCaseEx($item['quantity'], $item['code_name']), '</span>', ($idx + 1 < count($entityByType)  ? ', ' : '.')?><?php
			}
		?></p>

	</div>

    <div class="body-content">

	    <!--<div class="well">--><?php

		 //    $item = 1;
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'дядя'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'тётя'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'действие'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'традиция'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'время'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'запись'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'друг'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'расписание'), '<br/>';
		 //    echo '<br/>';
	    //
		 //    $item = 2;
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'дядя'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'тётя'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'действие'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'традиция'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'время'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'запись'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'друг'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'расписание'), '<br/>';
		 //    echo '<br/>';
	    //
			// $item = 5;
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'дядя'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'тётя'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'действие'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'традиция'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'время'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'запись'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'друг'), '<br/>';
		 //    echo $item, ' ', WordHelper::wordCaseEx($item, 'расписание'), '<br/>';
	    // ?><!--</div>-->

	    <hr/>

	    <h4>Последние действия в контрольной панели</h4>

	    <?= \yii\grid\GridView::widget([
	    	'dataProvider' => $logProvider,
		    'layout' => "{items}\n{summary}\n",
		    'columns' => [

			    [
				    'attribute' => 'date',
				    'format' => ['date', 'php:M. d, H:i:s'],
			    ],

			    [
			    	'attribute' => 'username',
				    'value' => 'user.username',
			    ],

			    'table_name',

			    'item_key',

			    [
			    	'attribute' => 'action',
				    'format' => 'html',
				    'value' => function($model)
				    {
				    	/* @var $model \Log */
				    	return $model->getActionAttributeAsIcon();
				    }
			    ],
		    ],
	    ]);?>

        <!--<div class="row">-->
        <!--    <div class="col-lg-4">-->
        <!--        <h2>Heading</h2>-->
        <!---->
        <!--        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
        <!--            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
        <!--            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
        <!--            fugiat nulla pariatur.</p>-->
        <!---->
        <!--        <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>-->
        <!--    </div>-->
        <!--    <div class="col-lg-4">-->
        <!--        <h2>Heading</h2>-->
        <!---->
        <!--        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
        <!--            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
        <!--            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
        <!--            fugiat nulla pariatur.</p>-->
        <!---->
        <!--        <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>-->
        <!--    </div>-->
        <!--    <div class="col-lg-4">-->
        <!--        <h2>Heading</h2>-->
        <!---->
        <!--        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
        <!--            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
        <!--            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
        <!--            fugiat nulla pariatur.</p>-->
        <!---->
        <!--        <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
        <!--    </div>-->
        <!--</div>-->

    </div>
</div>
