<!-- some pretty fonts for this demo page - not required for the slider -->
<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300' rel='stylesheet' type='text/css'> 

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "b0a71506-970b-4e03-8021-bae0c1d2adbd", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<!--<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>-->

<link rel="stylesheet" href="styles/swiper.min.css">


<script>
    $j(document).ready(function() {
        $j(".tabs-menu a").click(function(event) {
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
        $j("#hide").click(function(){
            $j("#mail_form").hide();
        });
        $j("#show").click(function(){
            $j("#mail_form").show();
        });
    });
</script>

<style>
    html, body {
        position: relative;
        height: 240px;
    }

    .swiper-container {
        width: 100%;
        height: 100%;
        margin-left: auto;
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
$imgages = sql::rows("bike_image", "bike_id=$details_row[bike_id] order by bike_image_id asc");
if ($imgages[0]['bike_image'] != '') {
    $bike_image = $imgages[0]['bike_image'];
} else {
    $bike_image = 'default.jpg';
}
?>    



<div class="swiper-container">
    <div class="swiper-wrapper">           

        <?php
        $i = 1;
        foreach ($imgages as $img) {
            ?>

            <div class="swiper-slide"><img src="<?php echo UPLOAD_PATH ?>/bike_image/large/<?php echo $img['bike_image'] ?>" width="280px" height="220px" /></div>
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

<div style="width:300px;  margin: 10px">

    <div> 

        <h1 style="text-transform: uppercase; font-size: 18px; display: inline; margin: 0; padding: 0">
            </span> <?= substr($details_row['ad_title'], 0, 15) ?>
        </h1>
        <?php if ($details_row['ad_type'] == 1) { ?>
            <img src="img/for_sale1.png" height="18"/>
        <?php }
        ?>
        <?php if ($details_row['ad_type'] == 2) { ?>
            <img src="img/for_wanted1.png" height="18"/>
        <?php }
        ?>

        <h1 style="text-transform: uppercase; font-size: 18px; display: inline; margin-left: 15px; ">
            <?php
            if ($row['currency'] == "Euro") {
                echo '&euro;' . $details_row['price'];
            } else {
                echo '&pound;' . $details_row['price'];
            }
            ?>  

        </h1> 


    </div>

    <div style="background-color: #fff;"> 
        <span style="font-size:12px;color:gray; ">
            <img src="img/location.png" width="15" height="15" />
            <?php
            if ($details_row['area_id'] != '')
                echo common :: get_country_name($details_row['area_id']);
            ?>
        </span>
        <span style="font-size:12px;color:gray; margin-left: 10px;"><img src="img/time.png" width="15" height="15" />
            <?= common::get_hours($details_row['bike_post_date']); ?>
        </span>
        <span style="font-size:12px;color:gray; margin-left: 10px"><img src="img/people.png" width="15" height="15" />
             <?= $details_row['views']; ?> Views
        </span>
    </div>   

    <div class="clear"></div>

</div>
<div class="clear"></div>




    <div style="width:260px;  padding: 10px 10px 10px 20px; margin-left: 10px; background: #fbfbfb; color: #a5a5a5;font-size:14px; display: block; border-bottom: 1px solid #c6c6c6; ">
        Make   <span style="float:right; margin-right: 10px"> <?php if ($details_row['company_id'] != '')  echo common :: get_bike_company_name($details_row['company_id']) ?> </span>
    </div>

    <div style="width:260px;  padding:10px 10px 10px 20px; margin-left: 10px;background: #fbfbfb; color: #a5a5a5;font-size:14px; display: block;border-bottom: 1px solid #c6c6c6; ">
        Model  <span style="float:right; margin-right: 10px"><?php if ($details_row['model_id'] != '') echo common :: get_bike_model_name($details_row['model_id']) ?> </span>
    </div>


    <div style="width:260px;  padding:10px 10px 10px 20px; margin-left: 10px;background: #fbfbfb; color: #a5a5a5;font-size:14px; display: block; ">
        Year   <span style="float:right; margin-right: 10px">   <?php if ($details_row['year'] != '') echo  $details_row['year'] ?> </span>
    </div>






<div style="width:300px; margin: 10px; height: 70px">
    <div style="font-size:12px; color:#000;  display: block;">
        <span style="color:gray">Contact : </span> <?= $details_row['adz_user_name'] ?>
    </div>
    <br/>


    <a href="tel:<?= $details_row[adz_user_phone] ?>" > <img src="img/call.png" height="28"/></a>

     <a style="margin-left:20px" href="sms:<?= $details_row[adz_user_phone] ?>?body=hello" >  <img src="img/sms.png" height="28"/></a>


     <a style="margin-left:20px" href="mailto:<?= $details_row[adz_user_email] ?>" >  <img src="img/email.png" height="28"/></a>

    <br/><br/><br/>

</div>



<div id="tabs-container"  style="width:300px; margin: 10px">
    <?php
    $all_comments = sql::rows("bike_comment", "bike_id=$details_row[bike_id]", 'bike_id');
    $total_comment = count($all_comments);
    ?>
    <ul class="tabs-menu">
        <li  class="current"><a href="#tab-1">Description</a></li>
        <li ><a href="#tab-2">Post Comments (<?= $total_comment; ?>)</a></li>
    </ul>
    <div class="tab">
        <div id="tab-1" class="tab-content">
            <p style="font-size: 12px; line-height: 14px; margin: 0 10px;"><?php echo $details_row['full_description']; ?></p>
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

                        <div class="image_right" style="border-bottom: 1px solid #cfcfcf;">
                            <h4 style="margin-bottom: 0">
                                <span style="float:left"><?php echo $user_data['user_first_name'] . ' ' . $user_data['user_last_name'] ?> </span>
                                <span style="float:right"> <?php echo 'Posted ' . date("d M Y", strtotime($comment['comment_date'])) ?>  </span>
                            </h4>
                            <br/>
                            <p style="margin-left: 70px; text-align: justify; margin-top: 10px; margin-bottom: 5px;"><?php echo $comment['comment'] ?></p>
                            <?php
                            $user_id = $this->session->userdata('user_id');
                            if ($user_id == $details_row['user_id'] || $user_id == $comment['user_id']) {
                                ?>
                                <a style="margin-left:614px; margin-top: -5px" href="<?= site_url('adz/delete_comment/' . $details_row['bike_id'] . '/' . $comment['id']); ?>" title="Delete Comment" onClick="javascript:return confirm('Are you sure you want to delete this comment?');"> Delete</a>
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
                <div class="comments_all" style="margin-left:20px; width: 280px;margin-right:5px;float:left;font-family:arial; font-size: 12px">

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

                <form  style="margin:20px;" action="<?= $action . '/' . $details_row['bike_id'] ?>" method="post" onSubmit="if(document.getElementById('comment').value==''){alert('Please enter your comment'); document.getElementById('comment').focus();return false;}">

                    <table>

                        <tr>
                            <td align="left" ><textarea  name='comment' id="comment" cols="32" rows="4"></textarea></td>
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




