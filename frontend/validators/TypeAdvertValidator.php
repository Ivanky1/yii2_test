<?php
namespace frontend\validators;

use yii\validators\Validator;

class TypeAdvertValidator extends Validator {
    public function validateAttribute($model, $attribute) {
        $value = $model->attribute;
        if (!$value) {
            $this->addError($model, $attribute, 'Unknown  attribute');
        }
    }
}