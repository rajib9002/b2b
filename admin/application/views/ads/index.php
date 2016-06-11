<div class='form_content'>
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    
    <?php 
    $table_name=$this->session->userdata('table_name');
    if($table_name==''){
        $table_name='road_bikes';
    }
    ?>
    
    <form action='<?= site_url('ads/index/'.$table_name); ?>' method='post'>
        <table cellpadding=0 cellspacing=1>
            <tbody>
                <tr><th>Type</th>
                    <td><select name="type_id" class='text ui-widget-content ui-corner-all width_150' /><?= common::get_bike_type($_REQUEST['type_id']) ?></select></td>

                    <th>Area</th>

                    <td><select name="area_id" class='text ui-widget-content ui-corner-all width_150'><?= common::get_area($_REQUEST['area_id']) ?></select></td>
                </tr>
                <tr>
                    <th>Make</th>

                    <td><select name="make_id" class='text ui-widget-content ui-corner-all width_150' ><?= common::get_bike_make($_REQUEST['make_id']) ?></select></td>

                    <th>Model</th>
                    <td><select name="model_id" class='text ui-widget-content ui-corner-all width_150'><?= common::get_bike_model($_REQUEST['model_id']) ?></select></td>
                </tr>
                <tr>
                    <th colspan="2">&nbsp;</th>
                    <td><input type='submit' name='search' value='Search' class="button" /> </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<div class="clear"></div>
<div style="margin:20px 0 20px 20px;">
    <?php
    $main_type_all = sql::rows("main_type", "1");
    foreach ($main_type_all as $m) {
        ?>
        <a style="border:1px solid #000;padding:10px 20px;text-align: center;<?php if($table_name=="$m[table_name]"){?>background-color:#eee;<?php }else{?>background-color:#fff; <?php }?>color:#000;margin:30px 0;" href="<?php echo site_url('ads/index/' . $m[table_name]); ?>">
       
            <?php echo $m['type_name'] ?>
            <span> (
                <?php
                $counter_info = sql::count("$m[table_name]", "is_confirm_ad=1");
                echo $counter_info;
                $counter_info = '';
                ?>
                ) 
            </span>
        </a>
    <?php } ?>
</div>
<div class="clear"></div>

<div class="grid_area">
    <?php
    if ($msg != ''):
        echo '<div class="success">' . $msg . '</div>';
    endif;
    ?>
    <div class="tooolbars">     
        <button  id="add" title="ads/delete_ads" class="jdelete_button">Delete</button>
        <button title="ads/ads_status/1" class="jstatus_button">Show</button>
        <button title="ads/ads_status/2" class="jstatus_button">Make Waiting</button>
        <button title="ads/ads_status/0" class="jstatus_button">Blocked</button>
    </div>
    <hr />
    <?php
    echo $grid_data;
    ?>
</div>
<div class="clear"></div>
