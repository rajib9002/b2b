<div style="position:relative;">
<form class="form_new_content" method="post" action="<?= site_url('adz/search_result'); ?>">
    <div class="input_bg float_left" style="margin-left: 115px;">
        <input type="text" name="search_text" value="<?= $_REQUEST['search_text'] ?>" />  
    </div>
    <div class="select_bg float_left" style="margin:0;">
        <input class="search_top" type="submit" name="top_search" value="Search"/> 
    </div>
</form>
<a style="position:absolute;left:0;top:0;height:40px;width:35px;" href="<?php echo site_url('adz/advanced_search')?>">&nbsp;</a>
</div>