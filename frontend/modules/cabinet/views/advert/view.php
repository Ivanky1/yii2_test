<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Advert */

$this->title = $model->id_advert;
$this->params['breadcrumbs'][] = ['label' => 'Adverts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
echo \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]);
?>
<div class="advert-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_advert], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_advert], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_advert',
            'price',
            'address',
            'user.email',
            [
                'attribute'=>'general_image',
                'value'=> \frontend\components\Common::getAdvertImage($model->id_advert, $model->general_image),
                //'/upload/adverts/'.$model->id_advert.'/general/'.$model->general_image,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            'description:ntext',
            'locaton',
            'hot',
            'sold',
            'type',
            'recommend',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
