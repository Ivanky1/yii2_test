<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <?= \yii\grid\GridView::widget([
                'dataProvider' => $provider,
                'columns' => [
                    'id',
                    'username',
                    'email',
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:d-m-Y'],
                        'label' => 'Date',
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{delete}',
                    ],

                ],
            ]) ?>

        </div>
    </div>

</div>