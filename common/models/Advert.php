<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "Advert".
 *
 * @property integer $id_advert
 * @property integer $price
 * @property string $address
 * @property integer $fk_agent
 * @property string $general_image
 * @property string $description
 * @property string $locaton
 * @property integer $hot
 * @property integer $sold
 * @property string $type
 * @property integer $recommend
 * @property integer $created
 * @property integer $updated
 */
class Advert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Advert';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['step2'] = ['general_image'];
        return $scenarios;
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'fk_agent', 'hot', 'sold', 'recommend', ], 'integer'],
            [['description'], 'string'],
            [['address',], 'string', 'max' => 255],
            [['locaton'], 'string', 'max' => 200],
            [['type'], 'string', 'max' => 100],
            ['general_image', 'file', 'extensions' => ['jpg', 'png', 'gif']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_advert' => 'Id Advert',
            'price' => 'Price',
            'address' => 'Address',
            'fk_agent' => 'Fk Agent',
            'general_image' => 'General Image',
            'description' => 'Description',
            'locaton' => 'Locaton',
            'hot' => 'Hot',
            'sold' => 'Sold',
            'type' => 'Type',
            'recommend' => 'Recommend',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return AdvertQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdvertQuery(get_called_class());
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id' => 'fk_agent']);
    }

    //beforeValidate
    //afterValidate
    //beforeSave
    //afterSave
    //beforeFind
    //afterFind

    public function afterValidate(){
        $this->fk_agent = Yii::$app->user->identity->id;
    }

    public function afterSave($insert, $changedAttributes){
        Yii::$app->locator->cache->set('id', $this->id_advert);
    }
}
