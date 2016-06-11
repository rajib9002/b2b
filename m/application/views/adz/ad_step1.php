<script type="text/javascript">
    $j(document).ready(function () {
        var text_max = 20;
        var text_length = $j('#textarea').val().length;
        var text_remaining = text_max - text_length;
        $j('#textarea_feedback').html(text_remaining + ' characters remaining');
        $j('#textarea').keyup(function () {
            var text_length = $j('#textarea').val().length;
            var text_remaining = text_max - text_length;
            $j('#textarea_feedback').html(text_remaining + ' characters remaining');
        });
    });


function load_new_type(obj){

var main_t_id=obj;
 $j.ajax({
            type:'POST',
            url:base_url+'adz/load_new_type',
            data:{
                main_t_id:main_t_id
            },
            success:function(html){
                $j('.jt_id').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });

}

</script>
<div class="content_m">
    <form action='<?= $action ?>' method='post'  class="form_content_bike2biker" >
        <select name="main_type_id" onchange="load_new_type(this.value);">
            <?= common::get_bike_main_type($session_array['main_type_id']) ?>
        </select>
        <?= form_error('main_type_id', '<span style="color:red;">', '</span>') ?>
        

<!--
<select name="type_id_new" class="jt_id">

<?php// if($session_array['type_id_new']!=''){?>            
<?//= common::load_new_type($session_array['type_id_new'],$session_array['main_type_id']) ?>
<?php //}else{?>

<option value=''>Select Type</option>
<?php //}?>
        </select>
<?//= form_error('type_id_new', '<span style="color:red;">', '</span>') ?>

-->








<select name="ad_type">
            <option value="1" <?php if ($session_array[ad_type] == '1') echo 'selected'; ?>>
                For Sale
            </option>
            <option value="2" <?php
            if ($session_array[ad_type] == '2')
                echo 'selected';
            ?>>
                Wanted
            </option>
        </select>
        <?= form_error('ad_type', '<span>', '</span>') ?>


        <!--<select name="seller_type">
            <option value="1" <?php
            //if ($session_array[seller_type] == '1')
               // echo 'selected';
            ?>>
                Private
            </option>
            <option value="2" <?php
            //if ($session_array[seller_type] == '2')
              //  echo 'selected';
            ?>>
                Trade
            </option>
        </select>-->
        <?//= form_error('seller_type', '<span>', '</span>') ?>


        <!--
        <input style="margin-bottom:3px;" id="textarea"  placeholder="Brief Description*" name="ad_title" maxlength="20" value="<?= set_value('ad_title', $session_array['ad_title']) ?>"/>
        <span style="color:blue;font-size:10px;text-align:left;font-family:arial;" id="textarea_feedback"></span>
-->

        <?//= form_error('ad_title', '<span>', '</span>') ?>
        <div class="button_p_n">
            <input  class="previous_button" type="submit" onclick="history.back(-1)" value="Previous"/>
            <input  class="next_button" type="submit" name="save" value="Next"/>
            <div class="clear"></div>
        </div>

    </form>
    <div class="clear"></div>
</div>