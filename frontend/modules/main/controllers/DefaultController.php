<?php

namespace app\modules\main\controllers;

use frontend\components\Common;
use frontend\components\MyBehavior;
use yii\caching\MemCache;
use yii\db\Connection;
use yii\db\Query;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function behaviors() {
        return [
          'myBehavior2' => MyBehavior::className(),
        ];
    }
    public function actionIndex()
    {
        $this->layout = 'bootstrap';
        //$cache = new MemCache();

        $cache = \Yii::$app->cache;
        if ($cache->get('adverts_all')) {
            return $this->render('index', ['results' => $cache->get('adverts_all')]);
        } else {
            $query = new Query();
            $adverts = $query->from('advert')
                ->orderBy('id_advert desc');
            $result = $adverts->all();
            $cache->set('adverts_all', $result);
           return $this->render('index', ['results' => $result]);
        }

    }
    public function actionPath()
    {
       print \Yii::getAlias('@frontend');
    }
    public function actionEvents()
    {
       $common = new Common();
       $common->on(Common::EVENT_NOTIFY, [$common, 'notify_test']);
       $common->notify_test_on();
    }
    public function actionService()
    {
        $cache = new MemCache();
        $arr = [1,3,5,7,'assoc' => 'aaaa'];
        $arr2 = [6,3,5,8,'assoc' => 'bbbdsgagas'];
        $cache->set('new2', $arr2);
        print_r($cache->get('adverts_all'));
        $locator = \Yii::$app->locator;
        $cache = $locator->cache;
        $cache->set('test', 1);
        echo $cache->get('test');
    }
}
