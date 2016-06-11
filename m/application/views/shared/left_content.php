<a href="<?php echo site_url('home')?>" target="_blank"><img style="padding:8px 0;" src="img/logo_bike.png" height="30px" /></a> 

<a href="<?php echo site_url('contact')?>" style="float:right;margin-right:5px;margin-top:18px;">Contact</a> 
<div class="clear"></div>
<div class="category_part">
    <div class="slider_part float_left">
        <div class="banner_icon">
            <?php if($page=='browse'){?>
            <a href="<?php echo site_url('adz/catlist/offroad'); ?>">
                <img style="width:42px;height:42px;margin-top:16px;" src="img/home.png" onmouseover="this.src = 'img/home_hover.png'" onmouseout="this.src = 'img/home.png'" border="0" alt=""/>
            </a>
            <?php }else{?>
            <a href="<?php echo site_url('home'); ?>">
                <img style="width:42px;height:42px;margin-top:16px;" src="img/home.png" onmouseover="this.src = 'img/home_hover.png'" onmouseout="this.src = 'img/home.png'" border="0" alt=""/>
            </a>
            <?php }?>

            <a href="<?php echo site_url('competition'); ?>">
                <img style="width:42px;height:42px;margin-top:16px;" src="img/com.png" onmouseover="this.src = 'img/com_hover.png'" onmouseout="this.src = 'img/com.png'" border="0" alt=""/></a>
            <a href="<?php echo site_url('adz/catlist/offroad'); ?>">
                <img style="width:42px;height:42px;margin-top:16px;" src="img/cart.png" onmouseover="this.src = 'img/cart_hover.png'" onmouseout="this.src = 'img/cart.png'"/></a>
            <a href="<?php echo site_url('adz/add_adz'); ?>" style="padding-left: 30px"><img src="img/post_your_ads.png" style="width: 90px; height: 25px;margin:4px 0 0 40px"/></a>
            <a href="<?php echo site_url('adz/my_ads'); ?>" style="padding-left: 30px"><img src="img/my_ads.png" style="width: 90px; height: 25px;margin:2px 0 0 40px"/></a>
        </div>
        <div class="clear"></div>       
    </div>
</div>
<div class="clear"></div>
