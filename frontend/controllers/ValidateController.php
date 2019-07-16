<?php
namespace frontend\controllers;

use common\models\LoginForm;
use common\models\Subscribe;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ValidateController extends  Controller {
    public function actionIndex() {
        $model = new LoginForm();
        return $this->actionValidateIsAjax($model);
    }
    public function actionSubscribe() {
        $model = new Subscribe();
        return $this->actionValidateIsAjax($model);
    }
    private function actionValidateIsAjax($model) {
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
}

