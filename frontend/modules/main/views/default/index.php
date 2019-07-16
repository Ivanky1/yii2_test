<div class="">


    <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
            <?php foreach($results as $key=>$res) : ?>
                <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                    <div class="sl-slide-inner">
                        <div class="bg-img bg-img-1" style="background-image: url(<?= \frontend\components\Common::getAdvertImage($res['id_advert'], $res['general_image'], true) ?>)"></div>
                        <h2><a href="<?=\yii\helpers\Url::to(['/view-advert/'.$res['id_advert']]) ?>">ID room <?=$res['id_advert']?></a></h2>
                        <blockquote>
                            <p class="location"><span class="glyphicon glyphicon-map-marker"></span> <?=$res['address']?></p>
                            <p><?=$res['description']?></p>
                            <cite>$ <?= number_format($res['price'],0,'',' ')?></cite>
                        </blockquote>
                    </div>
                </div>
                <?php if ($key >= 4) break; ?>
            <?php endforeach ?>


        </div><!-- /sl-slider -->



        <nav id="nav-dots" class="nav-dots">
            <?php for($i=0; $i<5; $i++) : ?>
                <?php if($i == 0) :?>
                    <span class="nav-dot-current"></span>
                <?php else: ?>
                    <span></span>
                <?php endif ?>
            <?php endfor ?>
        </nav>

    </div><!-- /slider-wrapper -->
</div>



<div class="banner-search">
    <div class="container">
        <!-- banner -->
        <h3>Buy, Sale & Rent</h3>
        <div class="searchbar">

            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <?= \yii\helpers\Html::beginForm(\yii\helpers\Url::to('/main/main/find/'), 'get') ?>
                    <?=\yii\helpers\Html::textInput('property', '', ['class' => 'form-control']) ?>
                    <div class="row">
                        <div class="col-lg-3 col-sm-4">
                            <?=\yii\helpers\Html::dropDownList('price', '', [
                                '150000-200000' => '$150,000 - $200,000',
                                '200000-250000' => '$200,000 - $250,000',
                                '250000-300000' => '$250,000 - $300,000',
                                '300000' => '$300,000 - above',
                            ], ['class' => 'form-control', 'prompt' => 'Price']) ?>

                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <?=\yii\helpers\Html::dropDownList('type', '', [
                                'Apartment' => 'Apartment',
                                'Building' => 'Building',
                                'Office Space' => 'Office Space',
                            ], ['class' => 'form-control', 'prompt' => 'Property']) ?>

                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <?=\yii\helpers\Html::submitButton('Find Now', ['class' => 'btn btn-success']) ?>
                        </div>

                    </div>
                    <?= \yii\helpers\Html::endForm() ?>

                </div>
                <?php if (Yii::$app->user->isGuest) : ?>
                    <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
                        <p>Join now and get updated with all the properties deals.</p>
                        <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Login</button>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<!-- banner -->
<div class="container">
    <div class="properties-listing spacer"> <a href="buysalerent.html"  class="pull-right viewall">View All Listing</a>
        <h2>Featured Properties</h2>
        <div id="owl-example" class="owl-carousel">
            <?php foreach($results as $res) : ?>
                <div class="properties">
                    <div class="image-holder"><img src="<?= \frontend\components\Common::getAdvertImage($res['id_advert'], $res['general_image'], true) ?>"  class="img-responsive" alt="properties"/>
                        <div class="status sold">Sold</div>
                    </div>
                    <h4><a href="<?=\yii\helpers\Url::to(['/view-advert/'.$res['id_advert']]) ?>" >Room <?=$res['id_advert']?></a></h4>
                    <p class="price">Price: $<?= number_format($res['price'],0,'',' ') ?></p>
                    <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
                    <a class="btn btn-primary" href="<?=\yii\helpers\Url::to(['/view-advert/'.$res['id_advert']]) ?>" >View Details</a>
                </div>
            <?php endforeach ?>



        </div>
    </div>
    <div class="spacer">
        <div class="row">
            <div class="col-lg-6 col-sm-9 recent-view">
                <h3>About Us</h3>
                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br><a href="about.html" >Learn More</a></p>

            </div>
            <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
                <h3>Recommended Properties</h3>
                <div id="myCarousel" class="carousel slide">
                    <ol class="carousel-indicators">
                        <?php for($i=0; $i<4; $i++) : ?>
                                <li data-target="#myCarousel" data-slide-to="<?=$i?>" class="<?= ($i == 0) ?'active' : '' ?>"></li>
                        <?php endfor ?>
                    </ol>
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <?php foreach(range(0, 4) as $key) : ?>
                            <div class="item<?= ($key == 0) ?' active' : '' ?>">
                                <div class="row">
                                    <div class="col-lg-4"><img src="<?= \frontend\components\Common::getAdvertImage($results[$key]['id_advert'], $results[$key]['general_image'], true) ?>"  class="img-responsive" alt="properties"/></div>
                                    <div class="col-lg-8">
                                        <h5><a href="<?=\yii\helpers\Url::to(['/view-advert/'.$res['id_advert']]) ?>" >Integer sed porta quam</a></h5>
                                        <p class="price">$<?=  number_format($results[$key]['price'],0,'',' ')?></p>
                                        <a href="<?=\yii\helpers\Url::to(['/view-advert/'.$res['id_advert']]) ?>"  class="more">More Detail</a> </div>
                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>