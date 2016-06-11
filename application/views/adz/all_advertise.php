<script type="text/javascript">
    function hidden_normal_bg(){
        $j('.title_all').hide();
        $j('.table_content').hide();
        $j('.p_view_btn').hide();

        $j('.normal_view_btn').show();
        $j('.new_title').show();
        $j('.table_content_photo_view').show();
    }
    function hidden_photo_bg(){
        $j('.title_all').show();
        $j('.table_content').show();
        $j('.p_view_btn').show();

        $j('.normal_view_btn').hide();
        $j('.new_title').hide();
        $j('.table_content_photo_view').hide();
    }

</script>




<script>
    $(function(){
        $("#pagination-div-id a").click(function(){
            $.ajax({
                type: "POST",
                beforeSend: function() {
                    $('.loader').html("<div style='margin:0 auto;width:100px;height:40px;'><img style='margin:0 auto;width:36px;height:36px;' src='img/loading.gif'></div>");
                },
                url: $(this).attr("href"),
                data:"q=<?php echo $searchString; ?>",
                success: function(res){
                    $("#containerid").html(res);
                }
            });
            return false;
        });
    });

    function per_page_data_ajax2() {
         
        var howmany2 = $j('#howmany2').val();
        //alert(howmany2);
       
        $j.ajax({
            type: 'POST',
            url: base_url + 'adz/all_advertise',
            data: {
                howmany2: howmany2
            },
            success: function(html) {
                //alert('Time Updated Successfully');
                location.reload();
            },
            error: function(e, m, s)
            {
                alert(e + m + s);
            }
        });
    }
</script>

<?php
$country_id = $this->session->userdata('country_id');
$area_id = $this->session->userdata('area_id');
$t_id = $this->session->userdata('t_id');
$make_id = $this->session->userdata('make_id');
$model_id = $this->session->userdata('model_id');
?>
<div class="clear"></div>

<div class="search_var_all">
    <form class="form_new_content" method="post" action="<?= site_url('adz/all_advertise'); ?>">
        <span class="float_left">
            <b style="font-size: 12px;">Country</b> <select style="width: 120px" class="select-style2 gender3 jload_area" name="country_id"><?= common::get_country_options($country_id) ?></select>
        </span>
        <span class="float_left">
            <b style="font-size: 12px;">Area &nbsp;</b><select style="width: 110px" class="select-style2 gender3 jarea" id="j_area_data" name="area_id"><?= $this->mod_adz->get_area_options($country_id, $area_id) ?></select>
        </span>
        <span class="float_left">
            <b style="font-size: 12px;">Type &nbsp;</b><select style="width: 120px" class="select-style2 gender3 jtype_step3 jtype_step3_new" name="type_id"><?= common::get_bike_type($t_id) ?></select>
        </span>
        <span class="float_left">
            <b style="font-size: 12px;">Make</b> &nbsp;<select style="width: 120px" class="select-style2 gender3 jmake_step3" id="j_make_data2" name="make_id"><?= common::get_bike_make_all($make_id) ?></select>
        </span>
        <span class="float_left">
            <b style="font-size: 12px;">Model</b> &nbsp;<select style="width: 120px" class="select-style2 gender3 jmodel_step3" id="j_model_data3" name="model_id"><?= common::get_bike_model($model_id) ?></select>
        </span>

        <span class="float_left">
            <input class="search_top" style="margin-top: 8px;" type="submit" value="SEARCH" name="search"/>
        </span>
    </form>
</div>


<div class="clear"></div>

