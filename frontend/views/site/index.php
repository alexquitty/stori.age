<?php

/* @var $this yii\web\View */

use common\classes\WordHelper;

?>
<div class="site-index">

    <div class="jumbotron shortened">
        <h1>Добро пожаловать!</h1>

        <p class="lead">Самая выдающаяся энциклопедия по мирам Отсечённого</p>

        <!--<p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
    </div>

    <div class="body-content"><?php

	    if(false == empty($data))
	    {
		    ?><div class="row"><?php

		        foreach($data as $idx => $item)
		        {
			        if(0 == $idx % 3)
			        	echo '</div><div class="row">';

			        ?><div class="col-lg-4 accurate">

			            <h2><?= empty($item['name']) ? 'Снежинка: Шаг '.$item['id'] : $item['name']?></h2><?php

			            echo WordHelper::truncate($item['description'], 300, [
			            	'href' => ['site/contact'],
				            'text' => 'читать далее',
			            ], null, true) ?: '<i>Нет описания.</i>';

			        ?></div><?php
		        }

		    ?></div><?php
	    }

    ?></div>

</div><?php
/*
<div class="col-lg-4">
	<h2>Heading</h2>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
		dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
		ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
		fugiat nulla pariatur.</p>

	<p>
		<a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a>
	</p>
</div>
<div class="col-lg-4">
	<h2>Heading</h2>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
		dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
		ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
		fugiat nulla pariatur.</p>

	<p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a>
	</p>
</div>
<div class="col-lg-4">
	<h2>Heading</h2>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
		dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
		ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
		fugiat nulla pariatur.</p>

	<p>
		<a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a>
	</p>
</div>*/