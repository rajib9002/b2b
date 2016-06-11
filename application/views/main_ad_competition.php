<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php include_once 'shared/html_header.php'; ?>
    <body>
        <div class="container">
                <?php include_once 'shared/bike_search.php'; ?>
                <div class="clear"></div>
            
            <div class="mid_body">
                <div class="mid_contant">                     
                    <div class="mid_left fl_left">
                        <h1 style="color:#c9bec2;font-weight: normal;font-size: 28px;background-color:#36121e;word-spacing: 5px;letter-spacing: 2px;font-family: 'tahoma';margin:0;padding:10px 5px;"><strong>all</strong>types </h1>
                        <?php include_once 'shared/categories.php'; ?>
                    </div>
                    <div class="float_left" style="width:780px;padding:10px;background-color: #fff;min-height: 200px;" >
                        <div class="mid_body">
                            <div style="background-color:#fff;margin:0;padding:0;">
                                <p>
                                    <?php
                                    if ($dir == '') {
                                        $dir = 'home';
                                    }
                                    if ($page == '') {
                                        $page = 'index';
                                    }
                                    include_once $dir . '/' . $page . '.php';
                                    ?>
                                </p>
                            </div>
                        </div>
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