<div class="search_by_r">

    <!--    <div class="new_title" style="display:none;">
            <div class="des_r" style="text-align:left;">
                <p style="text-align:left;color:red;font-family: arial;font-size: 16px;padding:9px 12px;">Photo view of advertisement</p>
            </div>
        </div>-->



    <div class="title_all">
        <div class="des_r">
            <input type="hidden" value="<?= $this->session->userdata('order_type'); ?>" id="des_hidden_r"/>
            <a id="des" title="ad_title" href="javascript::void()">Description</a>
        </div>
        <div class="des_r2">
            <a id="mileage" title="ad_type" href="javascript::void()">Ads Type</a>
        </div>

        <div class="des_r2">
            <a id="year" title="year" href="javascript::void()">Year</a>
        </div>
        <div class="des_r2">
            <a id="seller_type" title="seller_type" href="javascript::void()">Seller</a>
        </div>
        <div class="des_r2">
            <a id="location" title="area_id" href="javascript::void()">Location</a>
        </div>
        <div class="des_r2">
            <a id="engine" title="engine" href="javascript::void()"> Engine</a>
        </div>
        <div class="des_r2">
            <a id="price" title="price" href="javascript::void()">Price</a>
        </div>
        <div class="des_r2" style="border-right:0;">
            <a id="hours" title="time" href="javascript::void()">Hours</a>
        </div>
        <input type="hidden" class="ad_type" value="<?php echo $this->session->userdata('ad_type'); ?>">
        <input type="hidden" class="type_id" value="<?php echo $this->session->userdata('type_id'); ?>">
    </div>





</div>
<div class="clear"></div>



<div class="loader"></div>

<div class="table_content">
    <table cellspacing="0" cellpadding="0" border="0">
        <?php
        $i = 0;
        if (count($rows) > 0):
            foreach ($rows as $row):
            
            $tab_name=$row[table_name].'_image';
            
                $img = sql::row("$tab_name", "bike_id=$row[bike_id] order by bike_image_id asc limit 0,1");
                ?>
                <tr <?php if ($i % 2 == 0) { ?> class="even1"<?php } else { ?> class="odd1" <?php } ?>>
                    <td style="width:200px;font-size:13px;margin:0;border-right:1px solid #eee;">
                        <a href="<?php echo site_url('adz/details/'.$row['table_name'].'/' . $row['bike_id']); ?>"><img src="<?php echo base_url() . 'uploads/bike_image/t_' . $img['bike_image']; ?>" alt="<?= $row['model_name'] ?>"  width="140px" height="70px"/></a>
                        <div class="clear"></div>
                        <a href="<?php echo site_url('adz/details/'.$row['table_name'].'/' . $row['bike_id']); ?>"><?= substr($row['ad_title'], 0, 20) ?></a>
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




<div class="table_content_photo_view"  style="display:none;">
    <div style="background-color: #eee;">
        <?php
        $i = 0;
        if (count($rows) > 0):
            foreach ($rows as $row):
                $img = sql::row("bike_image", "bike_id=$row[bike_id] order by bike_image_id asc limit 0,1");
                ?>

                <div style="float:left;width:2000px;padding-bottom:10px;" <?php if ($i % 2 == 0) { ?> class="photo_even"<?php } else { ?> class="photo_odd" <?php } ?>>
                    <a href="<?php echo site_url('adz/details/' . $row['bike_id']); ?>"><img style="margin:10px auto;width:70px;height:70px;border:1px solid gray;" src="<?php echo base_url() . 'uploads/bike_image/thumbs/' . $img['bike_image']; ?>" alt="<?= $row['model_name'] ?>"  width="140px" height="70px"/></a>
                    <div class="clear"></div>
                    <a href="<?php echo site_url('adz/details/' . $row['bike_id']); ?>"><?= substr($row['ad_title'], 0, 20) ?></a>

                </div>
                <?php
                $i++;
            endforeach;
            ?>
            <div class="clear"></div>
        <?php else : ?>
            <div class="noContent">Sorry! No Content Found. Please try another.</div>
        <?php endif; ?>
    </div>
    <div class="clear"></div>
</div>

<br/>

<?php
$x = $this->session->userdata('howmany2');
 if ($x == '')
        $x = 8;
?>

  <?php
    if (count($rows) > 8) {
        ?>
<div>Show <select id="howmany2" name="howmany2" onchange="per_page_data_ajax2();">
        <option value="8" <?php if ($x == 8)
    echo "selected" ?>> 8 </option>
        <option value="16" <?php if ($x == 16)
                echo "selected" ?>> 16 </option>
        <option value="24" <?php if ($x == 24)
                echo "selected" ?>> 24 </option>
        <option value="32" <?php if ($x == 32)
                echo "selected" ?>> 32 </option></select>
    Ads</div>
<?php } ?>




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





