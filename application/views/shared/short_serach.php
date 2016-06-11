<script type="text/javascript">
    jQuery(document).ready(function(){
        $j('.search_value').change(function(){
            var ad_type=$j('.ad_type').val();
            var type_id=$j('.type_id').val();
            var search_val=$j('.search_value').val();           
            var keywords_val=$j('.jkeywords').val();
           
            if(search_val==null || search_val==''){
                search_val='bike_id';
            } 
            window.location.href=base_url+'adz/index/'+ad_type+'/'+type_id+'/'+search_val+'/';
        });
    });
</script>


<div class="mid_found_body">
    <div class="text_left">
        <?
            $search_title=' ads ';
            if($_POST['keywords']!='')
            {
               
                $search_title.=' "'. $_POST['keywords']. '"  ';
            }
            if($_POST['type_id']!='')
            {
                $type_name=common :: get_bike_type_name($_POST['type_id']);
                $search_title.='for '.$type_name;
            }
             if($_POST['area_id']!='')
            {
                $area_name=common :: get_area_name($_POST['area_id']);
                $search_title.= ' in '.$area_name;
            }
             if($_POST['company_id']!='')
            {
                $company_name=common :: get_bike_company_name($_POST['company_id']);
                $search_title.=' made by '.$company_name;
            }
             if($_POST['model_id']!='')
            {
                $model_name=common :: get_bike_model_name($_POST['model_id']);
                $search_title.=' of '.$model_name . ' model';;
            }
            
                
        ?>
        <h1>FOUND : <a href="#"><?=$total?></a><?=$search_title;?></h1>
<!--        <a href="#"><div class="hide_pic"></div></a>-->
    </div>
    <div class="text_right">
<!--        <div class="email_alart">
            <span class="e_pic"></span>
            <a href="#">Email alart for this search</a>
        </div>-->
        <div class="clear"></div>
        <div class="short_search">
            <div class="shor_txt">
                <h1 style="text-align: center; width: 100px;">Sort By:</h1>
            </div>
            <div class="short_search_click">
                <form class="search_click" method="post">
                    <select class="select-style3 gender3 search_value" name="search_value" id="search_value">
                        <?php
                            $order=$this->session->userdata('order_by');
                        ?>
                        <option value="" >Select</option>
                       
                        <option value="year"  <?php if($order=='year' ): ?> selected="selected"<?php endif; ?>/>Year</option>
                        <option value="price" <?php if($order=='price' ): ?> selected="selected"<?php endif; ?>/>Price</option>
                        <option value="hours" <?php if($order=='hours' ): ?> selected="selected"<?php endif; ?>/>Hours</option>
                    
                    </select>
                    
                    