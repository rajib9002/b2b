<script type="text/javascript" src="<?= base_url(); ?>script/jquery.snipe.js"></script>
<!--<link rel="stylesheet" href="/resources/demos/style.css"/>-->
<link type="text/css" rel="stylesheet" href="styles/example.css"/>

<script type="text/javascript">var switchTo5x = true;</script>
<!--<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>-->
<!--<script type="text/javascript" src="<?= base_url(); ?>script/buttons.js"></script>-->
<!--<script type="text/javascript">stLight.options({publisher: "b0a71506-970b-4e03-8021-bae0c1d2adbd", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>-->

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


<style>
    .stButton {
        width: 10px;
    }
</style>

<?php
$post_id = $details_row['bike_id'];
?>

<div class="clear"></div>
<div style="text-align:left;">
    <?php
    //print_r($details_row);
    if ($msg != '') {
        echo '<div class="msgContent">' . $msg . '</div>';
    }
    ?>
    <div style="margin-bottom:5px;">
        <h1 style="padding:5px 0 5px 0;float:left;margin:0;font-family: arial;font-size: 25px;line-height: 40px;text-transform: capitalize;font-weight: bold;color:#000;"><?= substr($details_row['ad_title'], 0, 20) ?></h1>

        <span style='margin-top:10px;margin-left: 10px;' <?php if ($details_row['ad_type'] == '1') { ?> class="round_shape" <? } if ($details_row['ad_type'] == '2') { ?> class="round_shape2" <? } ?>><p><?= common :: get_ad_type_name($details_row['ad_type']) ?></p></span>

        <?php
//        $a = $this->session->userdata("ajax_start");
//        if ($a == 0) {
//            $a = 0;
//        } else {
//            $a = $a - 1;
//        }
//        $back_page = $this->session->userdata("back_page");
//
//        if ($back_page == 'index') {
//            ?>
            <!--<a class="back_page2" href="<?php //echo site_url('adz/index/all/all/desc/bike.bike_id/' . $a); ?>"> < Back </a>-->
            <?
//        }
//        if ($back_page == 'all_advertise') {
//            ?>

            <!--<a class="back_page2" href="<?php //echo site_url('adz/all_advertise/all/all/desc/bike.bike_id/' . $a); ?>"> < Back </a>-->

            <?
//        }
//        if ($back_page == 'my_ads') {
//            ?>
            <!--<a class="back_page2" href="<?php //echo site_url('adz/my_ads/'); ?>"> < Back </a>-->             
            <?
//        }
//
//        if ($back_page == 'save_ads') {
//            ?>
            <!--<a class="back_page2" href="<?php //echo site_url('adz/save_list/'); ?>"> < Back </a>-->             
            <?
//        }
//        if ($back_page == '') {
//            ?>
            <!--<a class="back_page2" href="<?php //echo site_url('adz/index/all/all/desc/bike.bike_id/' . $a); ?>"> < Back </a>-->
        <? //}
        ?>
            
            <a class="back_page2" href="javascript:void(0)" onclick="history.back(-1)"> < Back </a>

        <span class="save_button">
            <a href="<?php echo site_url('adz/save_adz/' . $details_row['table_name'].'/'.$details_row['bike_id']) ?>">Save Ads</a>
        </span>

        <div class="clear"></div>
        <span style="font-size:11px;color:gray; width: 250px; margin-right: 11px">Posted By : <?= $details_row['adz_user_name'] ?></span>
        <span style="font-size:11px;color:gray;  width: 250px;"><img src="img/p_icon.png" width="12" height="12" style="vertical-align:middle;"/>
            <?= date("jS F, Y", strtotime($details_row['time'])); ?>
        </span>

        <span style="font-size:11px;color:gray; width: 250px; margin-left: 10px;"><img src="img/area_icon.png" width="12" height="12" style="vertical-align:middle;"/>
            <?php
//print_r($details_row);
            if ($details_row['country_id'] != '')
                echo common :: get_area_name($details_row['area_id']) . ', ';
            if ($details_row['area_id'] != '')
                echo common :: get_country_name($details_row['country_id']);
            ?>
        </span>
        <span style="float:right"> <a href="<?php echo site_url('login') ?>"><img src="img/shared_on_fb.jpg" height="12"></a></span>
        <div class="clear"></div>
        <span class="shared_icon" style="float:right;margin-right: 10px; font-size: 13px;"> 
            <a href=""><img src="img/g.png" style="height:12px; width: 12px;"></a>
            <a href=""><img src="img/e.png" style="height:12px; width: 12px;"></a>
            <a href=""><img src="img/y.png" style="height:12px; width: 12px;"></a>
            <a href=""><img src="img/t.png" style="height:12px; width: 12px;"></a>
            <a href=""><img src="img/f.png" style="height:12px; width: 12px;"></a> 
        </span>
        <div class="clear"></div>  
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
            $tab_name = $t_name . '_image';

            $imgages = sql::rows("$tab_name", "bike_id=$details_row[bike_id] order by bike_image_id asc");
            if ($imgages[0]['bike_image'] != '') {
                $bike_image = $imgages[0]['bike_image'];
            } else {
                $bike_image = 'default.jpg';
            }
            ?>
            <div id="photoGal">
                <img src="<?php echo base_url() ?>uploads/bike_image/t_<?php echo $bike_image ?>" data-zoom="<?php echo base_url() ?>uploads/bike_image/<?php echo $bike_image ?>"  id="snipe" />
            </div>

            <ul style="margin:0 0 5px -38px;" id="thumblist" class="clearfix">
            </ul>

            <div id="thumbs">
                <ul class="thums_style">
                    <?php
                    $i = 1;
                    foreach ($imgages as $img) {
                        ?>
                        <li><a><img class="element isotope-item"    src="<?php echo base_url() ?>uploads/bike_image/t_<?php echo $img['bike_image'] ?>" data-zoom="<?php echo base_url() ?>uploads/bike_image/large/<?php echo $img['bike_image'] ?>" height="70px" width="71px" /></a></li>
    <!--                        <li><img id="snipe" style="max-height:10%; max-width:10%"  src="<?php //echo base_url()   ?>uploads/bike_image/thumbs/<?php //echo $img['bike_image']   ?>" data-zoom="<?php //echo base_url()   ?>uploads/bike_image/large/<?php //echo $img['bike_image']   ?>" /></li>-->
                        <?php
                        $i++;
                        //if ($i > 5)
                           // break;
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
                    if ($details_row['currency'] == "Euro") {
                        echo '&euro;';
                    } else {
                        echo '&pound;';
                    } echo $details_row['price']
                    ?></h1>

                <span style="float:left"> <img src="img/telephone_icon.png" width="35px" style="margin-left:20px; position: absolute;"> <p  id="hidePhone" style="display: none;color:#fff; font-size: 19px; float: left ; margin-left: 60px; margin-top: 6px;"><?php echo $details_row['adz_user_phone']; ?></p></span>
                <p id="showPhone" title="Click to Show Number" style="color:#fff; font-size: 20px; margin-left: 60px;"><?php echo 'Show Phone No'; ?> </p>
                <div class="clear"></div>
                <span id="show"> <img src="img/email_icon.png" width="35px" style="margin-left:20px; float: left; margin-right: 10px;"> <a href="<?= site_url('adz/details/' . $t_name . '/' . $details_row['bike_id']) ?>#mail" title="Click to Reply"  style="color:#fff; font-size: 20px; float: left; margin: 0; padding: 0;">Reply By Email</a></span>
            </div>

            <style>
                table.rajib_table_content_de tr td {
                    text-align: left;
                    padding-left: 10px;
                }
            </style>

            <table border="0" cellspacing="0" cellpadding="0" class="rajib_table_content_de" style="border:1px solid #cfcfcf;width:290px; min-height: 180px">

                <?php if ($details_row['ad_type'] != '') { ?>
                    <tr>
                        <td>
                            <span>
                                <?= common :: get_ad_type_name($details_row['ad_type']) ?>
                            </span>
                            <span>
                                <?php
                                if ($details_row['seller_type'] == 1) {
                                    echo 'Private';
                                } else {
                                    echo 'Trade';
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                <?php } ?>





                <?php if ($details_row['make_id'] != '' || ( $details_row['year'] != '' && $details_row['year'] != '0')) { ?>
                    <tr>

                        <td>
                            <span>
                                <?= $details_row['year'] ?>
                            </span>

                            <span>
                                <?= common :: get_bike_make_name($details_row['make_id']) ?>
                            </span>
                        </td>
                    </tr>
                <?php } ?>


                <?php if ($details_row['model_id'] != '') { ?>
                    <tr>

                        <td> 
                            <span>
                                <?= common :: get_bike_model_name($details_row['model_id']) ?>
                            </span>
                            <b><span>
                                    <?= ' ' . $details_row['hours'] . ' Hours' ?>
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

                            <p style="text-align:center;color:blue;padding:10px 0;"><a style="color:blue;" href="<?php echo site_url('contact') ?>">Report this advert if you find a problem</a></p>

                        </div>
                    </td>
                </tr>
                <div class="clear"></div>
            </table>
            <div class="clear"></div>

            <!--            <div style="width:299px;border:1px solid #cfcfcf;padding:0;margin-top: 15px;">
            <?php if ($details_row['full_description'] != '') { ?>
                                                                                                                                                                   <b><?php echo $details_row['full_description'] ?></b> &nbsp;
                                                                                                                                                                </p>
                                                                                                                                                                <div class="clear"></div>
            <?php } ?>
                        </div>-->
            <div class="clear"></div>
            </form>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<a name="mail">
    <form id="mail_form" style="display:none;background-color:#376388; width: 450px;" action="<?= site_url("home/reply/".$details_row['table_name'].'/'. $details_row['bike_id']) ?>" method="post">

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
            <input type="hidden" name="to_email" value="<?php echo $details_row['adz_user_email'] ?>"/>
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


</a>

<div id="tabs-container">

    <?php
    $t_comment = $t_name . '_comment';

    $all_comments = sql::rows("$t_comment", "bike_id=$details_row[bike_id]", "bike_id");
    $total_comment = count($all_comments);
    ?>
    <ul class="tabs-menu">
        <li  class="current"><a href="#tab-1">Description</a></li>
        <li ><a href="#tab-2">Post Comments (<?= $total_comment; ?>)</a></li>
    </ul>
    <div class="tab">
        <div id="tab-1" class="tab-content">
            <p style="font-family:Raleway; font-size: 13px; line-height: 20px"><?php echo $details_row['full_description']; ?></p>
        </div>

        <div id="tab-2" class="tab-content">

            <?php
            if (common::is_logged_in()) {

                foreach ($bike_comment as $comment) {
                    ?>
                    <div class="comments_all" style="margin-left:20px; width: 650px;margin-right:15px;float:left;font-family:arial; font-size: 12px">
                        <?php
                        $user_data = sql::row("users", "user_id=$comment[user_id]");
                        $user_image = $user_data['user_image'];
                        ?>
                        <!--                    <div class="image_left float_left">
                        <?php if ($user_image == '') { ?>
                                 <img src="images/default_user_image.png" width="30" alt="user image"/>
                        <?php } else { ?>
                                 <img  src="<?php //echo base_url() . 'uploads/profile_pic/small_' . $user_image ?>" height="50" width="50" alt="user image"/>
                            <?php echo $user_data['user_full_name']; ?>
                        <?php } ?>
                        
                                            </div>-->
                        <div class="image_right" style="border-bottom: 1px solid #cfcfcf;">
                            <h4 style="margin-bottom: 0">
                                <span style="float:left"><?php echo $user_data['user_first_name'] . ' ' . $user_data['user_last_name'] ?> </span>
                                <span style="float:right"> <?php echo 'Posted ' . date("d M Y", strtotime($comment['comment_date'])) ?>  </span>
                            </h4>
                            <br/>
                            <p style="text-align: justify; margin-top: 10px; margin-bottom: 5px;"><?php echo $comment['comment'] ?></p>
                            <?php
                            $user_id = $this->session->userdata('user_id');
                            if ($user_id == $details_row['user_id'] || $user_id == $comment['user_id']) {
                                ?>
                                <a style=" margin-top: -15px;text-align:right;" href="<?= site_url('adz/delete_comment/' . $details_row['bike_id'] . '/' . $comment['id'] . '/' . $t_name); ?>" title="Delete Comment" onClick="javascript:return confirm('Are you sure you want to delete this comment?');"> Delete</a>
                                <?php
                            }
                            ?>
                        </div>

                        <div class="clear"></div>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="comments_all" style="margin-left:20px; width: 650px;margin-right:15px;float:left;font-family:arial; font-size: 12px">

                    <div class="image_right">
                        You Need to <a style="margin-top: -5px" href="<?= site_url('login'); ?>"> Login</a> to Post Comment.

                    </div>

                    <div class="clear"></div>
                </div>

                <?php
            }
            ?>
            </form>
            <div class="clear"></div>
            <?php if (common::is_logged_in()) { ?>

                <form  style="margin:20px;" action="<?= $action ?>" method="post" onSubmit="if (document.getElementById('comment').value == '') {
                            alert('Please enter your comment');
                            document.getElementById('comment').focus();
                            return false;
                        }">

                    <table>

                        <tr>
                            <td align="left" ><textarea  name='comment' id="comment" cols="89" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td align="left" class=""><input style="padding: 5px 0;border:0;background-color:transparent;font-family:arial;font-size:12px;color:#000;width:150px;margin:15px 0;float:left;font-weight:bold;background:#eaeaea; text-transform: uppercase" type='submit' name='submit' value="Post Comment"/></td>
                        </tr>
                    </table>

                </form>

            <?php } ?>
        </div>   
    </div>
</div>

<div class="clear"></div>






<div class="clear"></div>
<div class="search_result_header margin-bottom_10">
    <h2 style="font-size: 18px">Related Items</h2>
</div>
<div class="clear"></div>
<div class="search_result margin-bottom_10">
    <?php
    //print_r($details_row);
    //echo $details_row[type_id];
    $related_items = sql::rows("$t_name", "type_id='$details_row[type_id]'  and bike_id!='$details_row[bike_id]' order by RAND() limit 0,4");

    
   // print_r($related_items);
    
    if (count($related_items) > 0):
        foreach ($related_items as $item):
            //print_r($item);
            $item_img = sql::row("$tab_name", "bike_id=$item[bike_id] order by bike_image_id asc limit 0,1");
            ?>
            <div class="p_box float_left">
                <?php
                if ($item_img['bike_image'] != '') {
                    $bike_image = $item_img['bike_image'];
                } else {
                    $bike_image = 'default.jpg';
                }
                ?>
                <a href="<?php echo site_url('adz/details/' . $t_name . '/' . $item['bike_id']); ?>"><img src="<?php echo base_url() . 'uploads/bike_image/t_' . $bike_image; ?>" alt="<?= $item['model_name'] ?>" width="260" height="260" /></a>
        <!--                <a href="#"><img src="img/p_img.png"/></a>-->
                <div class="clear"></div>
                <span class="l_text"><?= common::get_bike_type_name($item['type_id']) ?></span>
                <span <?php if ($item['ad_type'] == '1') { ?> class="round_shape" <? } if ($item['ad_type'] == '2') { ?> class="round_shape2" <? } ?> style="float: right; margin-top: -8px"><p><?= common :: get_ad_type_name($item['ad_type']) ?></p></span>
                <span  class="r_text">
                    <?php
                    if ($item['currency'] == "Euro") {
                        echo '&euro;' . ' ';
                    } else {
                        echo '&pound;' . ' ';
                    }
                    echo number_format($item['price']);
                    ?>

                </span>
                <div class="clear"></div>
                <span style="font-size:8px;color:gray;"><img src="img/p_icon.png"><?= date("m/d/Y", strtotime($item['time'])); ?></span>
        <!--                <span style="font-size:8px;color:gray;"><img src="img/p_icon.png"><?= date("jS F, Y", strtotime($item['time'])); ?></span>-->
                <span style="font-size:8px;color:gray;float: right;"><img src="img/area_icon.png"><?= common::get_area_name($item['area_id']) . ', ' . common::get_country_name($item['country_id']) ?></span>
                <div class="clear"></div>
            </div>
            <?php
            $i++;
        endforeach;
        ?>


    <?php else : ?>

        <div class="noContent">Sorry! No Content Found. Please try another.</div>

    <?php endif; ?>

</div>
<div class="clear"></div>

