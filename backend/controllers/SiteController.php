<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\base\BaseBackController;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use common\models\RegisterForm;

/**
 * Site controller
 */
class SiteController extends BaseBackController
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
                        'actions' => ['login', 'error', 'register'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','register'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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

    public function actionIndex()
    {
        return $this->render('index',$this->data);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $this->data['model'] = $model;
            return $this->render('login', $this->data);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRegister()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->goHome();
        } else {
            $this->data['model'] = $model;
            return $this->render('register', $this->data);
        }
    }
}
