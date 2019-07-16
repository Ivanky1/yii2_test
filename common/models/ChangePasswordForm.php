<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class ChangePasswordForm extends Model
{
    public $password;
    public $re_password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['password', 're_password'], 'required'],
            ['re_password', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function changePassword()
    {
        if ($this->validate()) {
            $user = User::findOne(Yii::$app->user->identity->id);
            $user->setPassword($this->password);
            $user->save(true, ['password_hash']);
        }
    }
}
