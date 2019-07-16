<?php

namespace app\modules\main\controllers;

use common\cache\Base64Cache;
use common\models\Advert;
use common\models\LoginForm;
use common\models\Search\AdvertSearch;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\Marker;
use frontend\filters\FilterAdvert;
use frontend\models\Image;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\DynamicModel;
use yii\data\Pagination;
use yii\debug\models\search\Base;
use yii\web\Response;
use yii\bootstrap\ActiveForm;


class MainController extends \yii\web\Controller
{

    public $layout = 'inner';
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'test' => [
                'class' => 'frontend\actions\TestAction',
            ],
            'page' => [
                'class' => 'yii\web\ViewAction',
                'layout' => 'inner',
            ]
        ];
    }

    public function behaviors() {
        return [
            [
                'only' => ['view-advert'],
                'class' => FilterAdvert::className(),
            ]
        ];
    }

    public function actionIndex()
    {

        $all = Advert::find()->asArray()->all();
        print_r($all);

    }
    public function actionViewAdvert($id)
    {
        $model = Advert::findOne($id);
        $fields = ['name', 'email', 'text'];
        $model_feedback = new DynamicModel($fields);
        $model_feedback->addRule('name', 'required');
        $model_feedback->addRule('email', 'required');
        $model_feedback->addRule('email', 'email');
        $model_feedback->addRule('email', 'required');
        if (\Yii::$app->request->isPost) {
            if ($model_feedback->validate() && $model_feedback->load(\Yii::$app->request->post())) {
                print_r($model_feedback);
            }
        }
        $current_user = [];
        $current_user['email'] = '';
        $current_user['username'] = '';
        $user = $model->user;
        if (!\Yii::$app->user->isGuest) {
            $current_user['email'] = \Yii::$app->user->identity->email;
            $current_user['username'] = \Yii::$app->user->identity->username;
        }

        if ($model->locaton) {
            $coords = str_replace(['(',')'], ['', ''], $model->locaton) ;
            $coords = explode(',', $coords);

            $coord = new LatLng(['lat' => $coords[0], 'lng' => $coords[1]]);
            $map = new Map([
                'center' => $coord,
                'zoom' => 14,
            ]);
            $marker = new Marker([
                'position' => $coord,
                'title' => 'My Home Town',
            ]);
            $map->addOverlay($marker);
        } else {
            $map = '';
        }

        $path = \Yii::getAlias("@frontend/web/upload/adverts/".$model->id_advert);
        $images_add = [];
        $images_add[] = "/upload/adverts/{$model->id_advert}/general/small_{$model->general_image}";
        try {
            if(is_dir($path)) {
                $files = \yii\helpers\FileHelper::findFiles($path);
                foreach ($files as $file) {
                    if (strstr($file, "small_") && !strstr($file, "general")) {
                        $images_add[] = "/upload/adverts/{$model->id_advert}/".basename($file);
                    }
                }
            }
        } catch(\yii\base\Exception $e){}

        $hots = Advert::find()->where('hot = 1')->andWhere("id_advert != {$model->id_advert}")->orderBy('id_advert desc')->limit(3)->asArray()->all();

        return
            $this->render('view_advert', [
            'model' => $model,
            'user' => $user,
            'model_feedback' => $model_feedback,
            'current_user' => $current_user,
            'map' => $map,
            'images_add' => $images_add,
             'hots' => $hots
        ]);


    }

    public function actionFind($property = '', $price = '', $type = '') {
        $this->layout = 'sell';
        $query = Advert::find();
        $query->filterWhere(['like', 'address', $property])
              ->orFilterWhere(['like', 'description',$property])
              ->andFilterWhere(['type' => $type]);
        if ($price) {
            preg_match('/(\d+)-?(\d+)?/', $price, $match);
            if (isset($match[2])) {
                $query->andWhere(['between', 'price', $match[1], $match[2]]);
            } else {
                $query->andWhere(['>=', 'price', $match[1]]);
            }
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->setPageSize(10);

        $model = $query->offset($pages->offset)->limit($pages->limit)->all();

        $request = \Yii::$app->request;
        return $this->render("find", ['model' => $model, 'pages' => $pages, 'request' => $request]);
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            $this->goBack();
        }
        return $this->render('login', ['model' => $model]);
    }
    public function actionLogout() {
        \Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionRegister()
    {
        $form = new SignupForm();
        if (\Yii::$app->request->isPost) {
            if ($form->load(\Yii::$app->request->post()) && $form->validate()) {
               // \Yii::$app->response->format = Response::FORMAT_JSON;
                $form->signup();
                \Yii::$app->session->setFlash('success', 'Register success');
            }
        }

        return $this->render('register', ['model' => $form]);
    }

    public function actionLoginData()
    {
        echo \Yii::$app->user->identity->email;
    }

    public function actionContact() {
        $form = new ContactForm();
        if ($form->load(\Yii::$app->request->post()) && $form->validate()) {
            \Yii::$app->common->sendMail($form->email, $form->subject, $form->body);
            print 'send mail';
            die();
        }
        return $this->render('contact', ['model' => $form]);
    }

}
