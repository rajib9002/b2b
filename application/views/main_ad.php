<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php include_once 'shared/html_header.php'; ?>
    <body>
        <div class="container">
            <?php include_once 'shared/bike_search.php'; ?>
            <div class="mid_body">
                <div class="mid_left">
                    <h1 style="color:#c9bec2;font-weight: normal;font-size: 28px;background-color:#36121e;word-spacing: 5px;letter-spacing: 2px;font-family: 'tahoma';margin:0;padding:10px 5px;"><strong>all</strong>types </h1>                    
                    <?php $this->load->view('shared/categories.php'); ?>
                </div>
                <div class="mid_right">
                    <div class="search_by_r"> 
                        <div class="des_r">
                            <input type="hidden" value="<?= $this->session->userdata('order_type'); ?>" id="des_hidden_r"/>
                            <a id="des" title="ad_title" href="javascript::void()">Description</a>
                        </div>
                        <div class="des_r2_long">
                            <a id="mileage" title="ad_type" href="javascript::void()">Ads Type</a>
                        </div>

                        <div class="des_r2">
                            <a id="year" title="year" href="javascript::void()">Year</a>
                        </div>
                        <div class="des_r2">
                            <a id="seller_type" title="seller_type" href="javascript::void()">Seller</a>
                        </div>
                        <div class="des_r2">
                            <a id="location" title="area.area_name" href="javascript::void()">Location</a>
                        </div>
                        <div class="des_r2">
                            <a id="engine" title="engine" href="javascript::void()"> Engine</a>
                        </div>
                        <div class="des_r2">
                            <a id="price" title="price" href="javascript::void()">Price</a>
                        </div>
                        <div class="des_r2" style="border-right:0;">
                            <a id="hours" title="time" href="javascript::void()">Hours</a>
                        </div>
                        <input type="hidden" class="ad_type" value="<?php echo $this->session->userdata('ad_type'); ?>">
                        <input type="hidden" class="type_id" value="<?php echo $this->session->userdata('type_id'); ?>">
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
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="footer">
            <?php include_once 'shared/footer.php'; ?>
        </div>
    </body>
</html>
