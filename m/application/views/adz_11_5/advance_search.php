<div class="content_m">
    <?php
    if ($msg != '') {
        echo "<div class='success'>" . $msg . "</div>";
    }
    ?>
    <form id="form" action='<?= site_url($action); ?>' method='post'>
        <?php
        if ($msg != '') {
            echo "<div class='error'>" . $msg . "</div>";
        }
        ?>
        <select name="ad_type_ad">
            <option value="1" <?php if ($_REQUEST[ad_type_ad] == '1') echo 'selected'; ?>>
                For Sale
            </option>
            <option value="2" <?php
            if ($_REQUEST[ad_type_ad] == '2')
                echo 'selected';
            ?>>
                Wanted
            </option>
        </select>
        <select name="seller_type_ad">
            <option value="1" <?php if ($_REQUEST[seller_type_ad] == '1') echo 'selected'; ?>>
                Private
            </option>
            <option value="2" <?php if ($_REQUEST[seller_type_ad] == '2') echo 'selected'; ?>>
                Trade
            </option>
        </select>
        <select class="jcountry jload_area2"  name="country_id_ad"><?= common::get_country_options($country_id) ?></select>
        <select class="select-style2 gender2 jarea" id="j_area_data2" name="area_id_ad"><?= $this->mod_adz->get_area_options($country_id, $area_id) ?></select>
        <select class="jtype_step3"  name="type_id_ad"><?= common::get_bike_type($t_id) ?></select>
        <select class="select-style2 gender2 jmake"  id="j_make_data2" name="make_id_ad"><?= common::get_bike_make($make_id) ?></select>
        <select class="jmodel_step3" id="j_model_data3"  name="model_id_ad"><?= common::get_bike_model($model_id) ?></select>
        <input placeholder="Post Code" class="select-style2" type="text" name="post_code" size="30" value="<?= $_REQUEST['post_code'] ?>"/>
        <div style="width:100%;">
            <input style="width: 100px;float:left;" placeholder="Price from" type="text" name="from_price" size="30" value="<?= $_REQUEST['from_price'] ?>"/>  
            <input style="width: 100px;float:right;" placeholder="Price to" type="text" name="to_price" size="30" value="<?= $_REQUEST['to_price'] ?>"/>
        </div>
        <div class="clear"></div>
        <div style="width:100%;">
            <input style="width: 100px;float:left;" placeholder="Mileage from" class="select-style2" type="text" name="from_mileage" size="30" value="<?= $_REQUEST['from_mileage'] ?>"/> 
            <input  style="width: 100px;float:right;" placeholder="Mileage to" class="select-style2" type="text" name="to_mileage" size="30" value="<?= $_REQUEST['to_mileage'] ?>"/>
        </div>
        <div class="clear"></div>
        <div style="width:100%;">
            <input style="width: 100px;float:left;"  placeholder="Hours from" class="select-style2" type="text" name="from_hours" size="30" value="<?= $_REQUEST['from_hours'] ?>"/> 
            <input style="width: 100px;float:right;"  placeholder="Hours to" class="select-style2" type="text" name="to_hours" size="30" value="<?= $_REQUEST['to_hours'] ?>"/>  
        </div>
        <div class="clear"></div>
        <div style="width:100%;">
            <input style="width: 100px;float:left;"  placeholder="Engine from" class="select-style2" type="text" name="from_engine" size="30" value="<?= $_REQUEST['from_engine'] ?>"/>
            <input  style="width: 100px;float:right;" placeholder="Engine to" class="select-style2" type="text" name="to_engine" size="30" value="<?= $_REQUEST['to_engine'] ?>"/></td>
        </div>
        <div class="clear"></div>
        <div style="width:100%;">
            <select style="width: 100px;float:left;"  name="from_year" class="select-style2 gender" ><?= common::get_year($_REQUEST['from_year']) ?></select>
            <select style="width: 100px;float:right;" name="to_year" class="select-style2 gender" ><?= common::get_year($_REQUEST['to_year']) ?></select>
        </div>
        <div class="clear"></div>
        
        
        
        <div class="button_p_n">
            <input  class="next_button"  type='submit' value="SEARCH" name="advanced_search"/>
            <div class="clear"></div>
        </div>

        
        
        <div class="clear"></div>
    </form>
</div>