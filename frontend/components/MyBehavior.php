<?php
namespace frontend\components;

use yii\base\Behavior;

class MyBehavior extends Behavior {
    public $prop1;
    private $prop2;
    public function getProp2()
    {
        return $this->prop2;
    }
    public function setProp2($value)
    {
        $this->prop2 = $value;
    }
}