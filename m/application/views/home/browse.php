<div class="clear"></div>
<script src="script/navAccordion.min.js"></script>
<script>
        jQuery(document).ready(function(){
            //Accordion Nav
            jQuery('.mainNav').navAccordion({
                expandButtonText: '<i class="fa fa-plus"></i>',  //Text inside of buttons can be HTML
                collapseButtonText: '<i class="fa fa-minus"></i>'
            });
        });
    </script>

<nav class="mainNav">
    <ul>
        <?php
        $type_rows = sql::rows('main_type', 'type_status =1');
        if (count($type_rows) > 0) {
            foreach ($type_rows as $trow) {
                $counter1=0;
                if ($trow['type_image'] != '') {
                    $type_image = $trow['type_image'];
                } else {
                    $type_image = 'default.jpg';
                }

                $counter1=sql::count("$trow[table_name]","bike_status=1");

                ?>
        <li><a href="#">
                <img style="vertical-align:middle;" src="<?= UPLOAD_PATH ?>/bike_type_image/<?php echo $type_image ?>" width="40" height="30"/>
                        <?= $trow['type_name'] ?><span style="float:right;padding-top: 9px;"><?php echo $counter1;?></span>
            </a>
            <ul>
                <li><a href="<?=site_url('adz/catlist/'.$trow[table_name]);?>">Search All <span style="float:right;padding-top: 9px;"><?php echo $counter1;?></span></a>
                <li><a href="#">Make</a>
                    <ul>
                                <?php
                                $sql = $this->db->query("select model.*, make.make_name  from model
                left join make on make.make_id=model.make_id
                where main_type_id='$trow[main_type_id]' group by model.make_id order by make.make_name asc");
                                $c_rows= $sql->result_array();

                                if (count($c_rows) > 0) {
                                    foreach ($c_rows as $crow) {
                                        $counter2=0;
                                        ?>
                        <li><a href="<?=site_url('adz/adlist/'.$trow[table_name].'/'.$field_name='make_id'.'/'.$crow['make_id']);?>"> <?php
                                                $counter2=sql::count("$trow[table_name]","bike_status=1 and make_id='$crow[make_id]'");
                                                echo $crow['make_name'] ?>
                                <span style="float:right;padding-top: 9px;margin-right: 25px;"><?php echo $counter2;?></span>
                            </a> </li>
                                        <?php }
                                } ?>
                    </ul>
                </li>
                <li><a href="#">Type</a>
                    <ul>
                                <?php
                                $sub_rows = sql::rows('type', "type_status =1 and main_type_id=$trow[main_type_id]");
                                if (count($sub_rows) > 0) {
                                    foreach ($sub_rows as $srow) {
                                        $counter3=0;
                                        if ($srow['type_image'] != '') {
                                            $type_image = $trow['type_image'];
                                        } else {
                                            $type_image = 'default.jpg';
                                        }
                                        ?>
                        <li><a href="<?=site_url('adz/adlist/'.$trow[table_name].'/'.$field_name='type_id'.'/'.$srow['type_id']);?>">
                                                <?php
                                                $counter3=sql::count("$trow[table_name]","bike_status=1 and type_id='$srow[type_id]'");

                                                echo $srow['type_name'];

                                                ?>
                                <span style="float:right;padding-top: 9px;margin-right: 25px;"><?php echo $counter3;?></span>

                            </a>
                        </li>
                                        <?php }
                                } ?>
                    </ul>
                </li>
            </ul>
        </li>
                <?php }
        } ?>
    </ul>
</nav> 
