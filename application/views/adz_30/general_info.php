<!--<link type="text/css" rel="stylesheet" href="tools/jQueryTE/demo/demo.css">-->
<!--<link type="text/css" rel="stylesheet" href="tools/jQueryTE/jquery-te-1.4.0.css">
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript" src="tools/jQueryTE/jquery-te-1.4.0.min.js" charset="utf-8"></script>-->


<div class="step2_upper">
    <h2>Step 5: General Info</h2>
</div>


<form id="valid_adz" action="<?= $action ?>" method="post" enctype="multipart/form-data" >

    <div class="content" style="background-color:#376388;padding:20px 40px;border-radius: 5px;margin:20px auto 20px auto;">

        <div class='form_content' style="width:100%;">
            <?php
            if ($msg != '') {
                echo "<div class='success'>" . $msg . "</div>";
            }
            ?>


            <?php
            if ($msg != '') {
                echo "<div class='error'>" . $msg . "</div>";
            }
            ?>
            <table class="rajib_table_content" style="width:45%;float:left;">

                <tr>
                    <th valign="top" style="text-align: right">Country *</th>
                    <td>
                        <select class="select-style2 gender2 jcountry jload_area2" name="country_id" style="width: 200px"><?= common::get_country_options($_REQUEST['country_id']) ?></select>
                        <div class="clear"></div>
                        <?= form_error('country_id', '<span style="display:block;color:red;">', '</span>') ?>
                    </td>
                </tr>
                <tr>
                    <th valign="top" style="text-align: right">Area *</th>


                    <td>
                        <select class="select-style2 gender2 jarea" id="j_area_data2" name="area_id" style="width: 200px"><?= common::get_area($_REQUEST['area_id']) ?></select>
                        <div class="clear"></div>
                        <?= form_error('area_id', '<span style="display:block;color:red;">', '</span>') ?>
                    </td>

                </tr>
                <tr>
                    <th valign="top" style="text-align: right">Post Code</th>

                    <td><input class="select-style2" type="text" name="post_code" size="30" style="width: 200px" value="<?= $_REQUEST['post_code'] ?>"/> </td>
                </tr>
                <tr>
                    <th valign="top" style="text-align: right">Currency * </th>
                    <td>
                        <select name="currency"  class="select-style2" style="margin: 0 auto; padding: 0 auto; width: 200px">
                            <option value="">Set Currency</option> 
                            <option value="Euro" <?php if ($_REQUEST[Euro]) { ?> selected="selected"<?php } ?>>Euro €</option> 
                            <option value="GBP" <?php if ($_REQUEST[GBP]) { ?> selected="selected"<?php } ?>>GBP £</option> 
                        </select>
                        <div class="clear"></div>
                        <?= form_error('currency', '<span style="display:block;color:red;">', '</span>') ?>
                    </td>
                </tr>
                <tr>
                    <th valign="top" style="text-align: right">Price * </th>
                    <td><input type="text" name="price" size="30" class="select-style2 " style="width: 200px" value="<?= $_REQUEST['price'] ?>"/>
                        <div class="clear"></div>
                        <?= form_error('price', '<span style="display:block;color:red;">', '</span>') ?>
                    </td>
                </tr>
            </table>
            <table class="rajib_table_content" style="width:55%;float:left;">

                <tr>  
                    <td>
                        <!--class="jqte-test"-->
                        <textarea style="width:440px;height:178px;"  name="full_description"><?= $_REQUEST['full_description'] ?></textarea>
                        <div class="clear"></div>
                        <?= form_error('full_description', '<span style="display:block;color:red;">', '</span>') ?>
                    </td>

                </tr>

            </table>


            <div class="clear"></div>



        </div>

    </div>

    <div class="clear"></div>
    <span class="prev_step">
        <input  class="next_previous_button" type="submit" onclick="history.back(-1)" value="< Previous Step"/>

    </span>
    <span  class="next_step">
        <input  class="next_previous_button" type="submit" name="save" value="Next Step >"/>
    </span>

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






<!--
﻿<div class="search_by_r">
    <p>Place Ad : General Info</p>
</div>
<div class="clear"></div>

<div class="content">

<?php
if ($msg != '') {
    echo "<div class='success'>" . $msg . "</div>";
}
?>

    <form id="valid_adz" action="<?= $action ?>" method="post" enctype="multipart/form-data">


        <table class="rajib_table_content">
            <tr>

                <th valign="top">Country :</th>
                <td>
                    <select class="select-style2 gender2 jcountry jload_area2" name="country_id"><?= common::get_country_options($_REQUEST['country_id']) ?></select>
                    <div class="clear"></div>
                    <span> <?= form_error('country_id', '<span style="display:block;color:red;">', '</span>') ?></span>
                </td>

            </tr>
            <tr>
                <th valign="top">Area<span style="color: red;">*</span> :</th>
                <td>
                    <select class="select-style2 gender2 jarea" id="j_area_data2" name="area_id"><?= common::get_area($_REQUEST['area_id']) ?></select>
                    <div class="clear"></div>
<?= form_error('area_id', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
            </tr>

            <tr>
                <th valign="top">Post Code:</th>
                <td><input class="select-style2" type="text" name="post_code" size="30" value="<?= $_REQUEST['post_code'] ?>"/> </td>

            </tr>


            <tr>
                <th valign="top">Currency<span style="color: red;">*</span> :</th>
                <td>
                    <select name="currency"  class="select-style2" style="margin: 0 auto; padding: 0 auto;">
                        <option value="">Set Currency</option> 
                        <option value="Euro">Euro €</option> 
                        <option value="GBP">GBP £</option> 
                    </select>
                    <div class="clear"></div>
<?= form_error('currency', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
            </tr>

            <tr>
                <th valign="top">Price: <span style="color: red;">*</span> </th>
                <td><input type="text" name="price" size="30" class="select-style2 " value="<?= $_REQUEST['price'] ?>"/>
                    <div class="clear"></div>
<?= form_error('price', '<span style="display:block;color:red;">', '</span>') ?>
                </td>

            </tr>

            <tr>
                <th valign="top">Description:<span style="color: red;">*</span></th>
                <td><textarea size="30" id="content"  class="select-style2 gender"  name="full_description" cols="100" rows="6"><?= $_REQUEST['full_description'] ?></textarea>
                    <div class="clear"></div>
<?= form_error('full_description', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
            </tr>

        </table>
        <br/>
        <input type="button" style="margin-left: 14px;float:left;" class="button" name="cancel" value="Previous Step" onclick='window.history.back();'/>
        <input type="submit" style="margin-right: 14px;float:right;" name="save" class="button" value="Next Step"/>


        <div class="clear"></div>
    </form>
</div>-->
