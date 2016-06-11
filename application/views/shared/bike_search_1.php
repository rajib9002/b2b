<?php
$country_id = $this->session->userdata('country_id');
$area_id = $this->session->userdata('area_id');
$t_id = $this->session->userdata('t_id');
$make_id = $this->session->userdata('company_id');
$model_id = $this->session->userdata('model_id');
$order = $this->session->userdata('order_by');
?>
<?php $lg=common::get_settings_data();?>
<div class="header">
    <div class="logo">
        <a href="#"><img src="<?=base_url()?>/uploads/welcome_right/<?php echo $lg['logo']?>"width="201px" height="187px"/></a>
    </div>
    <div class="head_right">
	
	<div class="top_2_btn" style="height:52px;">
            <!--<a style="" href="<?= site_url('competition_result'); ?>">Competition Result</a>-->
            <a style="" href="<?= site_url('competition'); ?>"> Competitions</a>  

            

        </div>
        <div class="clear"></div>
	
	
        <div class="tab_head">
            
            
            <a style="float:right;" href="<?= site_url('adz/save_list'); ?>"> <div class="tab_body1">
                    <div class="tab1">
                        <?php
                        $user_id = $this->session->userdata('user_id');
                        $total_ad = 0;
                        if ($user_id != '') {
                            $my_ad = sql::rows("save_ad", "user_id=$user_id");
                            $total_ad = count($my_ad);
                        }
                        ?>
<!--                        <span class="tab_pic3"></span>-->
                        <h1>saved ads(<?= $total_ad ?>)</h1>
                    </div>

                </div>
            </a>
            <a style="float:right;" href="<?= site_url('adz/index/2'); ?>"> <div class="tab_body1">
                    <div class="tab1">
<!--                        <span class="tab_pic2"></span>-->
                        <h1>wanted ads</h1>
                    </div>

                </div>
            </a>
            <a style="float:right;" href="<?= site_url('adz/index/1'); ?>">
                <div class="tab_body1">
                    <div class="tab1">
<!--                        <span class="tab_pic"></span>-->
                        <h1>for sale ads</h1>
                    </div>
                </div>
            </a>

        </div>
        <div class="clear"></div>

        <div class="search_body" style="border:3px solid #ab4a6b;">
            <div class="bike_search_body">
                <div class="search2" style="background-color:#fff;height:70px;width:736px;margin:0;padding:0;">
                    <form style="float: left;margin-left: 7px;margin-top:-7px;" method="post" action="<?= site_url('adz/index'); ?>" >

                        <span>
                            <h1>Country</h1>
                            <select class="select-style2 gender2 jload_area" name="country_id"><?= common::get_country_options($country_id) ?></select>
                        </span>
                        <span>
                            <h1>Area</h1>
                            <select class="select-style2 gender2 jarea" id="j_area_data" name="area_id"><?= $this->mod_adz->get_area_options($country_id,$area_id) ?></select>
                        </span>
                        <span class="box2">
                            <h1>Type</h1>

                            <select class="select-style2 gender2 jtype" name="type_id"><?= common::get_bike_type($t_id) ?></select>
                        </span>
                        <span>
                            <h1>Make</h1>
                            <select class="select-style2 gender2 jmake" id="j_make_data" name="company_id"><?= common::get_bike_company_by_r($t_id,$make_id) ?></select>
                        </span>
                        <span>
                            <h1>Model</h1>

                            <select class="select-style2 gender2 jmodel" id="j_model_data" name="model_id"><?= common::get_bike_model($model_id) ?> ?></select>
                        </span>
                        <input class="search" type="submit" value="search" name="search" >
                    </form>

                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>