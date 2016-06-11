<form class="form_new_content" method="post" action="<?= site_url('adz/search_result'); ?>">
    <div class="input_bg float_left">
        <input type="text" name="search_text" value="<?= $_REQUEST['search_text'] ?>" placeholder="Motorcycle Engine">  
    </div>
    <div class="select_bg float_left">
        <select name="type_id_top">
            <?= common:: get_bike_type($_REQUEST['type_id_top']) ?>
        </select>
        <input class="search_top" type="submit" name="top_search" value="SEARCH"/> 

    </div>
</form>
<a href="<?= site_url('adz/advanced_search'); ?>" style="text-transform: uppercase; font-family: Raleway; font-size: 10px; font-weight: bold; width: 85px; margin-top: -3px">
    <p style="text-align: center; margin: 0; padding: 0">Advanced </p> <p style="text-align: center; margin: 0; padding: 2px">search</p>
</a>