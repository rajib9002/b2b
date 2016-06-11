<? $inc = 0 ?>
<script type="text/javascript">
    var inc=1;
    function add_more_picture(){
        var new_pictures="<tr>"+
            "<th>Bike Image</th><td><input class='input_style float_left' type='file' name='image_"+inc+"'/><input type='hidden' name='pro_serial[]' value='' id='pr_serial_"+inc+"'/></td>"+
            "</tr>";
        $j('#picture').append(new_pictures);
        
        inc++;
        return false;
    }
</script>

<div class="content">

    <?php
    if ($msg != '') {
        echo "<div class='success'>" . $msg . "</div>";
    }
    ?>

    <form id="valid_adz" action="<?= $action ?>" method="post" enctype="multipart/form-data" />
    <fieldset >
        <legend>Type of Ad</legend>
        <table>
            <tr>
                <th>Ad type<span style="color: red;">*</span> :</th>
                <td>
                    <select name="ad_type" class="select-style2 gender2" value="<?= $_REQUEST['ad_type'] ?>">
                        <option value="">Select Ad Type</option>
                        <option value="1" <?php
    if ($_REQUEST['ad_type'] == 1) {
        echo "selected='selected'";
    }
    ?> />For Sale</option>
                        <option value="2" <?php
                                if ($_REQUEST['ad_type'] == 2) {
                                    echo "selected='selected'";
                                }
    ?>>Wanted</option>
                    </select>
                    <?= form_error('ad_type', '<span>', '</span>') ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Choose Your Location</legend>
        <table>
            <tr>

                <th>Country :</th>
                <td>
                    <select class="select-style2 gender2 jcountry jload_area2" name="country_id"><?= common::get_country_options(set_value('country_id', $country_id)) ?></select>
                </td>
                <th>Area<span style="color: red;">*</span> :</th>
                <td>
                    <select class="select-style2 gender2 jarea" id="j_area_data2" name="area_id"><?= common::get_area($_REQUEST['area_id']) ?></select>
                    <span><?= form_error('area_id', '<span>', '</span>') ?></span>
                </td>
                <th>Location:</th>
                <td><input class="select-style2" type="text" name="location" size="30" value="<?= set_value('location', $location) ?>"/> </td>


            </tr>
        </table>
    </fieldset>


    <fieldset>
        <legend>Bike Details</legend>
        <table>
            <tr>
                <th>Type<span style="color: red;">*</span> :</th>
                <td>
                    <select name="type_id"  class="select-style2 gender2" style="margin: 0 auto; padding: 0 auto;"><?= common::get_bike_type($_REQUEST['type_id']) ?></select>
                <td><?= form_error('type_id', '<span>', '</span>') ?></td>
                </td>

                <th>Make:</th>
                <td>
                    <select name="company_id" class="select-style2 gender"><?= common::get_bike_company($_REQUEST['company_id']) ?></select>

                </td>
                <th>Model<span style="color: red;">*</span> :</th>
                <td>
                    <select name="model_id" class="select-style2 gender" ><?= common::get_bike_model($_REQUEST['model_id']) ?></select>
                    <?= form_error('model_id', '<span>', '</span>') ?>
                </td>
            </tr>
        </table>
    </fieldset>


    <fieldset>
        <legend>Detailed Description</legend>
        <table>
            <tr>
                <th>Year: </th>
                <td>
                    <select name="year" class="select-style2 gender" ><?= common::get_year($_REQUEST['year']) ?></select>
                    <?= form_error('year', '<span>', '</span>') ?>
                </td>
            </tr>
            <tr>
                <th>Engine: </th>
                <td><input type="text" name="engine" size="30" class="select-style2 " value="<?= set_value('engine', $engine) ?>"/> </td>
            </tr><tr>
                <th>Hours: </th>
                <td><input type="text" name="hours"  size="30" class="select-style2 " value="<?= set_value('hours', $hours) ?>"/>  </td>
            </tr><tr>
                <th>Mileage: </th>
                <td><input type="text" name="mileage" size="30" class="select-style2 " value="<?= set_value('mileage', $mileage) ?>"/> </td>
            </tr>
            <tr>
                <th>Price: <span style="color: red;">*</span> </th>
                <td><input type="text" name="price" size="30" class="select-style2 " value="<?= set_value('price', $price) ?>"/>
                    <?= form_error('price', '<span>', '</span>') ?></td>
            </tr>


            <tr>
                <th valign="top">Description <span style="color: red;">*</span></th>
                <td><textarea size="30"  class="select-style2 gender"  name="full_description" cols="100" rows="6"/><?= set_value('full_description', $full_description) ?></textarea>
                    <?= form_error('full_description', '<span>', '</span>') ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Multimedia</legend>

        <table  id="picture">
            <tbody>
                <tr>
                    <th>Bike Video :</th>
                    <td> <input type="file" name="video_name">
                        <input type="hidden" name="h_video" value="<?= $bike_video ?>" id="h_video"/>
                    </td>
                </tr>
                <tr>


                <tr>
                    <th>Bike Image: </th>
                    <td><input type="file" name="image_<?= $inc ?>" value=""/>
                        <input type="hidden" name="h_image_<?= $inc ?>" value=""/>
                        <input type="hidden" name="pro_serial[]" id="pr_serial_<?= $inc ?>" value=""/>
                    </td>
                </tr>

                <?= form_error('image_0', '<span>', '</span>') ?>
                </td>
            <td>
                <a  href="javascript:void(0)" onclick="return add_more_picture()"><b>Add More Picture</b></a><br/>
            </td>
            </tr>

            </tbody>
        </table>

    </fieldset>
    <?php if ($this->session->userdata('user_id') == '') { ?>
        <fieldset>
            <legend>Seller Information</legend>
            <table>
                <tr>
                    <th>Seller Name:<span style="color: red;">*</span></th>
                    <td><input class="select-style2" type="text" name="seller_name" size="30" value="<?= $_REQUEST['seller_name'] ?>"/> 
                        <?= form_error('seller_name', '<span>', '</span>') ?></td>
                </tr>
                <tr>
                    <th valign="top">Seller Address </th>
                    <td><textarea size="35"  class="select-style2 gender"  name="seller_address" cols="100" rows="6"/><?= $_REQUEST['seller_address'] ?></textarea>

                    </td>
                </tr>
                <tr>
                    <th>Username:<span style="color: red;">*</span></th>
                    <td><input class="select-style2" type="text" name="user_name" size="30" value="<?= set_value('user_name', $user_name) ?>"/> 
                        <?= form_error('user_name', '<span>', '</span>') ?></td>
                </tr>
                <tr>
                    <th>Password:<span style="color: red;">*</span></th>
                    <td><input class="select-style2 " type="password" name="user_password" size="30" value="<?= set_value('user_password', $user_password) ?>"/> 
                        <?= form_error('user_password', '<span>', '</span>') ?></td>
                </tr>
            </table>
        </fieldset>
    <?php } ?>

    <div class="clear"></div>

    <div style=" width: 200px; margin-left: auto; margin-right: auto; padding: 10px;">
        <input type="button"  class="button" name="cancel" value="Cancel" onclick='window.history.back();'/>
        <input type="submit"  name="save" class="button" value="Save"/>
    </div>

    <div class="clear"></div>
</form>
</div>
