<div style="word-break: break-all;">
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
//            $j("#showPhone").click(function () {
//                $j("#showPhone").hide();
//                $j("#hidePhone").show();
//            });
//            $j("#hidePhone").click(function () {
//                $j("#showPhone").show();
//                $j("#hidePhone").hide();
//            });
//            $j("#hide").click(function () {
//                $j("#mail_form").hide();
//            });
//            $j("#show").click(function () {
//                $j("#mail_form").show();
//            });
        });

        function tab_hide_show(obj) {
            if (obj == 1) {
                $j('#tab-1').show();
                $j('#tab-2').hide();
            } else {
                $j('#tab-2').show();
                $j('#tab-1').hide();
            }

        }


    </script>
    <style>
        .swiper-container {
            width: 100%;
            height: 100%;
            margin-left: auto;
            height: 240px;
            margin-right: auto;
        }
        .swiper-button-next{
            background: url("img/next.png") no-repeat ;
            right: -8px;
        }
        .swiper-button-prev{
            background: url("img/prev.png") no-repeat ;
            left: 0px;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
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
    </style>
    <?php
    $post_id = $details_row['bike_id'];
    ?>










    <?php
    $tab_name = $t_name . '_image';
    $imgages = sql::rows("$tab_name", "bike_id='$details_row[bike_id]' order by bike_image_id asc");
    if ($imgages[0]['bike_image'] != '') {
        $bike_image = $imgages[0]['bike_image'];
    } else {
        $bike_image = 'default.jpg';
    }
    ?>
    <div class="swiper-container">
        <div class="swiper-wrapper">    
            <?php if (count($imgages) == 0) { ?>
                <div class="swiper-slide"><img src="<?php echo UPLOAD_PATH ?>/bike_image/thumbs/default.jpg" width="100%" height="220px" /></div>
            <?php } ?>

            <?php
            $i = 1;
            foreach ($imgages as $img) {
                ?>
                <div class="swiper-slide"><img src="<?php echo UPLOAD_PATH ?>/bike_image/<?php echo $img['bike_image'] ?>" width="100%" height="220px" /></div>
                <?php
                $i++;
            }
            ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
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
    <div class="clear"></div>
    <br/>
    <div style="width:100%;  margin:0 0 10px 0">
        <div> 
            <h1 style="text-transform: uppercase; font-size: 14px; display: inline; margin: 0; padding: 0;float:left;">
                <?= $details_row['make_name'] . ' ' . $details_row['model_name'] ?>
            </h1>


<div class="wishlist" style="display: inline;vertical-align: bottom;float:left;margin-left:10px;">
<?php
        if (common::is_logged_in()) {
            $user_id = $this->session->userdata('user_id');
            $is_exist = sql::count("save_ad", "table_name='$details_row[table_name]' and bike_id='$details_row[bike_id]' and user_id='$user_id'");

            if ($is_exist > 0) {
                ?>
                <a title="You already Saved this Adz" href="javascript:void(0);">
                    <img height="15px" src='img/heart_fill.png'>
                </a>
            <?php } else { ?>
                <a  title="Save Adz" href="<?php echo site_url('adz/save_adz/' . $details_row['table_name'] . '/' . $details_row['bike_id']) ?>">
                    <img height="15px" src='img/heart_blank.png'>
                </a>
            <?php } ?>
        <?php } else { ?>
            <a  title="Save Adz" href="<?php echo site_url('login') ?>">
                <img height="15px" src='img/heart_blank.png'>
            </a>
        <?php } ?>
</div>


            <?php if ($details_row['ad_type'] == 1) { ?>
                <img src="img/for_sale.png" height=""  style="vertical-align:middle;float:left;margin-left:10px;margin-top:-2px;"/>
            <?php }
            ?>
            <?php if ($details_row['ad_type'] == 2) { ?>
                <img src="img/for_wanted.png" width="80px" style="vertical-align:middle;float:left;margin-left:10px;margin-top:-2px;"/>
            <?php }
            ?>
            <h1 style="text-transform: uppercase; font-size: 14px; display: inline; margin:0;padding:0;margin-left: 5px;float:right;">
                <?php
                if ($row['currency'] == "Euro") {
                    echo '&euro;' . number_format($details_row['price'], 0);
                } else {
                    echo '&pound;' . number_format($details_row['price'], 0);
                }
                ?>
            </h1> 
        </div>
<div class="clear"></div>
        <div style="background-color: #fff;margin:10px 0 5px 0;"> 
            <span style="font-size:12px;color:gray;width: 100px;display: inline-block; ">
                <img src="img/location.png" width="15" height="15" style="vertical-align:top;"/>
                <?php
                if ($details_row['area_id'] != '')
                    echo common :: get_area_name($details_row['area_id']);
                ?>
            </span>
            <span style="font-size:12px;color:gray; width:80px;margin:0 auto;"><img src="img/time.png" width="15" height="15"  style="vertical-align:top;"/>
                <?= date('F d Y', strtotime($details_row['bike_post_date'])); ?>
            </span>
            <span style="font-size:12px;color:gray; margin-left: 10px;float:right;"><img src="img/people.png" width="15" height="15" style="vertical-align:top;" />
                <?= $details_row['views']; ?> Views
            </span>
        </div>   
        <div class="clear"></div>
        <br/>
        <div style="background: #fbfbfb; color: #a5a5a5;font-size:14px; display: block; border-bottom: 1px solid #c6c6c6;padding:10px;">
            Make   <span style="float:right;"> <?php
                if ($details_row['make_id'] != '')
                    echo common :: get_bike_make_name($details_row['make_id'])
                    ?> 
            </span>
        </div>
        <div style="background: #fbfbfb; color: #a5a5a5;font-size:14px; display: block;border-bottom: 1px solid #c6c6c6;padding:10px; ">
            Model  <span style="float:right;"><?php
                if ($details_row['model_id'] != '')
                    echo common :: get_bike_model_name($details_row['model_id'])
                    ?> 
            </span>
        </div>
        <?php if ($details_row['year'] != '') { ?>
            <div style="background: #fbfbfb; color: #a5a5a5;font-size:14px; display: block; padding:10px;border-bottom: 1px solid #c6c6c6;">
                Year   <span style="float:right;"> <?php echo $details_row['year'] ?> </span>
            </div>
        <?php } ?>
        <?php if ($details_row['mileage'] != '') { ?>
            <div style="background: #fbfbfb; color: #a5a5a5;font-size:14px; display: block; padding:10px;border-bottom: 1px solid #c6c6c6;">
                Mileage   <span style="float:right;"><?php echo $details_row['mileage'] . ' ' . $details_row['mill_sign']; ?></span>
            </div>
        <?php } ?>
        <?php if ($details_row['hours'] != '') { ?>
            <div style="background: #fbfbfb; color: #a5a5a5;font-size:14px; display: block; padding:10px;">
                Hours   <span style="float:right;"><?php echo $details_row['hours'] ?></span>
            </div>
        <?php } ?>
    </div>
    <div class="clear"></div>
    <div>
        <div style="font-size:12px; color:#000;  display: block;">
            <span style="color:gray;">Contact  <?= $details_row['adz_user_name'] ?> </span>
        </div>
        <br/>
        <?
        $iPod = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
        $iPhone = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
        $iPad = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
        $Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
        ?>
        <a href="tel:<?= $details_row[adz_user_phone] ?>" > <img src="img/call.png" height="25"/></a>
        <a style="margin-left:20px" href="sms:<?= $details_row[adz_user_phone] ?>" >  <img src="img/sms.png" height="25"/></a>
        <a style="margin-left:20px" href="mailto:<?= $details_row[adz_user_email] ?>" >  <img src="img/email.png" height="28"/></a>
    </div>
    <br/>
    <div id="tabs-container">
        <?php
        $tab_name = $t_name . '_comment';
        $all_comments = sql::rows("$tab_name", "bike_id='$details_row[bike_id]'", 'bike_id');
        $total_comment = count($all_comments);
        ?>
        <ul class="tabs-menu">
            <li  class="current"><a href="#tab-1" onclick="tab_hide_show(1);">Description</a></li>
            <li ><a href="#tab-2"  onclick="tab_hide_show(2);">Post Comments (<?= $total_comment; ?>)</a></li>
        </ul>
        <div class="tab" style="margin-bottom:5px;margin-top:0;width:100%;">
            <div id="tab-1" class="tab-content">
                <p style="font-size: 12px; line-height: 14px;padding:10px;"><?php echo $details_row['full_description']; ?></p>
            </div>
            <div id="tab-2" class="tab-content" style="margin-top:0;width:100%;">
                <?php
                if (common::is_logged_in()) {
                    foreach ($bike_comment as $comment) {
                        ?>
                        <div class="comments_all" style="width: 100%;font-size: 12px;text-align:left;">
                            <?php
                            $user_data = sql::row("users", "user_id='$comment[user_id]'");
                            $user_image = $user_data['user_image'];
                            ?>
                            <div class="image_right" style="border-bottom: 1px solid #cfcfcf;background-color:#fbfbfb;padding:10px;">
                                <h4 style="margin-bottom: 0">
                                    <span style="float:left"><?php echo $user_data['user_first_name'] . ' ' . $user_data['user_last_name'] ?> </span>
                                    <span style="float:right"> <?php echo 'Posted ' . date("d M Y", strtotime($comment['comment_date'])) ?>  </span>
                                </h4>
                                <br/>
                                <p style="text-align: left;margin:10px 0;position:relative;padding-right:25px;word-break: break-all;"><?php echo $comment['comment'] ?><?php
                                    $user_id = $this->session->userdata('user_id');
                                    if ($user_id == $details_row['user_id'] || $user_id == $comment['user_id']) {
                                        ?>
                                        <a style="position:absolute;right:5px;top:5px;" href="<?= site_url('adz/delete_comment/' . $details_row['bike_id'] . '/' . $comment['id'] . '/' . $t_name); ?>" title="Delete Comment" onClick="javascript:return confirm('Are you sure you want to delete this comment?');"> <img width="10px" src="img/x.png"></a>
                                        <?php
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="comments_all" style="width: 100%;font-size: 12px;text-align:left;">
                        <div class="image_right" style="width:100%;display:block;padding:10px;">
                            You Need to <a href="<?= site_url('login'); ?>"> Login</a> to Post Comment.
                        </div>
                        <div class="clear"></div>
                    </div>
                    <?php
                }
                ?>
                <div class="clear"></div>
                <?php if (common::is_logged_in()) { ?>
                    <form  style="margin:10px 0;" action="<?= $action . '/' . $details_row['bike_id'] ?>" method="post" onSubmit="if (document.getElementById('comment').value == '') {
                                    alert('Please enter your comment');
                                    document.getElementById('comment').focus();
                                    return false;
                                }">
                        <table style="padding:0; width: 100%;">
                            <tr>
                                <td align="left" ><textarea  name='comment' id="comment" style="width:100%;height:60px;padding:10px;"></textarea></td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <input style="float:right;"  type='submit' name='submit' value="Post Comment"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php } ?>
            </div>   
        </div>
    </div>
    <div class="clear"></div>
</div>