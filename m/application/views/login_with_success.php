<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <base href="<?= base_url() ?>"/>
    <title>Bike2Biker Mobile Version</title>
    <meta name="viewport" content="width=device-width"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="<?= base_url() ?>styles/style.css" rel="stylesheet" type="text/css"/>
</head>
    <body id="containerid">       
        <div class="clear"></div>
        <div class="container">            
            <div class="mid_content">
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
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="clear"></div>
        <div class="footer">          
            <div class="clear"></div>
            <div class="bottom_footer">
                <?php include_once 'shared/footer.php'; ?>
            </div>
        </div>
        <div class="clear"></div>

    </body>
</html>
