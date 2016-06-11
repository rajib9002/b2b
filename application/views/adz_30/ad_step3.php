<div class="step2_upper">
    <h2>Step 4 : Place Ad : Content of Ad</h2>
</div>
<form id="valid_adz" action="<?= $action ?>" method="post" enctype="multipart/form-data" >
    <div class="content step_content">
        <?php
        if ($msg != '') {
            echo "<div class='error'>" . $msg . "</div>";
        }
        ?>
        <?
        $type_id = $this->session->userdata('parent_type_id');
        $type_info = sql::row('main_type', "main_type_id='$type_id'");
        ?>

        <table class="rajib_table_content" style="width:25%;float:left;">


            <tr><td>&nbsp;</td></tr>
            <tr><td style="color:#fff; font-size: 20px; text-align: left; margin-left: 5px;"><span><?= $type_info['type_name'] ?> </span> &nbsp; &nbsp;</td></tr>

            <tr>
                <td>
                    <input type="hidden" value="<?= $type_id ?>"/>
                    <img src="<?= base_url() ?>uploads/bike_type_image/<?php echo $type_info['type_image'] ?>" width="170px" height="175px" style="border: 3px solid #eee;"/>
                    <div class="clear"></div>
                    <div class="clear"></div>
<!--                    <span>

                        <a href="<?= site_url('adz/step2'); ?>"> Click here to change</a>
                    </span>-->
                </td>

            </tr>

        </table>

        <table class="rajib_table_content" style="width:72%;float:left;">
            <tr><th>&nbsp;</th><td>&nbsp;</td></tr>
<!--            <tr>
                <th valign="center" style="text-align: right">Type * </th>
                <td>
            <?php //$parent_id = $this->session->userdata('parent_type_id'); ?>
                    gender2 jtype_step3
                    <select name="type_id"  class="select-style2 jtype_step3_new" style="margin: 0 auto; padding: 0 auto;">
            <? //= common::get_bike_type_respect_parent($parent_id, $_REQUEST['type_id']) ?></select>
                    <div class="clear"></div>
            <? //= form_error('type_id', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th valign="center" style="text-align: right">Make *</th>
                <td>
                     
                    <select  class="jmake_step3" id="j_make_data2" name="company_id"><?= common::get_bike_make($_REQUEST['company_id']) ?></select>
            <? //= form_error('company_id', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
                <td>&nbsp;</td>
            </tr>-->



            <?php $parent_id = $this->session->userdata('parent_type_id'); ?>
            <?php
            $sql = $this->db->query("select model.*, make.make_name
                from model
                left join make on make.make_id=model.make_id
                where main_type_id='$parent_id' group by model.make_id order by make.make_name asc");
            $c_rows = $sql->result_array();
            ?>
            <tr>
                <th valign="center" style="text-align: right">Make *</th>
                <td>
                    <select name="company_id"  class="select-style2 gender2 jmake_step3" id="j_make_data2">
                        <option value=''>select Make</option>
                        <?php
                        foreach ($c_rows as $m_data) {
                            echo "<option value='$m_data[make_id]'>$m_data[make_name]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>








            <tr>
                <th valign="center" style="text-align: right">Model *</th>
                <td>
                    <select name="model_id" class="jmodel_step3" id="j_model_data3">

                    </select>
                    <?= form_error('model_id', '<span>', '</span>') ?>
                </td>
                <td>&nbsp;</td>
            </tr>

            <tr style="display: none" id="model_name">
                <th valign="center" style="text-align: right">Model Name *</th>
                <td><input type="text" name="model_name"   size="30" class="select-style2 " value="<?= $_REQUEST['model_name'] ?>"/>  </td>
                <td>&nbsp;</td>
            </tr>



            <tr>
                <th valign="center" style="text-align: right">Year *</th>
                <td>
                    <select name="year" class="" ><?= common::get_year($_REQUEST['year']) ?></select>
                    <div class="clear"></div>
                    <?= form_error('year', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th valign="center" style="text-align: right">Hours </th>
                <td><input type="text" name="hours"  size="30" class="select-style2 " value="<?= $_REQUEST['hours'] ?>"/>  </td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <th valign="center" style="text-align: right">Engine </th>
                <td><input type="text" name="engine" size="30" class="select-style2 " value="<?= $_REQUEST['engine'] ?>"/> </td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <th valign="center" style="text-align: right">Mileage </th>
                <td><input style="float:left;" type="text" name="mileage" size="30" class="select-style2 " value="<?= $_REQUEST['mileage'] ?>"/></td>
                <td>

                    <select style="width: 120px;" name="mill_sign"><option value="kilometers">kilometers</option><option value="miles">miles</option></select>

                </td>

            </tr>
        </table>
        <div class="clear"></div>
    </div>

    <div class="clear"></div>
    <span class="prev_step">
        <input  class="next_previous_button" type="submit" onclick="history.back(-1)" value="< Previous Step"/>

    </span>
    <span  class="next_step">
        <input  class="next_previous_button" type="submit" name="save" value="Next Step >"/>
    </span>
</form>



