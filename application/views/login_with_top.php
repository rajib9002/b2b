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
                <div class="left_content">
                   
                     <?php include_once 'shared/left_content.php'; ?>
                    
                    <div class="clear"></div>
                </div>
                <div class="right_advertisement" style="height: 100px;border:1px solid gray;width: 165px;;">
                    <!--<a href="#"><img src="img/ad1.png" height="102px" style="padding-top:0px;"></a>-->
                    <h3 style="text-align:center;margin:0;padding:5px;">Download Application for Mobile</h3>
                    <div class="clear"></div>
                    <div style="text-align:center;">
                        <a style="display:inline-block;" href="<?php echo site_url('home/download/1')?>"><img style="width:45px;height:45px;" src="img/iph.png" alt="iPhone.png"/></a>
                        <a  style="display:inline-block;"  target="_blank" href="https://play.google.com/store/apps/details?id=com.namaAnda.bike2biker"><img style="width:45px;height:45px;" src="img/and.png" alt="Android.png"/></a>
                        <a  style="display:inline-block;"  target="_blank" href="<?php echo site_url('home/download/bike2biker.xap') ?>"><img style="width:45px;height:45px;" src="img/win.png" alt="Windows.png"/></a>
                    </div>
                </div>
                <div class="clear"></div>
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
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="footer">
            <div class="footer_bg_border">
                &nbsp;
            </div>
            <?php include_once 'shared/footer.php'; ?>
            <div class="clear"></div>
            <div class="bottom_footer">
                <p style="text-align: center;color:#b8b8b8;padding:30px 0;font-size: 13px;margin:0;">Copyright © 2015. All Rights Reserved <a href="#">bike2biker.com</a></p>
            </div>
        </div>
    </body>
</html>
