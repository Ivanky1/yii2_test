<?php
return [
    'name' => 'My Project',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => require(dirname(__DIR__).'/config/db.php'),
        'cache' => [
          //  'class' => 'yii\caching\FileCache',
            'class' => 'yii\caching\MemCache',

        ],
        'urlManager' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'pages/<view:[a-zA-Z0-9-]+>' => 'main/main/page',
                'view-advert/<id:\d+>' => 'main/main/view-advert',
                'cabinet/<action_cabinet:(settings|password-change)>' => 'cabinet/default/<action_cabinet>',
                'cabinet/advert/view/<id:\d+>' => 'cabinet/advert/view',
                'cabinet/advert/update/<id:\d+>' => 'cabinet/advert/update',
                'cabinet/advert/delete/<id:\d+>' => 'cabinet/advert/delete',
            ]
        ]
    ],

];
