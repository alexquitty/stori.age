<?php

namespace backend\controllers;


use common\models\Entity;
use common\models\LoginForm;
use Log;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
    	$entityByType = Entity::find()->alias('e')
		    ->joinWith('typeCode AS et', false)
		    ->select('COUNT(id) AS quantity, et.name AS code_name, e.type_code')
		    ->groupBy(['e.type_code'])
		    // ->indexBy('e.type_code')
		    ->asArray()
		    ->all();

	    // add conditions that should always apply here
	    $logProvider = new ActiveDataProvider([
		    'query' => Log::find()
			    ->orderBy(['date' => SORT_DESC])->limit(5)
			    ->joinWith('user')
	    ]);

        return $this->render('index', [
        	'entityByType' => $entityByType,
        	'logProvider' => $logProvider,
        ]);
    }

	/**
	 * CAN BE USED! DO NOT REMOVE!!!
	 */
	// public function actionInitRole()
	// {
	// 	$auth = Yii::$app->authManager;
	//
	// 	$admin = $auth->createRole('admin');
	// 	$auth->add($admin);
	// 	$author = $auth->createRole('author');
	// 	$auth->add($author);
	//
	// 	$auth->assign($author, 2);
	// 	$auth->assign($admin, 1);
	// }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
