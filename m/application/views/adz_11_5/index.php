<div class="total">
    <div class="clear"></div>
    <?php
    if ($_REQUEST['top_search'] != '') {
        ?> 
        <div class="search_result_header margin-bottom_10">
            <h2 style="color:#000;">             
                <span>
                    <?php
                    if ($_REQUEST['top_search'] != '')
                        echo 'Found ' . "<b>" . $total . "</b>" . " Ads in  " . "<b>" . $_REQUEST['search_text'] . "</b>";
                    ?>
                </span>
            </h2>
        </div>
    <?php } ?>
    <br/>
    <div class="loader"></div>
    <div class="search_result margin-bottom_10">
        <?php
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
            <div class="noContent">Sorry! No Content Found. Please try another.</div>
        <?php endif; ?>
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
</div>



