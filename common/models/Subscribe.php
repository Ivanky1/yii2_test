<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subsribe".
 *
 * @property integer $id_subscribe
 * @property string $email
 * @property string $date_subscribe
 */
class Subscribe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscribe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_subscribe'], 'safe'],
            [['email'], 'string', 'max' => 200],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_subscribe' => 'Id Subscribe',
            'email' => 'Email',
            'date_subscribe' => 'Date Subscribe',
        ];
    }

    /**
     * @inheritdoc
     * @return SubscribeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubscribeQuery(get_called_class());
    }
}
