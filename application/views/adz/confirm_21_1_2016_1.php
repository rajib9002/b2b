<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>script/jquery.snipe.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css"/>
<link type="text/css" rel="stylesheet" href="styles/example.css"/>

<script>
    $j(document).ready(function () {
        $j(".tabs-menu a").click(function (event) {
            event.preventDefault();
            $j(this).parent().addClass("current");
            $j(this).parent().siblings().removeClass("current");
            var tab = $(this).attr("href");
            $j(".tab-content").not(tab).css("display", "none");
            $j(tab).fadeIn();
        });
        $j("#showPhone").click(function () {
            $j("#showPhone").hide();
            $j("#hidePhone").show();
        });
        $j("#hidePhone").click(function () {
            $j("#showPhone").show();
            $j("#hidePhone").hide();
        });
        $j("#hide").click(function () {
            $j("#mail_form").hide();
        });
        $j("#show").click(function () {
            $j("#mail_form").show();
        });
    });
</script>
<?php
//$post_id = $session_array['bike__insert_id'];
?>

<div class="clear"></div> 
<div class="step2_upper" style="font-size: 25px; padding: 5px 0 0 0; ">
    <h2>Step 7: Confirm Ads</h2>
</div>

<form id="valid_adz" action="<?= $action ?>" method="post" enctype="multipart/form-data">   

    <div style="text-align:left;">       
        <div style="margin-bottom:5px;">
            <h1 style="padding:5px 0 5px 0;float:left;margin:0;font-family: arial;font-size: 25px;line-height: 40px;text-transform: capitalize;font-weight: bold;color:#000;"><?= substr($session_array['ad_title'], 0, 20) ?></h1>

            <span style='margin-top:10px;margin-left: 10px;' <?php if ($session_array['ad_type'] == '1') { ?> class="round_shape" <? } if ($session_array['ad_type'] == '2') { ?> class="round_shape2" <? } ?>><p><?= common :: get_ad_type_name($session_array['ad_type']) ?></p></span>
            <div class="clear"></div>
            <span style="font-size:11px;color:gray; width: 250px; margin-right: 11px">Posted By : <?= $session_array['user_full_name'] ?></span>
            <span style="font-size:11px;color:gray;  width: 250px;"><img src="img/p_icon.png" width="12" height="12" style="vertical-align:middle;"/>
                <?= date("jS F, Y"); ?>
            </span>

            <span style="font-size:11px;color:gray; width: 250px; margin-left: 10px;"><img src="img/area_icon.png" width="12" height="12"  style="vertical-align:middle;"/>
                <?php
                if ($session_array['country_id'] != '')
                    echo common :: get_area_name($session_array['area_id']) . ', ';
                if ($session_array['area_id'] != '')
                    echo common :: get_country_name($session_array['country_id']);
                ?>
            </span>
            <div class="clear"></div>

        </div>
        <div class="clear"></div>

        <div>
            <div style="float:left;margin:0;padding:0;">

                <script type="text/javascript">
                    $(function () {
                        $('#demo1').snipe({
                            bounds: [10, -10, -10, 10]
                        });
                        $('#snipe').snipe({
                            bounds: [10, -10, -10, 10]
                        });

                    });

                </script>

                <style>
                    .thums_style { margin-left: -40px; margin-top:-2px;margin-bottom: 2px;}
                    .thums_style li{ list-style-type: none; width: 71px;  float: left;margin-left:2px;border:1px solid #eee;}
                    #photoGal{border: 1px solid  #cfcfcf; min-width: 450px; min-height: 283px;}
                    #photoGal img{width: 450px;height: 283px;}
                </style>
                <?php
                //$imgages = sql::rows("bike_image", "bike_id=$session_array[bike_insert_id] order by bike_image_id asc");
                $file0 = $this->session->userdata('file0');
                if ($file0 != '') {
                    $bike_image = $file0;
                } else {
                    $bike_image = 'default.jpg';
                }
                ?>
                <div id="photoGal">
                    <img src="<?php echo base_url() ?>uploads/bike_image/t_<?php echo $bike_image ?>" data-zoom="<?php echo base_url() ?>uploads/bike_image/l_<?php echo $bike_image ?>"  id="snipe" />
                </div>

                <ul style="margin:0 0 5px -38px;" id="thumblist" class="clearfix">
                </ul>

                <div id="thumbs">
                    <ul class="thums_style">
                        <?php
                        //$i = 0;
                        for ($i = 0; $i < 6; $i++) {
                            $file = $this->session->userdata('file' . $i);


                            if ($file != '') {

                                //foreach ($imgages as $img) {
                                ?>
                                <li><a><img class="element isotope-item"    src="<?php echo base_url() ?>uploads/bike_image/t_<?php echo $file ?>" data-zoom="<?php echo base_url() ?>uploads/bike_image/l_<?php echo $file ?>" height="70px" width="71px" /></a></li>
                                <?php
                            }
                            //$i++;
                            //if ($i > 5)
                            //break;
                            //}
                        }
                        ?>
                        <div class="clear"></div>    
                    </ul>
                </div>


                <script type="text/javascript">
                    $j('li a img').on("click", function () {
                        $('#photoGal img').remove();
                        var source = $(this).attr('src');
                        var dataSource = $(this).attr('data-zoom');
                        var tag = $(this).attr('class');
                        console.log(tag);
                        $('#photoGal').html('<img src=" ' + source + '" data-zoom=" ' + dataSource + '" id="snipe" />');
                        $('#snipe').snipe({
                            bounds: [10, -10, -10, 10]
                        });
                    });
                </script>

                <div class="clear"></div>
                <br/>
            </div>

            <div style="width:180px;float:left;margin-left:10px;">
                <div class="details_info" style="width:290px">
                    <br/>
                    <h1> Price : <?
                        if ($session_array['currency'] == "Euro") {
                            echo '&euro;';
                        } else {
                            echo '&pound;';
                        } echo $session_array['price']
                        ?></h1>

                    <span style="float:left"> <img src="img/telephone_icon.png" width="35px" style="margin-left:20px; position: absolute;"> <p  id="hidePhone" style="display: none;color:#fff; font-size: 19px; float: left ; margin-left: 60px; margin-top: 6px;"><?php echo $session_array['adz_poster_phone']; ?></p></span>
                    <p id="showPhone" title="Click to Show Number" style="color:#fff; font-size: 20px; margin-left: 60px;"><?php echo 'Show Phone No'; ?> </p>
                    <div class="clear"></div>
                    <span id="show"> <img src="img/email_icon.png" width="35px" style="margin-left:20px; float: left; margin-right: 10px;"> 

                        <a href="<?= site_url('adz/confirm/') ?>#mail"  style="color:#fff; font-size: 20px; float: left; margin: 0; padding: 0;"><?= $session_array[seller_email] ?></a>
                    </span>
                </div>

                <style>
                    table.rajib_table_content_de tr td {
                        text-align: left;
                        padding-left: 10px;
                    }
                </style>

                <table border="0" cellspacing="0" cellpadding="0" class="rajib_table_content_de" style="border:1px solid #cfcfcf;width:290px; min-height: 180px">

                    <?php if ($session_array['ad_type'] != '') { ?>
                        <tr>
                            <td>
                                <span>
                                    <?= common :: get_ad_type_name($session_array['ad_type']) ?>
                                </span>
                                <span>
                                    <?php
                                    if ($session_array['seller_type'] == 1) {
                                        echo 'Private';
                                    } else {
                                        echo 'Trade';
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                    <?php } ?>





                    <?php if ($session_array['company_id'] != '' || ( $session_array['year'] != '' && $session_array['year'] != '0')) { ?>
                        <tr>

                            <td>
                                <span>
                                    <?= $session_array['year'] ?>
                                </span>

                                <span>
                                    <?= common :: get_bike_make_name($session_array['company_id']) ?>
                                </span>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if ($session_array['model_id'] != '') { ?>
                        <tr>

                            <td> 
                                <span>
                                    <?= common :: get_bike_model_name($session_array['model_id']) ?>
                                </span>
                                <b><span>
                                        <?= ' ' . $session_array['hours'] . ' Hours' ?>
                                    </span></b>
                            </td>
                        </tr>
                    <?php } ?>

                    <tr>

                        <td> 
                            &nbsp;
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div style="background-color: #eee;">

                                <!--<p style="text-align:center;color:blue;padding:10px 0;"><a style="color:blue;" href="<?php //echo site_url('contact')  ?>">Report this advert if you find a problem</a></p>-->

                            </div>
                        </td>
                    </tr>
                    <div class="clear"></div>
                </table>
                <div class="clear"></div>

                <!--            <div style="width:299px;border:1px solid #cfcfcf;padding:0;margin-top: 15px;">
                <?php if ($session_array['full_description'] != '') { ?>
                                                                                                                                                               <b><?php echo $session_array['full_description'] ?></b> &nbsp;
                                                                                                                                                            </p>
                                                                                                                                                            <div class="clear"></div>
                <?php } ?>
                            </div>-->
                <div class="clear"></div>

                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div> 
    <div id="tabs-container">
        <?php
        //$all_comments = sql::rows("bike_comment", "bike_id='$session_array[bike_insert_id]'", 'bike_id');
        //$total_comment = count($all_comments);
        ?>
        <ul class="tabs-menu">
            <li  class="current"><a href="#tab-1">Description</a></li>
            <!--<li ><a href="#tab-2">Post Comments (<? //= $total_comment;  ?>)</a></li>-->
        </ul>
        <div class="tab">
            <div id="tab-1" class="tab-content">
                <p style="font-family:Raleway; font-size: 13px; line-height: 20px"><?php echo $session_array['full_description']; ?></p>
            </div>

            <!--        <div id="tab-2" class="tab-content">
            
                        <p style="font-family:Raleway; font-size: 13px; line-height: 20px"><?php echo 'Comment Goes Here'; ?></p>
                    </div>   -->
        </div>
    </div>

    <!--<div style="margin: 50px 0px">
        <span style="text-align:left; margin-left: 20px; margin-top: 30px">
            <a class="next_previous_button" href="" onclick='window.history.back();'>
                < Previous Step
            </a>
        </span>
        <span style="float:right; margin-right: 20px">        
            <input  class="next_previous_button" type="submit" name="confirm" value="Confirm"/>
        </span>
    </div> -->


    <div class="clear"></div>
    <span class="prev_step">
        <input  class="next_previous_button" type="submit" onclick="history.back(-1)" value="< Previous Step"/>

    </span>
    <span  class="next_step">
        <input  class="next_previous_button" type="submit" name="confirm" value="Confirm"/>
    </span>



</form>
<!--<a name="mail">
    <form id="mail_form" style="display:none;background-color:#376388; width: 450px;" action="<?= site_url("home/reply/" . $session_array['bike_id']) ?>" method="post">

        <table style="padding:20px 10px 10px 40px;">
            <tr>
                <th colspan ="2" style="font-family:Raleway; font-size: 18px; color: #fff; margin-left: 50px; text-align: left"> <img src="img/email_icon.png" width="35px" style="margin-left:20px; float: left; margin-right: 10px;"/> Reply Ad Owner By Email</th>
            </tr>
            <tr>
                <th colspan ="2"> &nbsp;</th>
            </tr>

            <tr>
                <th style="font-family:Raleway; font-size: 12px; color: #fff; margin-left: 20px;"> Name<span>*</span></th>
                <td><input style="border:0;background-color:transparent;padding:0 30px;font-family:arial;font-size:14px;color:gray; margin:5px 0;height: 30px" class="user_bg" type="text" name='contact_name' value='<?= $_REQUEST['contact_name'] ?>'  style="width:300px" required/><?= form_error('contact_name', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th style="font-family:Raleway; font-size: 12px; color: #fff; margin-left: 20px;">Email<span>*</span></th>
                <td><input style="border:0;background-color:transparent;padding:0 30px;font-family:arial;font-size:14px;color:gray;margin:5px 0;height: 30px" class="email_bg" type='email' name='contact_email' value='<?= $_REQUEST['contact_email'] ?>'  style="width:300px" required /><?= form_error('contact_email', '<span>', '</span>') ?></td>
            <input type="hidden" name="to_email" value="<?php echo $session_array['adz_user_email'] ?>"/>
            </tr>
            <tr>
                <th style="font-family:Raleway; font-size: 12px;color: #fff; margin-left: 20px;">Subject <span>*</span></th>
                <td><input style="border:0;background-color:transparent;padding:0 30px;font-family:arial;font-size:14px;color:gray;margin:5px 0;height: 30px" class="subject_bg" type='text' name='contact_subject' value='<?= $_REQUEST['contact_subject'] ?>'  style="width:300px" required /><?= form_error('contact_subject', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th style="font-family:Raleway; font-size: 12px; color: #fff; margin-left: 20px;">Message <span>*</span></th>
                <td><textarea style="border:0;background-color:transparent;padding:10px 30px;font-family:arial;font-size:14px;color:gray;margin:5px 0;" class="message_bg" name='contact_message'  cols="40" rows="6" required></textarea><?= form_error('contact_message', '<span>', '</span>') ?></td>
            </tr>

            <tr><th>&nbsp;</th><td><input  type='submit' name='save' value='Send' class='yellowButton login_submit_button'  style="float:left; width: 90px; font-size: 15px;"/>
                    <input  id="hide" type='button' name='cancel' value='Close' class='yellowButton login_submit_button'  style="float:right; width: 90px;font-size: 15px;"/></td>
            </tr>
        </table>                    
    </form>
</a>-->


<div class="clear"></div>




