<div class="tab_menu">
    <a href="<?= site_url('adz/index/bike_id/1'); ?>"> <div class="tab_body1">
            <div class="tab1">
                <span class="tab_pic"></span>
                <h1>FOR SALE ADS</h1>
            </div>
            <div class="clear"></div>
            <div class="tab_down1">

            </div>
        </div>
    </a>
    <a href="<?= site_url('adz/index/bike_id/2'); ?>">   <div class="tab_body2">
            <div class="tab2">
                <span class="tab_pic2"></span>
                <h1>WANTED ADS</h1>
            </div>
            <div class="clear"></div>
            <div class="tab_down2">

            </div>
        </div>
    </a>

    <a href="<?= site_url('adz/save_list'); ?>"><div class="tab_body3">
            <div class="tab3">
                <?php
                $user_id = $this->session->userdata('user_id');
                $total_ad=0;
                if ($user_id != '') {
                    $my_ad = sql::rows("save_ad", "user_id=$user_id");
                     $total_ad = count($my_ad);
                }               
                ?>
                <span class="tab_pic3"></span>
                <h1>SAVED ADS(<?= $total_ad ?>)</h1>
            </div>
            <div class="clear"></div>
            <div class="tab_down3">

            </div>
        </div>
    </a>
</div>

 
        