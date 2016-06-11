<div class="category_part">
    <div class="nav_part float_left">
        <ul class="left_nav">
            <?php
            $type_rows = sql::rows('main_type', 'type_status =1');
            if (count($type_rows) > 0):
                foreach ($type_rows as $trow):
                    ?>
                    <li><a href="<?php echo site_url('adz/adlist/' . $trow['table_name']); ?>"><?= $trow['type_name'] ?></a></li>
                <?php endforeach;
            endif; ?>
            <li><a href="<?php echo site_url('adz/add_adz'); ?>" style="border:0;">Sell Your Bike</a></li>
        </ul>
    </div>



    <div class="slider_part float_left">
        <div class="banner_icon">
            <a href="<?= site_url('adz'); ?>"><img src="img/motorbike.png" onmouseover="this.src='img/motorbike_hover.png'" onmouseout="this.src='img/motorbike.png'" border="0" alt=""/></a>
            <a href="<?= site_url('adz'); ?>"><img src="img/accessories.png" onmouseover="this.src='img/accessories_hover.png'" onmouseout="this.src='img/accessories.png'" border="0" alt=""/></a>
            <a href="<?= site_url('adz'); ?>"><img src="img/3.png" onmouseover="this.src='img/motorbike_hover.png'" onmouseout="this.src='img/3.png'"/></a>
            <a href="<?= site_url('adz'); ?>"><img src="img/4.png" onmouseover="this.src='img/motorbike_hover.png'" onmouseout="this.src='img/4.png'"/></a>
            <a href="<?php echo site_url('adz/add_adz'); ?>" style="padding-left: 30px"><img src="img/post_your_ads.png" style="width: 140px; height: 25px;margin:10px 0 0 30px"/></a>
        </div>


        <div class="clear"></div>
         
        
        <div class="banner_icon">
            <a href="<?= site_url('adz'); ?>"><img src="img/5.png" onmouseover="this.src='img/motorbike_hover.png'" onmouseout="this.src='img/5.png'"/></a>
            <a href="<?= site_url('adz'); ?>"><img src="img/6.png" onmouseover="this.src='img/motorbike_hover.png'" onmouseout="this.src='img/6.png'"/></a>
            <a href="<?= site_url('adz'); ?>"><img src="img/7.png" onmouseover="this.src='img/motorbike_hover.png'" onmouseout="this.src='img/7.png'"/></a>
            <a href="<?= site_url('adz'); ?>"><img src="img/8.png" onmouseover="this.src='img/motorbike_hover.png'" onmouseout="this.src='img/8.png'"/></a>
        </div>
        
        
            <a href="<?php echo site_url('adz/my_ads'); ?>" style="padding-left: 30px"><img src="img/my_ads.png" style="width: 140px; height: 25px;margin:10px 0 0 30px"/></a>

        
    </div>
</div>