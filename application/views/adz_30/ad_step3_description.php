
<div class="step2_upper">
    <h2>Step 4 : Place Ad : Content of Ad</h2>
</div>

<form id="valid_adz" action="<?= $action ?>" method="post" enctype="multipart/form-data" />
<div class="content" style="background-color:#376388;padding:20px 40px;width:90%;border-radius: 5px;margin:20px auto 50px auto;">

    <div class='form_content' style="width:100%;">
        <?php
        if ($msg != '') {
            echo "<div class='success'>" . $msg . "</div>";
        }
        ?>


        <?
        $type_id = $this->session->userdata('parent_type_id');
        $type_info = sql::row('type', "type_id='$type_id'");
        ?>
        <?php
        if ($msg != '') {
            echo "<div class='error'>" . $msg . "</div>";
        }
        ?>
        <table class="rajib_table_content" style="width:25%;float:left;">


            <tr><td style="color:#fff; font-size: 20px; text-align: left; margin-left: 5px;"><span><?= $type_info['type_name'] ?> </span> &nbsp; &nbsp;</td></tr>

            <tr>
                <td>
                    <input type="hidden" value="<?= $type_id ?>"/>                    
                    <img src="<?= base_url() ?>uploads/bike_type_image/<?php echo $type_info['type_image'] ?>" width="200px" height="220px" style="border: 3px solid #eee;"/>
                    <div class="clear"></div>                    
                    <div class="clear"></div>
<!--                    <span>

                        <a href="<?= site_url('adz/step2'); ?>"> Click here to change</a>
                    </span>-->
                </td>

            </tr>

        </table>

        <table class="rajib_table_content" style="width:72%;float:left; margin-top: 10px">
            <tr><td>&nbsp;</td></tr>
            <tr>
                <th valign="center" style="text-align: right">Type * </th>
                <td>
                    <?php $parent_id = $this->session->userdata('parent_type_id'); ?>
                    <select name="type_id"  class="select-style2 gender2" style="margin: 0 auto; padding: 0 auto;">
                        <?= common::get_bike_type_respect_parent($parent_id) ?></select>
                    <div class="clear"></div>
                    <?= form_error('type_id', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
                <td> &nbsp;</td>
            </tr>
        </table>



        <div class="clear"></div>



    </div>

</div>

<div style="margin-bottom: 50px;">

    <span style="text-align:left; margin-left: 20px; margin-top: 20px">
        <a class="next_previous_button" href="" onclick='window.history.back();'>
            < Previous Step
        </a>
    </span>
    <span  style="float:right; margin-right: 20px">        
        <input  class="next_previous_button" type="submit" name="save_description" value="Next Step >"/>
    </span>
</div>

</form>








<!--
<div class="content">

<?php
if ($msg != '') {
    echo "<div class='success'>" . $msg . "</div>";
}
?>

    <form id="valid_adz" action="<?= $action ?>" method="post" enctype="multipart/form-data" />
<?
$type_id = $this->session->userdata('parent_type_id');
$type_info = sql::row('type', "type_id='$type_id'");
?>

    <fieldset style="width: 960px;">
        <legend>Place Ad : Content of Ad</legend>
        <table class="rajib_table_content" style="width: 750px;">
            <tr>
                <th>Selection<span style="color: red;">*</span> :</th>
            <input type="hidden" value="<?= $type_id ?>" />
            <td><img src="<?= base_url() ?>uploads/bike_type_image/<?php echo $type_info['type_image'] ?>" width="80px" height="50px"/>
                <span><?= $type_info['type_name'] ?> </span> &nbsp; &nbsp; <span> <a href="<?= site_url('adz/step2'); ?>"> Click here to change</a></span>
            </td>

            </tr>

            <tr>
                <th valign="top">Type<span style="color: red;">*</span> :</th>
                <td>
<?php $parent_id = $this->session->userdata('parent_type_id'); ?>
                    <select name="type_id"  class="select-style2 gender2" style="margin: 0 auto; padding: 0 auto;">
<?= common::get_bike_type_respect_parent($parent_id) ?></select>
                    <div class="clear"></div>
<?= form_error('type_id', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
            </tr>
        </table>
        <br/>
        <input type="button" style="margin-left: 100px;" class="button" name="cancel" value="Previous Step" onclick='window.history.back();'/>
        <input type="submit" style="margin-left: 430px;" name="save_description" class="button" value="Next Step"/>
    </fieldset>


    <div class="clear"></div>
</form>
</div>-->
