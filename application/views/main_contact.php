<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php include_once 'shared/html_header.php'; ?>
    <body>
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
