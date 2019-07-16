<?php

namespace app\modules\cabinet\controllers;

use common\models\ChangePasswordForm;
use common\models\User;
use Imagine\Image\Box;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\UploadedFile;

class DefaultController extends Controller
{
    public $layout = 'inner';
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['password-change', 'settings'],
                'rules' => [
                    // deny all POST requests
                    [
                        //'allow' => false,
                        'verbs' => [
                            'class' => VerbFilter::className(),
                            'actions' => [
                                'delete' => ['post'],
                            ],
                        ],
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                    // everything else is denied
                ],
            ]
        ];
    }

    public function actionPasswordChange()
    {
        $model = new ChangePasswordForm();
        if (\Yii::$app->request->isPost) {
            if ($model->load(\Yii::$app->request->post()) && $model->changePassword()) {
                $this->refresh();
            }
        }
        return $this->render('password-change', ['model' => $model]);
    }

    public function actionSettings()
    {
        $model = User::findOne(\Yii::$app->user->identity->id);
        $model->scenario = 'settings';
        if (\Yii::$app->request->isPost) {
            if ($model->load(\Yii::$app->request->post()) && $model->save()) {
                $this->uploadAvatar();
                $this->refresh();
            }
        }

        return $this->render('settings', ['model' => $model]);
    }

    public function uploadAvatar()
    {
        if (\Yii::$app->request->isPost) {
            $user_id = \Yii::$app->user->identity->id;
            $path = \Yii::getAlias('@frontend/web/upload/users');
            $file = UploadedFile::getInstanceByName('avatar');
            if ($file) {
                $name = $user_id.'.jpg';
                $file->saveAs($path. DIRECTORY_SEPARATOR .$name);
                $image = $path. DIRECTORY_SEPARATOR .$name;
                $image_small = $path. DIRECTORY_SEPARATOR . 'small_'. $name;
                Image::frame($image, 0, '666', 0)
                    ->thumbnail(new Box(200, 200))
                    ->save($image_small, ['quality' => 100]);
                return true;
            }
        }
    }
}
