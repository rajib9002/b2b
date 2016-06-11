<div class="clear"></div>
<div class="search_result_header margin-bottom_10">
    <h2 style="font-size: 18px;">My Posted Ads</h2>
</div>
<div class="clear"></div>
<div class="loader"></div>
<div class="clear"></div>
<div class="search_result margin-bottom_10">
    <?php
    if ($msg != '') {
        echo "<div class='success'>" . $msg . "</div>";
    }
    ?>




    <?php //foreach ($main_cat as $main) { ?>
    <?php
    //$user_id = $this->session->userdata('user_id');
    // $t_name = $main['table_name'];
    // $rows = sql::rows("$t_name", "user_id='$user_id'");
    ?>

    <?php
    $i = 0;
    if (count($rows) > 0):
        foreach ($rows as $row):
            $t_name = $row[table_name];
            $tab_name = $row[table_name] . '_image';

            //print_r($row);
            $img = sql::row("$tab_name", "bike_id=$row[bike_id] order by bike_image_id asc limit 0,1");
            ?>
            <div class="p_box float_left" style="margin-top: 10px; height: 215px;">
                <a href="adz/edit_my_adz/<?= $row['table_name'] ?>/<?= $row['bike_id'] ?>" title="Edit Ad">
                    <img src="img/edit.png" style="height: 16px; width: 16px;"/>
                </a>
                <a style="margin-top:3px;" onclick="return confirm('Are You sure to delete?')" href="adz/delete_adz/<?= $row['bike_id'] ?>/<?= $row['table_name'] ?>" title="Delete Ad">

                    <img src="img/delete.jpg" style="float: right;height: 16px; width: 16px;"/>

                </a>
                <?php
                if ($img['bike_image'] != '') {
                    $bike_image = $img['bike_image'];
                } else {
                    $bike_image = 'default.jpg';
                }
                ?>
                <a href="<?php echo site_url('adz/details/' . $t_name . '/' . $row['bike_id']); ?>"><img src="<?php echo base_url() . 'uploads/bike_image/t_' . $bike_image; ?>" alt="<?= $row['model_name'] ?>"  style="margin-top:0;width:162px; height:110px" /></a>

                <div class="clear"></div>


                <span class="l_text" style="width:80px; display: inline"><?= substr($row['type_name'], 0, 10) ?></span>
                <span  <?php if ($row['ad_type'] == '1') { ?> class="round_shape" <?
                } if
                ($row['ad_type'] == '2') {
                    ?> class="round_shape2" <? } ?> style="float: right; margin-top: -8px"><p><?= common :: get_ad_type_name($row['ad_type']) ?></p></span>
                <span  class="r_text">
                    <?php
                    if ($row['currency'] == "Euro") {
                        echo '&euro;' . ' ';
                    } else {
                        echo '&pound;' . ' ';
                    }
                    echo number_format($row['price'])
                    ?>

                </span>


                <div class="clear"></div>
                <span style="font-size:8px;color:gray;"><img src="img/p_icon.png"><?= date('m/d/Y', strtotime($row['time'])) ?></span>
                <span style="font-size:8px;color:gray;float: right;"><img src="img/area_icon.png"><?= $row['area_name'] . ', ' . $row['country_name'] ?></span>
                <div class="clear"></div>
            </div>
            <?php
            $i++;
        endforeach;
        ?>


    <?php else : ?>
        <div class="noContent">Sorry! No Content Found. Please try another.</div>
    <?php endif; ?>

    <?php //} ?>
    <div class="clear"></div>
    <br/>
    <?php
    if ($pagination_links) {
        ?>

        <div class="paginationTwo" id="pagination-div-id">
            <?php echo $pagination_links; ?>
        </div>

        <?php
    }
    ?>



    <br/>
</div>

<div class="clear"></div> <div class="clear"></div>

<div class="search_result_header margin-bottom_10">
    <h2 style="font-size: 18px">My Saved Ads</h2>
</div>

<div class="search_result margin-bottom_10">
    <?php
    if ($msg != '') {
        echo "<div class='success'>" . $msg . "</div>";
    }
    ?>

    <?php
    $i = 0;
    if (count($save_rows) > 0):
        foreach ($save_rows as $row):
            //print_r($row);
            $tab_name = $t_name . '_image';
            $img = sql::row("$tab_name", "bike_id=$row[bike_id] order by bike_image_id asc limit 0,1");
            ?>
            <div class="p_box float_left" style="margin-top: 10px; height: 190px;">

                <?php
                if ($img['bike_image'] != '') {
                    $bike_image = $img['bike_image'];
                } else {
                    $bike_image = 'default.jpg';
                }
                ?>
                <a href="<?php echo site_url('adz/details/' . $t_name . '/' . $row['bike_id']); ?>"><img src="<?php echo base_url() . 'uploads/bike_image/t_' . $bike_image; ?>" alt="<?= $row['model_name'] ?>"  style="margin-top:10;width:162px; height:110px" /></a>

                <div class="clear"></div>


                <span class="l_text" style="width:80px; display: inline"><?= substr($row['type_name'], 0, 10) ?></span>
                <span  <?php if ($row['ad_type'] == '1') { ?> class="round_shape" <?
                } if
                ($row['ad_type'] == '2') {
                    ?> class="round_shape2" <? } ?> style="float: right; margin-top: -8px"><p><?= common :: get_ad_type_name($row['ad_type']) ?></p></span>
                <span  class="r_text">
                    <?php
                    if ($row['currency'] == "Euro") {
                        echo '&euro;' . ' ';
                    } else {
                        echo '&pound;' . ' ';
                    }
                    echo number_format($row['price'])
                    ?>

                </span>


                <div class="clear"></div>
                <span style="font-size:8px;color:gray;"><img src="img/p_icon.png"><?= date('m/d/Y', strtotime($row['time'])) ?></span>
                <span style="font-size:8px;color:gray;float: right;"><img src="img/area_icon.png"><?= $row['area_name'] . ', ' . $row['country_name'] ?></span>
                <div class="clear"></div>
            </div>
            <?php
            $i++;
        endforeach;
        ?>


    <?php else : ?>
        <div class="noContent">Sorry! No Content Found. Please try another.</div>
    <?php endif; ?>

    <br/>
</div>








