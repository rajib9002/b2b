
<?php
$des_status = sql::row("type", "type_id=$b[type_id]", "description_type");
$status_type = $des_status['description_type'];
?>

<link type="text/css" rel="stylesheet" href="tools/jQueryTE/jquery-te-1.4.0.css">
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript" src="tools/jQueryTE/jquery-te-1.4.0.min.js" charset="utf-8"></script>

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

<form id="valid_adz" action="<?php echo site_url('adz/edit_my_adz/' .$t_name.'/'. $bike_id) ?>" method="post" enctype="multipart/form-data" />
<div class="content" style="background-color:#376388;padding:20px 40px;width:90%;border-radius: 5px;margin:20px auto;">
    <h2 style="font-size: 20px">Edit Advertisement</h2>
    <div class='form_content' style="width:100%;">


        <?php
        if ($msg != '') {
            echo "<div class='error'>" . $msg . "</div>";
        }
        ?>
        <table class="rajib_table_content" style="width:50%;float:left;">
            <tr>
                <th valign="top" >Ad type *  </th>
                <td style="color:#fff; width: 200px;">
                    <input style="width:20px;" type="radio" name="ad_type" value="1" <?php if ($b[ad_type] == '1') { ?> checked="checked"<?php } ?>/> For Sale
                    <input style="width:20px;" type="radio" name="ad_type" value="2" <?php if ($b[ad_type] == '2') { ?> checked="checked"<?php } ?> /> Wanted<br>
                    <?= form_error('ad_type', '<span>', '</span>') ?>
                </td>
            </tr>

            <tr>
                <th valign="top">Seller Type *</th>
                <td style="color:#fff">
                    <input style="width:20px;" type="radio" name="seller_type" value="1" <?php if ($b[seller_type] == '1') { ?> checked="checked"<?php } ?>/>Private
                    <input style="width:20px;" type="radio" name="seller_type" value="2"<?php if ($b[seller_type] == '2') { ?> checked="checked"<?php } ?> />Trade
                    <?= form_error('seller_type', '<span>', '</span>') ?>
                </td>
            </tr>

            <tr>
                <th valign="top">Brief Description * </th>
                <td style="width: 200px">
                    <textarea name="ad_title" rows="1" cols="37" style="padding:5px; height: 30px" id="textarea" maxlength="20" value=""><?= set_value('ad_title', substr($b[ad_title], 0, 20)) ?></textarea>
                    <?= form_error('ad_title', '<span style="display:block;color:red;">', '</span>') ?>
                    <div style="width: 200px; float: left; color: #fff;" id="textarea_feedback"></div>
                </td>
            </tr>
            <tr>
                <th >&nbsp;</th> <td>&nbsp;</td>
            </tr>

            <tr>
                <th valign="top">Type *  </th>
                <td>
                    <select name="type_id"  class="jtype_step3" style="margin: 0 auto; padding: 0 auto;">
                        <?= common::get_bike_type(set_value('type_id', $b[type_id])) ?>
                    </select>
                    <div class="clear"></div>
                    <?= form_error('type_id', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
            </tr>



            <tr>
                <th valign="top">Make</th>
                <td>
                    <select name="company_id" class="jmake_step3" id="j_make_data2"><?= common::get_bike_make(set_value('company_id', $b[make_id])) ?></select>
                    <div class="clear"></div>
                    <?= form_error('company_id', '<span style="display:block;color:red;">', '</span>') ?></td>
                </td>
            </tr>

            <tr>
                <th valign="top">Model</th>
                <td>
                    <select name="model_id" class="jmodel_step3" id="j_model_data3" ><?= common::get_bike_model(set_value('model_id', $b[model_id])) ?></select>
                    <div class="clear"></div>

                </td>
            </tr>

            <tr>
                <th valign="top">Country *</th>
                <td>
                    <select class="jcountry jload_area2" name="country_id"><?= common::get_country_options(set_value('country_id', $b[country_id])) ?></select>
                    <div class="clear"></div>

                </td>
            </tr>


        </table>
        <table class="rajib_table_content" style="width:49%;float:left;">
            <tr>
                <th valign="top">Area *</th>
                <td>
                    <select class="select-style2 gender2 jarea" id="j_area_data2" name="area_id"><?= common::get_area(set_value('area_id', $b[area_id])) ?></select>
                    <div class="clear"></div>
                    <?= form_error('area_id', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
            </tr>
            <tr>
                <th valign="top">Post Code:</th>
                <td><input class="select-style2" type="text" name="post_code" size="30" value="<?= set_value('post_code', $b[post_code]) ?>"/> </td>
            </tr>
            <tr>
                <th valign="top">Currency *</th>
                <td>
                    <select name="currency"  class="select-style2" style="margin: 0 auto; padding: 0 auto;">
                        <option value="">Set Currency</option> 
                        <option <?php if ($b[currency] == 'Euro' || $_REQUEST['currency'] == 'Euro') { ?> selected="selected"<?php } ?> value="Euro">Euro €</option> 
                        <option <?php if ($b[currency] == 'GBP' || $_REQUEST['currency'] == 'GBP') { ?> selected="selected"<?php } ?>  value="GBP">GBP £</option> 
                    </select>
                    <div class="clear"></div>
                    <?= form_error('currency', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
            </tr>
            <tr>
                <th valign="top">Price:  * </th>
                <td><input type="text" name="price" size="30" class="select-style2 " value="<?= set_value('price', $b[price]) ?>"/>
                    <div class="clear"></div>
                    <?= form_error('price', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
            </tr>


            <tr>
                <th valign="top">Year: </th>
                <td>
                    <select name="year" class="select-style2 gender" ><?= common::get_year(set_value('year', $b[year])) ?></select>
                    <div class="clear"></div>
                </td>
            </tr>
            <tr>
                <th valign="top">Engine: </th>
                <td><input type="text" name="engine" size="30" class="select-style2 " value="<?= set_value('engine', $b[engine]) ?>"/> </td>
            </tr>
            <tr>
                <th valign="top">Hours: </th>
                <td><input type="text" name="hours"  size="30" class="select-style2 " value="<?= set_value('hours', $b[hours]) ?>"/>  </td>
            </tr>
            <tr>
                <th valign="top">Mileage: </th>
                <td><input style="width:100px;float:left;" type="text" name="mileage" size="30" class="select-style2 " value="<?= set_value('mileage', $b[mileage]) ?>"/>
                    <select style="width:90px;float:left;" name="mill_sign">
                        <option <?php if ($b[mill_sign] == 'kilometers' || $_REQUEST['mill_sign'] == 'kilometers') { ?> selected="selected"<?php } ?> value="kilometers">kilometers</option>
                        <option <?php if ($b[mill_sign] == 'miles' || $_REQUEST['mill_sign'] == 'miles') { ?> selected="selected"<?php } ?> value="miles">miles</option>
                    </select> 
                </td>
            </tr>


        </table>
        <div class="clear"></div>
        <style>
            .jqte{margin: 0}
        </style>
        <table class="rajib_table_content">
            <tr>
                <th valign="top" style="color:#fff; width: 80px; margin-top: 40px">Description  *</th>
                <td style="color:#fff; width: 650px"><textarea size="30" class="jqte-test" name="full_description" cols="100" rows="6"/><?= set_value('full_description', $b[full_description]) ?></textarea>
                    <div class="clear"></div>
                    <?= form_error('full_description', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
            </tr>
        </table>



    </div>

</div>
<div class="clear"></div>
<div style=" width: 200px; margin-left: auto; margin-right: auto; padding: 10px; color: #fff;">
    <input class="next_previous_button" type="button" class="button" name="cancel" value="< Back" onclick='window.history.back();'/>
    <input class="next_previous_button" type="submit" class="button"  name="update" value="Update"/>
</div>
</form>


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

