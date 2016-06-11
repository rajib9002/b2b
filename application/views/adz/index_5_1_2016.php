<div class="clear"></div>
<div class="search_result_header margin-bottom_10">
    <h2> 
        <?php
        if ($this->session->userdata('top_search') != '')
            if ($_REQUEST['type_id_top'] != '') {
                echo common::get_bike_type_name($this->session->userdata('type_id_top'));
            } if ($this->session->userdata('search_text') != '') {
            echo " : " . $this->session->userdata('search_text');
        }
        ?>
        <span>
            <?php
//            if ($this->session->userdata('type_id_top') != '' || $this->session->userdata('advanced_search')  != '')
                echo $total . " Items";
            ?>
        </span>
    </h2>
</div>

<div class="clear"></div>
<div class="loader"></div>
<div class="search_result margin-bottom_10">
    <?php
    $i = 0;
    if (count($rows) > 0):
        foreach ($rows as $row):
            //print_r($row);
            $img = sql::row("bike_image", "bike_id=$row[bike_id] order by bike_image_id asc limit 0,1");
            ?>
            <div class="p_box float_left">
                <?php
                if ($img['bike_image'] != '') {
                    $bike_image = $img['bike_image'];
                } else {
                    $bike_image = 'default.jpg';
                }
                ?>
                <a href="<?php echo site_url('adz/details/' . $row['bike_id']); ?>"><img src="<?php echo base_url() . 'uploads/bike_image/thumbs/' . $bike_image; ?>" alt="<?= $row['model_name'] ?>" width="260" height="220" /></a>

                <div class="clear"></div>
                <span class="l_text" style="width:80px; display: inline"><?= substr($row['type_name'], 0, 10) ?></span>
                <span  <?php if ($row['ad_type'] == '1') { ?> class="round_shape" <? } if ($row['ad_type'] == '2') { ?> class="round_shape2" <? } ?> style="float: right; margin-top: -8px"><p><?= common :: get_ad_type_name($row['ad_type']) ?></p></span>
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

    <div class="clear"></div>
    <br/><br/>    
    
    <?php
    if ($pagination_links) { 
        ?>

        <div class="paginationTwo" id="pagination-div-id">
        <?php echo $pagination_links; ?>
        </div>

            <?php
        }
        ?>

    <br/><br/>
</div>



