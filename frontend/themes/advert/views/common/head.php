<?php if (Yii::$app->session->hasFlash('success')) : ?>
    <?php
    $success = Yii::$app->session->getFlash('success');
    echo \yii\bootstrap\Alert::widget([
        'options' => [
            'class' => 'alert-info'
        ],
        'body' => $success
    ]);

    ?>
<?php endif ?>

<!-- Header Starts -->
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">


                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
                <?php
                $menuItems = [
                    ['label' => 'Home', 'url' => '/'],
                    ['label' => 'About', 'url' => ['/main/main/page', 'view' => 'about']],
                    ['label' => 'Contact', 'url' => ['/main/main/page', 'view' => 'contact']],
                ];
                echo \yii\bootstrap\Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $menuItems,
                ]);
                ?>
            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>
<!-- #Header Starts -->


<div class="container">

    <!-- Header Starts -->
    <div class="header">
        <a href="/" ><img src="/images/logo.png"  alt="Realestate"></a>
        <?php
            $menuItems = [];
            $guest = Yii::$app->user->isGuest;
            if ($guest) {
                $menuItems[] = ['label' => 'Login', 'url' => '#', 'options' => ['data-toggle' => 'modal', 'data-target' => '#loginpop']];
            } else {
                $menuItems[] = ['label' => 'Manager Adverts', 'url' => '/cabinet/advert'];
                $menuItems[] = ['label' => 'Settings', 'url' => '/cabinet/settings'];
                $menuItems[] = ['label' => 'Change password', 'url' => '/cabinet/password-change'];
                $menuItems[] = ['label' => 'Logout', 'url' => '/site/logout', 'linkOptions' => ['data-method' => 'post'] ];
            }

        ?>

        <?=\yii\bootstrap\Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]); ?>

    </div>
    <!-- #Header Starts -->
</div>