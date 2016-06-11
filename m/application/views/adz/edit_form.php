
<?php
//print_r($b);
$des_status = sql::row("type", "type_id=$b[type_id]", "description_type");
$status_type = $des_status['description_type'];
?>

<!--<link type="text/css" rel="stylesheet" href="tools/jQueryTE/jquery-te-1.4.0.css">-->
<!--<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>-->
<!--<script type="text/javascript" src="tools/jQueryTE/jquery-te-1.4.0.min.js" charset="utf-8"></script>-->

<script>
    $(document).ready(function () {
        var text_max = 20;
        $('#textarea_feedback').html(text_max + ' characters remaining');

        $('#textarea').keyup(function () {
            var text_length = $('#textarea').val().length;
            var text_remaining = text_max - text_length;

            $('#textarea_feedback').html(text_remaining + ' characters remaining');
        });

    });
</script>
<div class="content_m" style="text-align:left;">
    <form id="valid_adz" action="<?php echo site_url('adz/edit_my_adz/' . $t_name . '/' . $bike_id) ?>" method="post" enctype="multipart/form-data" />
    <select name="ad_type">
        <option value="1" <?php if ($b[ad_type] == '1') echo 'selected'; ?>>
            For Sale
        </option>
        <option value="2" <?php
        if ($b[ad_type] == '2')
            echo 'selected';
        ?>>
            Wanted
        </option>
    </select>
    <?= form_error('ad_type', '<span>', '</span>') ?>
    <select name="seller_type">
        <option value="1" <?php
        if ($b[seller_type] == '1')
            echo 'selected';
        ?>>
            Private
        </option>
        <option value="2" <?php
        if ($b[seller_type] == '2')
            echo 'selected';
        ?>>
            Trade
        </option>
    </select>
    <?= form_error('seller_type', '<span>', '</span>') ?>
    <input type="hidden" name="ad_title" value="test">
        

    <?= form_error('ad_title', '<span style="display:block;color:red;">', '</span>') ?>
    <div style="width: 150px; float: left; color: #fff;" id="textarea_feedback"></div>
    <input type="hidden" name="type_id" value="<?php echo $b[type_id] ?>">
    <?= form_error('type_id', '<span style="display:block;color:red;">', '</span>') ?>





    <?php
    $m_t = sql::row("model", "model_id='$b[model_id]' and make_id='$b[make_id]' and type_id='$b[type_id]'");
    ?>
    <?php
    $parent_id = $m_t['main_type_id'];
    $this->session->set_userdata('parent_type_id', "$parent_id");
    ?>

    <?php
    $sql = $this->db->query("select model.*, make.make_name
                from model
                left join make on make.make_id=model.make_id
                where main_type_id='$parent_id' group by model.make_id order by make.make_name asc");
    $c_rows = $sql->result_array();
    ?>
    <select name="make_id" class="jmake_step3" id="j_make_data2">
        <option value=''>select Make</option>
        <?php
        foreach ($c_rows as $m_data) {
            if ($b[make_id] == $m_data[make_id]) {
                echo "<option value='$m_data[make_id]' selected='selected'>$m_data[make_name]</option>";
            } else {
                echo "<option value='$m_data[make_id]' >$m_data[make_name]</option>";
            }
        }
        ?>
    </select>
    <?= form_error('make_id', '<span>', '</span>') ?>
    <select name="model_id" class="jmodel_step3" id="j_model_data3">
        <?php
        if ($b[model_id] != '') {
            echo $this->mod_adz->get_model_options_model_selected($b[make_id], $b[model_id]);
        }
        ?>
    </select>
    <?= form_error('model_id', '<span>', '</span>') ?>



    <select class="select-style2 gender2 jcountry jload_area2" name="country_id" ><?= common::get_country_options($b['country_id']) ?></select>
    <?= form_error('country_id', '<span style="display:block;color:red;">', '</span>') ?>
    <select class="select-style2 gender2 jarea" id="j_area_data2" name="area_id" ><?php if ($b['area_id'] != '') {
        echo common::get_area_respect_with_country($b['country_id'], $b['area_id']);
    } ?></select>
<?= form_error('area_id', '<span style="display:block;color:red;">', '</span>') ?>


    <input class="select-style2" placeholder="Post Code" type="text" name="post_code" size="30" value="<?= set_value('post_code', $b[post_code]) ?>"/>
    <select name="currency"  class="select-style2" style="margin: 0 auto; padding: 0 auto;">
        <option value="">Set Currency</option> 
        <option <?php if ($b[currency] == 'Euro' || $_REQUEST['currency'] == 'Euro') { ?> selected="selected"<?php } ?> value="Euro">Euro €</option> 
        <option <?php if ($b[currency] == 'GBP' || $_REQUEST['currency'] == 'GBP') { ?> selected="selected"<?php } ?>  value="GBP">GBP £</option> 
    </select>
    <?= form_error('currency', '<span style="display:block;color:red;">', '</span>') ?>
    <input type="text" name="price" placeholder="Price:*" size="30" class="select-style2 " value="<?= set_value('price', $b[price]) ?>"/>
<?= form_error('price', '<span style="display:block;color:red;">', '</span>') ?>
    <select name="year" class="select-style2 gender" ><?= common::get_year(set_value('year', $b[year])) ?></select>
    <input type="text" name="engine" placeholder="Engine" size="30" class="select-style2 " value="<?= set_value('engine', $b[engine]) ?>"/> 
    <input type="text" name="hours" placeholder="Hours"  size="30" class="select-style2 " value="<?= set_value('hours', $b[hours]) ?>"/>  
    <input style="width:70px;float:left;" type="text" name="mileage"  class="select-style2 " placeholder="Mileage" value="<?= set_value('mileage', $b[mileage]) ?>"/>
    <select style="width:130px;float:left;" name="mill_sign">
        <option <?php if ($b[mill_sign] == 'kilometers' || $_REQUEST['mill_sign'] == 'kilometers') { ?> selected="selected"<?php } ?> value="kilometers">kilometers</option>
        <option <?php if ($b[mill_sign] == 'miles' || $_REQUEST['mill_sign'] == 'miles') { ?> selected="selected"<?php } ?> value="miles">miles</option>
    </select> 
    <style>
        .jqte{margin: 0}
    </style>
    <textarea size="30" name="full_description" cols="30" rows="6"/><?= set_value('full_description', strip_tags($b[full_description])) ?></textarea>
<div class="clear"></div>
<?= form_error('full_description', '<span style="display:block;color:red;">', '</span>') ?>
<div class="clear"></div>
<div class="button_p_n">
    <input  class="previous_button" type="submit" onclick="history.back(-1)" value="Previous"/>
    <input  class="next_button" type="submit" name="update" value="Update"/>
    <div class="clear"></div>
</div>
</form>
</div>

<script>
    $('.jqte-test').jqte();

    // settings of status
    var jqteStatus = true;
    $(".status").click(function ()
    {
        jqteStatus = jqteStatus ? false : true;
        $('.jqte-test').jqte({"status": jqteStatus})
    });
</script>

