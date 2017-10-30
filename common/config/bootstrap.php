<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

Yii::$classMap['DebugBot'] = '@common/classes/DebugBot.php';
Yii::$classMap['func'] = '@common/classes/func.php';

Yii::$classMap['Log'] = '@common/models/Log.php';
Yii::$classMap['LogContent'] = '@common/models/LogContent.php';