<!-- some pretty fonts for this demo page - not required for the slider -->

<!--<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300' rel='stylesheet' type='text/css'> 

<script type="text/javascript">var switchTo5x=true;</script>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>

<script type="text/javascript">stLight.options({publisher: "b0a71506-970b-4e03-8021-bae0c1d2adbd", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>-->

<!--<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>-->





<link rel="stylesheet" href="styles/swiper.min.css">

<style>

    .swiper-container {

        position:relative;

        height: 240px;

        width: 100%;

        margin-left: auto;

        margin-right: auto;

    }

    .swiper-button-next{

        background: url("img/next.png") no-repeat ;

        position:absolute;right:0;top:50%;margin-top:-10px;

        right:-8px;

    }

    .swiper-button-prev{

        background: url("img/prev.png") no-repeat ;

        left: 0px;

        position:absolute;top:50%;margin-top:-10px;

    }

    .swiper-slide {

        text-align: center;

        font-size: 18px;

        background: #fff;

        display: -webkit-box;

        display: -ms-flexbox;

        display: -webkit-flex;

        display: flex;

        -webkit-box-pack: center;

        -ms-flex-pack: center;

        -webkit-justify-content: center;

        justify-content: center;

        -webkit-box-align: center;

        -ms-flex-align: center;

        -webkit-align-items: center;

        align-items: center;

    }

    .tab-content{width:240px;}

    .content_m span{color:gray;}

</style>

<div class="content_m">



    <div class="clear"></div>

    <?php

    $file0 = $this->session->userdata('file0');

    if ($file0 != '') {

        $bike_image = $file0;

    } else {

        $bike_image = 'default.jpg';

    }

    ?>    

    <div class="swiper-container">

        <div class="swiper-wrapper">           

            <?php

            for ($i = 0; $i < 6; $i++) {

                $file = $this->session->userdata('file' . $i);

                if ($file != '') {

                    ?>

                    <div class="swiper-slide"><img src="<?php echo UPLOAD_PATH ?>/bike_image/<?php echo $file ?>" width="280px" height="220px" /></div>

                    <?php

                }

            }

            ?>

        </div>

        <style>

            .swiper-pagination span{padding:0;}

        </style>

        <div class="swiper-pagination"></div>

        <div class="swiper-button-next"></div>

        <div class="swiper-button-prev"></div>

    </div>

    <script src="script/swiper.min.js"></script>

    <script>

        var swiper = new Swiper('.swiper-container', {

            pagination: '.swiper-pagination',

            nextButton: '.swiper-button-next',

            prevButton: '.swiper-button-prev',

            slidesPerView: 1,

            paginationClickable: true,

            spaceBetween: 30,

            loop: true

        });

    </script>

    <div style="width:100%;  margin: 10px 0">

        <div> 

            <h1 style="text-transform: uppercase; font-size: 16px; display: inline; margin: 0; padding: 0">

                </span> <?= substr($session_array['ad_title'], 0, 20) ?>

            </h1>

            <?php if ($session_array['ad_type'] == 1) { ?>

                <img src="img/for_sale.png" width="80" style="vertical-align:middle;margin-top: 10px;"/>

            <?php }

            ?>

            <?php if ($session_array['ad_type'] == 2) { ?>

                <img src="img/for_wanted.png" width="80"  style="vertical-align:middle;margin-top: 10px;"/>

            <?php }

            ?>

            <h1 style="text-transform: uppercase; font-size: 16px; display: inline; margin-left: 5px;float:right;">

                <?php

                if ($session_array['currency'] == "Euro") {

                    echo '&euro;' . number_format($session_array['price'], 0);

                } else {

                    echo '&pound;' . number_format($session_array['price'], 0);

                }

                ?>  

            </h1> 

        </div>

        <div class="clear"></div>

        <div style="background-color: #fff;"> 

            <span style="font-size:12px;color:gray; ">

                <img src="img/location.png" width="15" height="15" />

                <?php

                if ($session_array['area_id'] != '')

                    echo common :: get_area_name($session_array['area_id']);

                ?>

            </span>

            <span style="font-size:12px;color:gray; margin-left: 10px;"><img src="img/time.png" width="15" height="15" />

                <?= date("jS F, Y"); ?>

            </span>

        </div>   

        <div class="clear"></div>

    </div>

    <div style="width:100%;  padding: 10px 10px 10px 10px;margin-left:-10px; background: #fbfbfb; color: #a5a5a5;font-size:14px; display: block; border-bottom: 1px solid #c6c6c6; ">

        Make   <span style="float:right; margin-right: 10px"> <?php

            if ($session_array['company_id'] != '')

                echo common :: get_bike_make_name($session_array['company_id'])

                ?> </span>

    </div>

    <div style="width:100%;  padding:10px 10px 10px 10px;margin-left:-10px; background: #fbfbfb; color: #a5a5a5;font-size:14px; display: block;border-bottom: 1px solid #c6c6c6; ">

        Model  <span style="float:right; margin-right: 10px">

            <?php

            if ($session_array['model_id'] == 'other' || $session_array['model_id'] == 'Other') {

                echo $session_array['model_name'];

            } else {

                echo common :: get_bike_model_name($session_array['model_id']);

            }

            ?> 

        </span>

    </div>

    <?php if ($session_array['year'] != '') { ?>

        <div style="width:100%;  padding:10px 10px 10px 10px;margin-left:-10px; background: #fbfbfb; color: #a5a5a5;font-size:14px; display: block;border-bottom: 1px solid #c6c6c6;">

            Year   <span style="float:right; margin-right: 10px"><?php echo $session_array['year'] ?> </span>

        </div>

    <?php } ?>

    <?php if ($session_array['mileage'] != '') { ?>

        <div style="width:100%;  padding:10px 10px 10px 10px;margin-left:-10px; background: #fbfbfb; color: #a5a5a5;font-size:14px; display: block;border-bottom: 1px solid #c6c6c6;">

            Mileage   <span style="float:right; margin-right: 10px"><?php echo $session_array['mileage'] . ' ' . $session_array['mill_sign']; ?></span>

        </div>

    <?php } ?>

    <?php if ($session_array['hours'] != '') { ?>

        <div style="width:100%;  padding:10px 10px 10px 10px;margin-left:-10px; background: #fbfbfb; color: #a5a5a5;font-size:14px; display: block;border-bottom: 1px solid #c6c6c6;">

            Hours   <span style="float:right; margin-right: 10px"><?php echo $session_array['hours'] ?></span>

        </div>

    <?php } ?>

    <div style="width:100%; margin: 10px 0; height: 50px">

        <div style="font-size:12px; color:#000;  display: block;">

            <span style="color:gray;">Contact  <?= $session_array['seller_name'] ?> </span>

        </div>

        <br/>

        <a href="tel:<?= $session_array[seller_phone] ?>" > <img src="img/call.png" height="25" width="65px"/></a>

        <a style="margin-left:20px" href="sms:<?= $session_array[seller_phone] ?>" >  <img src="img/sms.png" width="65px" height="25"/></a>

        <a style="margin-left:20px" href="mailto:<?= $session_array[seller_email] ?>" >  <img width="60px" src="img/email.png" height="28"/></a>

        <br/><br/><br/>

    </div>

    <div id="tabs-container"  style="width:100%; margin: 10px 0">

        <ul class="tabs-menu">

            <li  class="current"><a href="#tab-1">Description</a></li>

        </ul>

        <div class="tab">

            <div id="tab-1" class="tab-content">

                <p style="font-size: 12px; line-height: 14px; margin: 0 10px;width:200px;padding:10px 0;"><?php echo $session_array['full_description']; ?></p>

            </div>

        </div>

    </div>

    <form id="valid_adz" action="<?= $action ?>" method="post" enctype="multipart/form-data">   

        <div class="button_p_n">

            <input  class="previous_button" type="submit" onclick="history.back(-1)" value="Previous"/>

            <input  class="next_button" type="submit" name="confirm" value="Confirm"/>

            <div class="clear"></div>

        </div>

    </form>

    <div class="clear"></div>

</div>