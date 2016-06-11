
<div class="search_var_all">
    
</div>


<div class="clear"></div>

<div class="search_by_r">   

    <div class="title_all">
        <div class="des_r">
            <input type="hidden" value="<?= $this->session->userdata('order_type'); ?>" id="des_hidden_r"/>
            <a title="ad_title" href="javascript::void()">Description</a>
        </div>
        <div class="des_r2">
            <a title="ad_type" href="javascript::void()">Ads Type</a>
        </div>

        <div class="des_r2">
            <a title="year" href="javascript::void()">Year</a>
        </div>
        <div class="des_r2">
            <a title="seller_type" href="javascript::void()">Seller</a>
        </div>
        <div class="des_r2">
            <a title="area.area_name" href="javascript::void()">Location</a>
        </div>
        <div class="des_r2">
            <a title="engine" href="javascript::void()"> Engine</a>
        </div>
        <div class="des_r2">
            <a title="price" href="javascript::void()">Price</a>
        </div>
        <div class="des_r2" style="border-right:0;">
            <a title="time" href="javascript::void()">Hours</a>
        </div>
        <input type="hidden" class="ad_type" value="<?php echo $this->session->userdata('ad_type'); ?>">
        <input type="hidden" class="type_id" value="<?php echo $this->session->userdata('type_id'); ?>">
    </div>
</div>
<div class="clear"></div>
<div class="table_content">
    <table cellspacing="0" cellpadding="0" border="0">
        <?php
        $i = 0;
        if (count($rows) > 0):
            foreach ($rows as $row):
                $img = sql::row("bike_image", "bike_id=$row[bike_id] order by bike_image_id asc limit 0,1");
                ?>
                <tr <?php if ($i % 2 == 0) { ?> class="even1"<?php } else { ?> class="odd1" <?php } ?>>
                    <td style="width:200px;font-size:13px;margin:0;border-right:1px solid #eee;">
                        <a href="<?php echo site_url('adz/details/' . $row['bike_id']); ?>"><img src="<?php echo base_url() . 'uploads/bike_image/thumbs/' . $img['bike_image']; ?>" alt="<?= $row['model_name'] ?>"  width="140px" height="70px"/></a>
                        <div class="clear"></div>
                        <a href="<?php echo site_url('adz/details/' . $row['bike_id']); ?>"><?= substr($row['ad_title'], 0, 20) ?></a>
                    </td>
                    <td style="width:103px;font-size: 13px;margin:0;border-right:1px solid #eee;">
                        <?php
                        if ($row['ad_type'] == 1) {
                            echo 'For Sale';
                        } else if ($row['ad_type'] == 2) {
                            echo 'Wanted';
                        }
                        ?>
                    </td>
                    <td style="width:103px;font-size: 13px;margin:0;border-right:1px solid #eee;">
                        <?php
                        if ($row['year'] == '') {
                            echo '&nbsp';
                        }
                        ?><?= $row['year'] ?>
                    </td>
                    <td style="width:103px;font-size: 13px;margin:0;border-right:1px solid #eee;">
                        <?php
                        if ($row['seller_type'] == 1) {
                            echo 'Private';
                        } else {
                            echo 'Trade';
                        }
                        ?>
                    </td>
                    <td style="width:104px;font-size: 13px;margin:0;border-right:1px solid #eee;">
                        <?php
                        if ($row['area_id'] > 0) {
                            $area = common :: get_area_name($row['area_id']);
                        }
                        ?>
                        <div title="<?= $area ?>"><?php echo substr($area, 0, 20); ?></div>
                    </td>
                    <td style="width:103px;font-size:13px;margin:0;border-right:1px solid #eee;">
                        <?php
                        if ($row['engine'] == '') {
                            echo '&nbsp';
                        }
                        ?> <?= $row['engine'] ?>
                    </td>
                    <td style="width:103px;font-size: 13px;margin:0;border-right:1px solid #eee;">
                        <?php
                        if ($row['currency'] == "Euro") {
                            echo '&euro;' . ' ';
                        } else {
                            echo '&pound;' . ' ';
                        }
                        ?><?= number_format($row['price']) . '<br/>' ?><?php
                if ($row['currency'] == "Euro") {
                    echo 'Euro';
                } else {
                    echo 'GBP';
                }
                        ?>
                    </td>
                    <td style="width:103px;font-size: 13px;margin:0;">
                        <?= common::get_hours($row['time']); ?>
                    </td>
                </tr>
                <?php
                $i++;
            endforeach;
            ?>
        <?php else : ?>
            <div class="noContent">Sorry! No Content Found. Please try another.</div>
        <?php endif; ?>
    </table>
</div>






