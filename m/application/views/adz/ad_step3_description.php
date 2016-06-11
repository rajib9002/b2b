<div class="step2_upper">
    <h2>Step 4 :  Content of Ad</h2>
</div>

<form id="valid_adz" action="<?= $action ?>" method="post" enctype="multipart/form-data" />
<div  class="content" style="background-color:#fff;padding:20px 20px 5px 20px;width:280px;margin:10px auto;">

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
       <!--  <table class="rajib_table_content" style="width:25%;float:left;">


            <tr><td style="color:#fff; font-size: 20px; text-align: center; margin-left: 5px;"><span><?= $type_info['type_name'] ?> </span> &nbsp; &nbsp;</td></tr>

            <tr>
                <td>
                    <input type="hidden" value="<?= $type_id ?>"/>                    
                    <img src="<?= UPLOAD_PATH ?>/bike_type_image/<?php echo $type_info['type_image'] ?>" width="200px" height="200px" style="border: 3px solid #eee;"/>
                    <div class="clear"></div>                    
                    <div class="clear"></div>
                   <span>

                        <a href="<?= site_url('adz/step2'); ?>"> Click here to change</a>
                    </span>
                </td>

            </tr>

        </table>
        -->
        <table class="rajib_table_content" style="width:100%;float:left; margin-top: 10px">
            <tr><td>&nbsp;</td></tr>
            <tr>
                <th valign="center" style="text-align: center;color:#000;">Type * </th></tr><tr>
                <td>
                    <?php $parent_id = $this->session->userdata('parent_type_id'); ?>
                    <select name="type_id"  class="select-style2 gender2" style="margin: 0 auto; padding: 0 auto;">
                        <?= common::get_bike_type_respect_parent($parent_id) ?></select>
                    <div class="clear"></div>
                    <?= form_error('type_id', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
            </tr>
        </table>
        <div class="clear"></div>
        <div style="padding:30px 0;">

            <span style="float:left; margin-left: 5px;">
                <a class="next_previous_button" href="" onclick='window.history.back();'>
                    < Previous Step
                </a>
            </span>
            <span  style="float:right; margin-right: 5px;">
                <input  class="next_previous_button" type="submit" name="save_description" value="Next Step >"/>
            </span>
            <div class="clear"></div>
        </div>

    </div>

</div>



</form>



