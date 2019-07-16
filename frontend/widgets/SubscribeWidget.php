<?php
namespace frontend\widgets;

use common\models\Subscribe;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Widget;
use yii\web\Response;

class SubscribeWidget extends Widget {
    public function run() {
        $model = new Subscribe();
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'Вы успешно подписались!');
            $controller = \Yii::$app->controller;
            $controller->redirect('/');
        }
        return $this->render('subscribe', ['model' => $model]);
    }
}

