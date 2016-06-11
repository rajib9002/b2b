<!DOCTYPE html>
<html lang="en">

    <?php include_once 'shared/html_header_step4.php'; ?>
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
