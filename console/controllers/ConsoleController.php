<?php

namespace console\controllers;

use yii\helpers\Console;
use yii\console\Controller;

class ConsoleController extends Controller {

    public function actionAdd(array $ar) {
        print_r($ar);
    }
}