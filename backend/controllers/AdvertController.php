<?php
namespace backend\controllers;

use common\controllers\AuthController;
use common\models\Advert;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBasicAuth;

class AdvertController extends AuthController {

  /*  public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => function($username, $password)
                    {
                        $model =  User::findOne([
                            'username' => $username,
                        ]);
                        if($model->validatePassword($password)){
                            return $model;
                        }

                    }
        ];
        return $behaviors;
    } */

    public function actionIndex() {
        \Yii::$app->view->title = 'Users sales';
        $provider = new ActiveDataProvider([
            'query' => Advert::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('index', ['provider' => $provider]);
    }
}