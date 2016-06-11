<div class="content_m">
    <?php
    if ($msg != '') {
        echo "<div class='success'>" . $msg . "</div>";
    }
    ?>
    <form id="valid_adz" action="<?= $action ?>" method="post" enctype="multipart/form-data" >
        <select class="select-style2 gender2 jcountry jload_area2" name="country_id" ><?= common::get_country_options((($session_array['country_id']) ? $session_array['country_id'] : $user_data[country_id])) ?></select>
        <?= form_error('country_id', '<span style="display:block;color:red;">', '</span>') ?>
        <select class="select-style2 gender2 jarea" id="j_area_data2" name="area_id" ><?php
            if ($session_array['area_id'] != '' || $user_data[area_id]!='') {
                echo common::get_area_respect_with_country((($session_array['country_id']) ? $session_array['country_id'] : $user_data[country_id]), (($session_array['area_id']) ? $session_array['area_id'] : $user_data[area_id]));
            }
            ?></select>
<?= form_error('area_id', '<span style="display:block;color:red;">', '</span>') ?>
        <input placeholder="Post Code" class="select-style2" type="text" name="post_code" size="30" style="" value="<?php echo (($session_array['post_code']) ? $session_array['post_code'] : $user_data[post_code]); ?>"/> </td>
        <select name="currency"  class="select-style2" style="">
            <option value="">Set Currency</option>
            <option value="Euro" <?php if ($session_array[currency] == 'Euro' || $user_data[currency] == 'Euro') { ?> selected="selected" <?php } ?>>Euro €</option>
            <option value="GBP" <?php if ($session_array[currency] == 'GBP' || $user_data[currency] == 'GBP') { ?> selected="selected" <?php } ?>>GBP £</option>
        </select>
        <?= form_error('currency', '<span style="display:block;color:red;">', '</span>') ?>
        <input placeholder="Price" type="text" name="price" size="30" class="select-style2 " style="" value="<?= $session_array['price'] ?>"/>
        <?= form_error('price', '<span style="display:block;color:red;">', '</span>') ?>
        <textarea style="height:200px;width:100%;border:1px solid #eee;margin:7px 0;" class="jqte-test"  name="full_description"><?= $session_array['full_description'] ?></textarea>
<?= form_error('full_description', '<span style="display:block;color:red;">', '</span>') ?>
        <div class="button_p_n">
            <input  class="previous_button" type="submit" onclick="history.back(-1)" value="Previous"/>
            <input  class="next_button" type="submit" name="save" value="Next"/>
            <div class="clear"></div>
        </div>
    </form>
</div>
<!--<script>
    $('.jqte-test').jqte();
    var jqteStatus = true;
    $(".status").click(function()
    {
        jqteStatus = jqteStatus ? false : true;
        $('.jqte-test').jqte({"status" : jqteStatus})
    });
</script>-->