<?php

namespace frontend\components;

use yii\base\Component;
use yii\helpers\Url;

class Common extends Component {

    const EVENT_NOTIFY = 'notify_test';

    public function  sendMail($email, $subject, $body = '', $name = 'Advert') {
       \Yii::$app->mail->compose()
        //->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
        ->setFrom(['yii2.school@yandex.ru' => 'Advert'])
        ->setTo([$email => $name])
        ->setSubject($subject)
        ->setTextBody($body)
        ->send();
    }

    public function notify_test_on() {
        $this->trigger(self::EVENT_NOTIFY);
    }
    public function notify_test() {
        echo 'Test TEST test';
    }

    public static function getTitleAdvert($data){

        return $data['type'].' Bed Rooms and '.' Kitchen Room Aparment on Sale';
    }

    public static function getType($row){
        return ($row['sold']) ? 'Sold' : 'New';
    }

    public static function getUrlAdvert($row){
        return Url::to(['/main/main/view-advert', 'id' => $row['id_advert']]);
    }

    public static function getAdvertImage($id, $name, $original=false){
        $base = '/upload/adverts/';
        return $base.(($original) ? $id.'/general/'.$name : $id.'/general/small_'.$name);
    }

    public static function getUserImage($id, $original=false){
        $base = '/upload/users/';
        return $base.(($original) ? $id : 'small_'.$id).'.jpg';
    }
}