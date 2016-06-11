<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>script/jquery.snipe.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css"/>
<link type="text/css" rel="stylesheet" href="styles/example.css"/>

<style>
    table.rajib_table_content_de tr td {
        text-align: left;
        padding-left: 10px;
    }
</style>

<?php
$post_id = $details_row['bike_id'];
?>



<div style="float:left;margin:0;padding:0 10px;">

    <script type="text/javascript">
        $(function(){
            $('#demo1').snipe({
                bounds: [10,-10,-10,10]
            });
            $('#snipe').snipe({
                bounds: [10,-10,-10,10]
            });
                    
        });
                
    </script>

    <style>
        .thums_style { margin-left: -40px; margin-top:-2px;margin-bottom: 2px;}
        .thums_style li{ list-style-type: none; width: 70px; border: 1px solid bisque; float: left;}
        #photoGal{border: 1px solid  #cfcfcf; width: 100%; height: 280px;}
        #photoGal img{width: 100%;height: 280px;}
    </style>
    <?php
    $imgages = sql::rows("bike_image", "bike_id=$details_row[bike_id] order by bike_image_id asc");
    if ($imgages[0]['bike_image'] != '') {
        $bike_image = $imgages[0]['bike_image'];
    } else {
        $bike_image = 'default.jpg';
    }
    ?>
    <div id="photoGal">
        <img src="<?= UPLOAD_PATH ?>/bike_image/thumbs/<?php echo $bike_image ?>" data-zoom="<?= UPLOAD_PATH ?>/bike_image/large/<?php echo $bike_image ?>"  id="snipe" />
    </div>

    <ul style="margin:0 0 5px -3px;" id="thumblist" class="clearfix">
    </ul>

    <div id="thumbs">
        <ul class="thums_style">
            <?php
            $i = 1;
            foreach ($imgages as $img) {
                ?>
                <li><a><img class="element isotope-item"    src="<?php echo UPLOAD_PATH ?>/bike_image/thumbs/<?php echo $img['bike_image'] ?>" data-zoom="<?php echo UPLOAD_PATH ?>/bike_image/large/<?php echo $img['bike_image'] ?>" height="50px" width="70px" /></a></li>
                <?php
                $i++;
                if ($i > 5)
                    break;
            }
            ?>
            <div class="clear"></div>    
        </ul>
    </div>


    <script type="text/javascript">
        $j('li a img').on("click" , function(){   
            $('#photoGal img').remove();
            var source = $(this).attr('src');
            var dataSource = $(this).attr('data-zoom');
            var tag = $(this).attr('class');
            console.log(tag);
            $('#photoGal').html('<img src=" ' + source + '" data-zoom=" ' + dataSource + '" id="snipe" />');
            $('#snipe').snipe({
                bounds: [10,-10,-10,10]
            });
        });
    </script>

    <div class="clear"></div>
    <br/>
</div>




<div style="width:100%;float:left; background: #ebebeb; padding: 0 10px;"> 

    <div style="width:95%;background-color: #fff; margin: 10px;padding-bottom: 15px;"> 

        <h1 style="font-family:Raleway; font-size: 20px; padding: 10px;">
            <?= substr($details_row['ad_title'], 0, 20) ?>
        </h1>
        <span  class="price_box" style="min-width:150px; margin-bottom: 10px;margin-left: 10px">
            <?php
            if ($row['currency'] == "Euro") {
                echo '&euro;' . $details_row['price'];
            } else {
                echo '&pound;' . $details_row['price'];
            }
            ?>  

        </span> 
        <span style="font-size:18px;color:gray;  margin-left: 10px; float: right; margin-right: 50px;"><img src="img/location.png" width="20" height="20">
            <?php
            if ($details_row['area_id'] != '')
                echo common :: get_country_name($details_row['area_id']);
            ?>
        </span>
    </div>

    <div style="background-color: #fff; margin: 3px 10px 10px 10px;padding: 5px 15px;"> 

        <span style="font-size:15px;color:gray; "><img src="img/time.png" width="20" height="20" />
            <?= common::get_hours($details_row['time']); ?>
        </span>
        <span style="font-size:15px;color:gray; "><img src="img/view.png" width="20" height="20" />
            725 Views
        </span>
        <span style="font-size:15px;color:gray; "><img src="img/people.png" width="20" height="20" />
            <?= common :: get_ad_type_name($details_row['ad_type']) ?>
        </span>
    </div>



</div>





<div style="width:100%;float:left; background: #ebebeb; margin-bottom: 20px; padding: 0 10px;"> 

    <div style="width:95%;background-color: #fff; margin: 0px 10px 10px 10px;padding-bottom: 15px;"> 

        <h1 style="font-size:15px;color:gray; padding: 10px">
            Key Info
        </h1>

          <?php if ($details_row['company_id'] != '') { ?>
        <span style="font-size:15px;color:gray;  margin-left: 10px; ">
            Make : <?= common :: get_bike_company_name($details_row['company_id']) ?>
        </span>
         <?php } ?>
          <?php if ($details_row['model_id'] != '') { ?>
        <span style="font-size:15px;color:gray;  margin-left: 10px; ">
            Model :  <?= common :: get_bike_model_name($details_row['model_id']) ?>
        </span>
           <?php } ?>
        <span style="font-size:15px;color:gray;  margin-left: 10px; ">
            Year :    <?= $details_row['year'] ?>
        </span>
    </div>



</div>

<div class="clear"></div>
