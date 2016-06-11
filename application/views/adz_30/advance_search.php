
<div class="content" style="background-color:#376388;padding:20px 40px;width:90%;border-radius: 5px;margin:20px auto;">
    <h2 style="font-size: 20px">Search Anything</h2>
    <div class='form_content' style="width:100%;">
        <?php
        if ($msg != '') {
            echo "<div class='success'>" . $msg . "</div>";
        }
        ?>

        <form id="form" action='<?= site_url('adz/advance_result'); ?>' method='post'>
            <?php
            if ($msg != '') {
                echo "<div class='error'>" . $msg . "</div>";
            }
            ?>
            <table class="rajib_table_content" style="width:45%;float:left;">

                <tr>
                    <th valign="top">Ad type :</th>
                    <td style="color:#fff">
                        <input style="width:10px" type="radio" name="ad_type_ad" value="1"/>  For Sale
                        <input style="width:10px" type="radio" name="ad_type_ad" value="2" /> Wanted
                    </td>
                </tr>


                <tr>
                    <th valign="top"><b>Type of seller :</b></th>
                    <td style="color:#fff">
                        <input style="width:10px" type="radio" name="seller_type_ad" value="1"/>Private
                        <input style="width:10px" type="radio" name="seller_type_ad" value="2" />Trade
                    </td>
                </tr>



                <tr>
                    <th valign="top">Country:</th>
                    <td>
                        <select class="jcountry jload_area2" style="width: 200px" name="country_id_ad"><?= common::get_country_options($country_id) ?></select>
                    </td>
                </tr>

                <tr>
                    <th valign="top">Area:</th>
                    <td>
                        <select class="select-style2 gender2 jarea" id="j_area_data2" style="width: 200px" name="area_id_ad"><?= $this->mod_adz->get_area_options($country_id, $area_id) ?></select>
                    </td>
                </tr>

                <tr>
                    <th valign="top">Type:</th>
                    <td>
                        <select class="jtype_step3" style="width: 200px" name="type_id_ad"><?= common::get_bike_type($t_id) ?></select>
                    </td>
                </tr>

                <tr>
                    <th valign="top">Make:</th>
                    <td>
                        <select class="select-style2 gender2 jmake" style="width: 200px" id="j_make_data2" name="make_id_ad"><?= common::get_bike_make($make_id) ?></select>
                    </td>
                </tr>

                <tr>
                    <th valign="top">Model:</th>
                    <td>
                        <select class="jmodel_step3" id="j_model_data3" style="width: 200px"  name="model_id_ad"><?= common::get_bike_model($model_id) ?></select>
                    </td>
                </tr>  

            </table>




            <table class="rajib_table_content" style="width:55%;float:left;">
                <tr><th>&nbsp;</th><td>&nbsp;</td></tr>
                <tr>
                    <th style="text-align: right; padding: 0">Post Code :</th>
                    <td><input style="width:140px" class="select-style2" type="text" name="post_code" size="30" value="<?= $_REQUEST['post_code'] ?>"/> </td>

                    <td>&nbsp;</td>
                </tr>


                <tr>
                    <th valign="center" style="text-align: right; padding: 0">Price : </th>
                    <td><input style="width:140px" class="select-style2" type="text" name="from_price" size="30" value="<?= $_REQUEST['from_price'] ?>"/>  </td>
                    <td><input style="width:140px" class="select-style2" type="text" name="to_price" size="30" value="<?= $_REQUEST['to_price'] ?>"/></td>
                </tr>

                <tr>
                    <th valign="center" style="text-align: right; padding: 0">Mileage : </th>
                    <td><input style="width:140px" class="select-style2" type="text" name="from_mileage" size="30" value="<?= $_REQUEST['from_mileage'] ?>"/> </td>
                    <td>  <input style="width:140px" class="select-style2" type="text" name="to_mileage" size="30" value="<?= $_REQUEST['to_mileage'] ?>"/> </td>
                </tr>

                <tr>
                    <th valign="center" style="text-align: right;padding: 0">Hours : </th>
                    <td><input style="width:140px" class="select-style2" type="text" name="from_hours" size="30" value="<?= $_REQUEST['from_hours'] ?>"/> </td>
                    <td><input style="width:140px" class="select-style2" type="text" name="to_hours" size="30" value="<?= $_REQUEST['to_hours'] ?>"/>  </td>

                </tr>




                <tr>
                    <th valign="center" style="text-align: right;padding: 0">Engine : </th>
                    <td><input style="width:140px" class="select-style2" type="text" name="from_engine" size="30" value="<?= $_REQUEST['from_engine'] ?>"/></td>
                    <td>  <input style="width:140px" class="select-style2" type="text" name="to_engine" size="30" value="<?= $_REQUEST['to_engine'] ?>"/></td>
                </tr>
                <tr>
                    <th valign="center" style="text-align: right;padding: 0">Year: </th>
                    <td>
                        <select style="width:140px" name="from_year" class="select-style2 gender" ><?= common::get_year($_REQUEST['from_year']) ?></select></td>
                    <td><select style="width:140px" name="to_year" class="select-style2 gender" ><?= common::get_year($_REQUEST['to_year']) ?></select>
                    </td>
                </tr>

                <tr>
                    <th>&nbsp; </th>
                    <td>&nbsp;</td>
                    <td> <input style="background-color: #ffc206;color:#000;border:1px solid transparent;width:85px;font-weight:bold;font-size:14px;font-family:Raleway;border-radius: 5px;height:30px; text-align: center" type='submit' value="SEARCH" name="advanced_search"/></td>

                </tr>

            </table>
            <div class="clear"></div>
            <div class="spacer"></div>
        </form>
    </div>
</div>


