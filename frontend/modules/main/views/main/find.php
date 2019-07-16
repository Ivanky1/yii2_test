<?php
use yii\helpers\Html;
?>

<div class="properties-listing spacer">

    <div class="row">
        <div class="col-lg-3 col-sm-4 ">
            <?=Html::beginForm(\yii\helpers\Url::to('/main/main/find/'),'get') ?>
            <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
                <?=Html::textInput('property', $request->get('property'), ['class' => 'form-control', 'placeholder' => 'Search of Properties']) ?>
                <div class="row">
                    <div class="col-lg-12">
                        <?=Html::dropDownList('price', $request->get('price'),[
                            '150000-200000' => '$150,000 - $200,000',
                            '200000-250000' => '$200,000 - $250,000',
                            '250000-300000' => '$250,000 - $300,000',
                            '300000' =>'$300,000 - above',
                        ],['class' => 'form-control', 'prompt' => 'Price']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <?=Html::dropDownList('type', $request->get('type'),[
                            'Apartment' => 'Apartment',
                            'Building' => 'Building',
                            'Office Space' => 'Office Space',
                        ],['class' => 'form-control', 'prompt' => 'Property']) ?>
                    </div>
                </div>
                <button class="btn btn-primary">Find Now</button>
                <?=Html::endForm() ?>

            </div>



            <div class="hot-properties hidden-xs">

                <?php //echo \frontend\widgets\HotWidget::widget() ?>

            </div>


        </div>

        <div class="col-lg-9 col-sm-8">
            <?php
            foreach($model as $key => $row):
                $url = \frontend\components\Common::getUrlAdvert($row);
                ?>
                <?php if ($key % 3 == 0) echo '<div class="row">'; ?>
                <!-- properties -->
                <div class="col-lg-4 col-sm-6">
                    <div class="properties">
                        <div class="image-holder">
                            <div class="status <?=($row['sold']) ? 'sold' : 'new' ?>"><?=\frontend\components\Common::getType($row) ?></div>
                        </div>
                        <h4><a href="<?=$url ?>" ><?=\frontend\components\Common::getTitleAdvert($row) ?></a></h4>
                        <p class="price">Price: $<?=$row['price'] ?></p>
                        <div class="listing-detail">
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">1</span>
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">1</span>
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">1</span>
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span>
                        </div>
                        <a class="btn btn-primary" href="<?=$url ?>" >View Details</a>
                    </div>
                </div>

                <?php if ($key % 3 == 2 || !isset($model[++$key])) echo '</div>'; ?>

            <?php
            endforeach;
            ?>
            <!-- properties -->


            <div class="clearfix"></div>
            <!-- properties -->
            <div class="center">
                <?php echo \yii\widgets\LinkPager::widget([
                    'pagination' => $pages
                ]) ?>
            </div>
        </div>
    </div>
</div>