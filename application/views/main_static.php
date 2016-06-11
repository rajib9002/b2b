<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

    <?php include_once 'shared/html_header.php'; ?>
    <body class="body_image">
        <div class="container">
            <div class="header_bg_total">
                <?php include_once 'shared/bike_search.php'; ?>
                <div class="clear"></div>
                <div class="menu">
                    <?php include_once 'shared/menu.php'; ?>
                </div>
            </div>               
            <div class="mid_body">
                <div class="mid_contant">  
                    <div class="clear"></div>
                    <div class="static_images">
                         <?php include_once 'shared/page_picture.php'; ?>
<!--                        <img src="<?//= $page_banner; ?>" width="1000px" height="125px">-->
                    </div>
                    <div class="mid_left">
                        <h1 style="color:#c9bec2;font-weight: normal;font-size: 28px;background-color:#36121e;word-spacing: 5px;letter-spacing: 2px;font-family: 'tahoma';margin:0;padding:10px 5px;"><strong>all</strong>types </h1>
                        <?php include_once 'shared/categories.php'; ?>
                    </div>
                    <div class="float_left" style="width:780px;padding:10px;background-color: #fff;min-height: 200px;" >
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
            </div>
            <div class="clear"></div>
            <div class="footer">
                <?php include_once 'shared/footer.php'; ?>
            </div>

        </div>
    </body>
</html>
