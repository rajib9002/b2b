<div class="total">
    <div class="clear"></div>
    <?php
    if ($_REQUEST['top_search'] != '') {
        ?>
        <div class="search_result_header margin-bottom_10">
            <h2 style="color:#000;">
                <span>
                    <?php
                    if ($_REQUEST['top_search'] != '') {
                        $keywords = $_REQUEST['search_text'];
                    }
                    ?>
                </span>
            </h2>
        </div>
    <?php } ?>
    <br/>
    <div class="loader"></div>
    <div class="search_result margin-bottom_10">
        <?php foreach ($main_cat as $main) { ?>

            <?php
            $t_name = $main['table_name'];
            if ($keywords != '') {
                $con = " and type.type_name like '%$keywords%'  OR  make.make_name like '%$keywords%'  OR  model.model_name like '%$keywords%'  OR  country.country_name like '%$keywords%' OR  $t_name.year like '%$keywords%' OR  $t_name.full_description like '%$keywords%'  OR  $t_name.ad_title like '%$keywords%'";
            }
            $sql = $this->db->query("select $t_name.*, type.type_name, model.model_name, make.make_name, area.area_name, country.country_name
                from $t_name
                left join type on type.type_id=$t_name.type_id
                 left join model on model.model_id=$t_name.model_id
                 left join make on make.make_id=$t_name.make_id
                 left join country on country.country_id=$t_name.country_id
                 left join area on area.area_id=$t_name.area_id
               where bike_status=1 $con  order by $t_name.bike_id desc");
            $rows = $sql->result_array();
            if (count($rows) > 0) {
                ?>
                <h4 style="padding:10px;color:#000;background-color:#eee;margin:10px 0;"><?php echo $main['type_name'] ?></h4>
                <div class="clear"></div>
                <?php
            }
            $i = 0;
            if (count($rows) > 0):
                foreach ($rows as $row):
                    $tab_name = $t_name . '_image';
                    $img = sql::row("$tab_name", "bike_id=$row[bike_id] order by bike_image_id asc limit 0,1");
                    ?>
                    <div class="r_box_iphone float_left">
                        <?php
                        if ($img['bike_image'] != '') {
                            $bike_image = $img['bike_image'];
                        } else {
                            $bike_image = 'default.jpg';
                        }
                        ?>
                        <div style="width: 128px;margin:6px auto 0px auto;">
                            <a href="<?php echo site_url('adz/details/' . $t_name . '/' . $row['bike_id']); ?>"><img  src="<?php echo base_url() . '../uploads/bike_image/' . $bike_image; ?>" alt="<?= $row['model_name'] ?>" height="140" /></a>
                            <div class="clear"></div>
                            <span class="l_text" style="display: inline; font-weight: normal; font-size: 12px; color: #2462a3;width:43%;float:left;">
                                <?= $row['make_name'] ?>
                                <div class="clear"></div>
                                <?= $row['model_name'] ?>
                            </span>
                            <span  class="r_text" style="width:48%;float:right;text-align:right;margin-right:0px;">
                                <p style="margin:0;padding:0;">
                                    <?php
                                    if ($row['currency'] == "Euro") {
                                        echo '&euro;' . number_format($row['price'], 0);
                                    } else {
                                        echo '&pound;' . number_format($row['price'], 0);
                                    }
                                    ?>
                                </p>
                                <?php if ($row['ad_type'] == 1) { ?>
                                    <img src="img/for_sale.png"  style="width: 60px;margin: 0;height: 17px;"/>
                                <?php }
                                ?>
                                <?php if ($row['ad_type'] == 2) { ?>
                                    <img src="img/for_wanted.png"  style="width: 60px;margin: 0;height: 17px;"/>
                                <?php }
                                ?>
                            </span> 
                            <div class="clear"></div>
                            <span style="font-size:10px;color:gray;display: inline;"><img style="height:14px;" src="img/time.png"> <?= common::get_hours($row['time']); ?></span>
                            <span style="font-size:10px;color:gray;float: right;"><img style="height:14px;" src="img/location.png"><?= $row['area_name'] ?></span>

                        </div>

                        <div class="clear"></div>
                    </div>




                    <?php
                    $i++;
                endforeach;
                ?>
            <?php else : ?>
                <!--<div class="noContent">Sorry! No Content Found. Please try another.</div>-->
            <?php endif; ?>
            <div class="clear"></div>  
            <?php
        }
        ?>






        <div class="clear"></div>

        <br/>
    </div>
</div>


