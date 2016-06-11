<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php include_once 'shared/html_header.php'; ?>
    <body id="containerid">       

        <div class="container">
            <?php include_once 'shared/bike_search.php'; ?>
        </div>
        <div class="clear"></div>
        <div class="search_area_new_bg">

            <div class="container">
                <?php include_once 'shared/top_search_bar.php'; ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="container">    
            <div class="mid_content">
                <!--<div class="mid_body">-->
                <!--<div class="mid_left">-->
                <?php //$this->load->view('shared/categories.php'); ?>
                <!--</div>-->
                <div class="left_content">
                    <?php include_once 'shared/left_content.php'; ?>
                    <?php
                    if ($dir == '') {
                        $dir = 'home';
                    }
                    if ($page == '') {
                        $page = 'index';
                    }
                    include_once $dir . '/' . $page . '.php';
                    ?>
                </div>
                <div class="right_advertisement">

                    <?php
                    $imgages = sql::rows("ad_image", "status=1");
                    if ($imgages[0]['image'] != '') {
                        $ad_image1 = $imgages[0]['image'];
                    }
                    if ($imgages[1]['image'] != '') {
                        $ad_image2 = $imgages[1]['image'];
                    }
                    ?>
                   
                    <div style="height:102px;border:1px solid gray;width:99%;">
                        <h3 style="text-align:center;margin:0;padding:5px;">Download Application for Mobile</h3>
                        <div class="clear"></div>
                        <div style="text-align:center;">
                            <a style="display:inline-block;" href="<?php echo site_url('home/download/1')?>"><img style="width:45px;height:45px;" src="img/iph.png" alt="iPhone.png"/></a>
                            <a  style="display:inline-block;"  target="_blank" href="https://play.google.com/store/apps/details?id=com.namaAnda.bike2biker"><img style="width:45px;height:45px;" src="img/and.png" alt="Android.png"/></a>
                            <a  style="display:inline-block;"  target="_blank" href="<?php echo site_url('home/download/3')?>"><img style="width:45px;height:45px;" src="img/win.png" alt="Windows.png"/></a>
                        </div>
                    </div>
                    <a href="#"><img src="<?php echo base_url() ?>uploads/ad_image/<?php echo $ad_image2 ?>" height="442px" width="170px"></a>
                </div>
                <div class="clear"></div>

            </div>

        </div>
        <div class="clear"></div>
        <!--</div>-->
        <div class="clear"></div>
        <div class="footer">
            <div class="footer_bg_border">
                &nbsp;
            </div>
            <?php include_once 'shared/footer.php'; ?>

            <div class="clear"></div>
            <div class="bottom_footer">
                <p style="text-align: center;color:#49535b;padding:30px 0;font-size: 13px;margin:0;">Copyright © 2015. All Rights Reserved <a href="#">bike2biker.com</a></p>
            </div>

        </div>
        <div class="clear"></div>

    </body>
</html>
