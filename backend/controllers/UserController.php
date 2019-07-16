<?php
namespace backend\controllers;

use common\controllers\AuthController;
use common\models\User;
use yii\data\ActiveDataProvider;

class UserController extends AuthController {

    public function actionIndex() {
        \Yii::$app->view->title = 'Users sales';
        $provider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('index', ['provider' => $provider]);
    }

}