<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 10.10.2017
 * Time: 13:52
 */

namespace backend\controllers;


class TranslationController extends \yii\web\Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => \yii\filters\AccessControl::className(),
				'rules' => [
					[
						'actions' => ['index','view','create','update','delete'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => \yii\filters\VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}

}