<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Advert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <div id="map_canvas" style="width:640px; height:380px"></div><br/>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'locaton')->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'hot')->radioList(['No', 'Yes']) ?>

    <?= $form->field($model, 'sold')->radioList(['No', 'Yes']) ?>

    <?= $form->field($model, 'type')->dropDownList(['Apartment', 'Open Space', 'Building']) ?>

    <?= $form->field($model, 'recommend')->radioList(['No', 'Yes']) ?>

    <?php
    $this->registerJs("
       var geocoder;
        var map;
        var marker;
         var markers = [];

        function initialize(){

              var latlng = new google.maps.LatLng(59.9342802,30.335098600000038);

            var options = {
                zoom: 10,
                center: latlng,
            };
            map = new google.maps.Map(document.getElementById('map_canvas'), options);
            geocoder = new google.maps.Geocoder();

        }

          function DeleteMarkers() {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
                }
                markers = [];
            }

        function findLocation(val){

            geocoder.geocode( {'address': val}, function(results, status) {

            var location = results[0].geometry.location
            map.setCenter(location)
            map.setZoom(15)
            DeleteMarkers()

            $('#advert-locaton').val(location)

             marker = new google.maps.Marker({
                map: map,
                draggable: true,
                position: location
            });

          google.maps.event.addListener(marker, 'dragend', function()
        {
                    $('#advert-locaton').val(marker.getPosition())
        });

        markers.push(marker);

        })
        }

        $(document).ready(function() {

            initialize();

            if( $('#advert-address').val()){
             _location = $('#advert-address').val()
               findLocation(_location)
               }

            $('#advert-address').bind('blur keyup',function(){
               _location = $('#advert-address').val()
               findLocation(_location)
            })


        });"

    );
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
