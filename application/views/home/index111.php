<div class="slider">
    <?php $slider = common::slider_list() ?>
    <div id="SliderName">
        <?php foreach ($slider as $img): ?>
            <img src="<?php echo base_url() . 'uploads/slider/' . $img['image'] ?>" alt="<?php $img['image'] ?>"  class="active" />
        <?php endforeach; ?>
    </div>
    <script type="text/javascript">
        var demoSlider = Sliderman.slider({container: 'SliderName', width: 830, height: 380, effects: '',
            display: {
                pause: true,
                autoplay: 3000,
                always_show_loading: 200,
                loading: {}
            }});
    </script>
</div>
<div class="clear"></div>
<div class="wc">
    <h1>Welcome</h1>
</div>
<div class="clear"></div>
<div class="down_mid">
    <div class="down_mid_right" >
        <div class="long_text" style="width: 600px;">
            <h1><a href="<?= site_url('pages/welcome'); ?>"><?= $home_title['site_title1'] ?></a></h1>
            <p> <span><?= substr($welcome, 0, 400) ?></span><span><a href="<?= site_url('pages/welcome'); ?>">  View More...</a></span></p>
            <h1><a href="<?= site_url('pages/welcome2'); ?>"><?= $home_title['site_title2'] ?></a></h1>
            <p> <span><?= substr($welcome2, 0, 400) ?></span><span><a href="<?= site_url('pages/welcome2'); ?>">  View More...</a></span></p>

            <h1><a href="<?= site_url('pages/welcome3'); ?>"><?= $home_title['site_title3'] ?></a></h1>
            <p> <span><?= substr($welcome3, 0, 400) ?></span><span><a href="<?= site_url('pages/welcome3'); ?>">  View More...</a></span></p>
        </div>
        <?php $site = common::get_settings_data() ?>
        <div class="mid_right_pic">
            <img width="170px" src="<?= base_url() ?>uploads/welcome_right/<?php echo $site['home_right_image'] ?>">
        </div>
    </div>
</div>