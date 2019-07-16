
    <div class="properties-listing spacer">

        <div class="row">
            <div class="col-lg-3 col-sm-4 hidden-xs">

                <div class="hot-properties hidden-xs">
                    <h4>Hot Properties</h4>
                    <?php foreach($hots as $hot) : ?>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5"><img src="<?=\frontend\components\Common::getAdvertImage($hot['id_advert'], $hot['general_image']) ?>"  class="img-responsive img-circle" alt="properties"/></div>
                            <div class="col-lg-8 col-sm-7">
                                <h5><a href="<?=\yii\helpers\Url::to(['/view-advert/'.$hot['id_advert']]) ?>" >Integer sed porta quam</a></h5>
                                <p class="price">$<?= number_format($hot['price'], 0, '', ' ') ?></p> </div>
                        </div>
                    <?php endforeach ?>
                </div>



                <div class="advertisement">
                    <h4>Advertisements</h4>
                    <img src="images/advertisements.jpg"  class="img-responsive" alt="advertisement">

                </div>

            </div>

            <div class="col-lg-9 col-sm-8 ">

                <h2>2 room and 1 kitchen apartment</h2>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="property-images">
                            <!-- Slider Starts -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators hidden-xs">
                                    <?php for($i=0; $i<count($images_add); $i++) : ?>
                                        <li data-target="#myCarousel" data-slide-to="0" class="<?=($i== 0) ?' active' :''?>"></li>
                                    <?php endfor ?>
                                </ol>
                                <div class="carousel-inner">
                                    <!-- Item -->
                                    <?php foreach($images_add as $key => $img) : ?>
                                        <div class="item<?=($key== 0) ?' active' :''?>">
                                            <img src="<?=$img ?>"  class="properties" alt="properties" />
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                            <!-- #Slider Ends -->

                        </div>




                        <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
                            <p>Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.</p>
                            <p>Completely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service</p>

                        </div>


                    </div>
                    <div class="col-lg-4">
                        <div class="col-lg-12  col-sm-6">
                            <div class="property-info">
                                <p class="price">$ <?= number_format($model['price'], 0, '', ',') ?></p>
                                <p class="area"><span class="glyphicon glyphicon-map-marker"></span> 344 Villa, Syndey, Australia</p>

                                <div class="profile">
                                    <span class="glyphicon glyphicon-user"></span> Agent Details
                                    <p>John Parker<br>009 229 2929</p>
                                </div>
                            </div>

                            <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
                            <div class="listing-detail">
                                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>

                        </div>
                    </div>

                    <div class="col-lg-12 col-sm-6 ">
                        <div class="enquiry">
                            <h6><span class="glyphicon glyphicon-envelope"></span> Post Enquiry</h6>
                            <?php
                            $form = \yii\bootstrap\ActiveForm::begin();
                            ?>
                            <?=$form->field($model_feedback,'email')->textInput(['value' => $current_user['email'], 'placeholder' => 'you@yourdomain.com'])->label(false) ?>
                            <?=$form->field($model_feedback,'name')->textInput(['value' => $current_user['username'], 'placeholder' => 'Username'])->label(false) ?>
                            <?=$form->field($model_feedback,'text')->textarea(['rows' => 6, 'placeholder' => 'Whats on your mind?'])->label(false) ?>
                            <?= \yii\helpers\Html::submitButton('Send Message', ['class' => 'btn btn-primary']) ?>

                            <?php
                            \yii\bootstrap\ActiveForm::end();
                            ?>
                            <?php if($map) : ?>
                                <?=$map->display(); ?>
                            <?php endif ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




