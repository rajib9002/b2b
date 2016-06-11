<div class='form_content'>
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form action='<?= site_url('bike/bike_main_type'); ?>' method='post'>
        <table cellpadding=0 cellspacing=1>
            <tbody>
                <tr>
                    <th>Main Type Name</th>
                    <td><input type="text" name="type_name" value="<?=$_REQUEST['type_name']?>" class='text ui-widget-content ui-corner-all width_80' /></td>
                    <td><input type='submit' name='search' value='Search' class="button" /> </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<script>
    $j("#data_grid").jqGrid('navGrid', '#grid_pager', {
        edit: false,                    
        add: false,                             
        del: false,                     
        search: false,                      
        refresh:true
    })
</script>

<script>

    loadComplete: function() {
        $j("tr.jqgrow:odd").css("background", "#E0E0E0");
    }

</script>

<style type="text/css">
    .ui-priority-secondary { background-color: #ecf8ff; background-image: none;  }
    /*.myAltRowClass { background: #DDDDDC; }*/
</style>


<div class="grid_area">
    <?php
    if ($msg != ''):
        echo '<div class="success">' . $msg . '</div>';
    endif;
    ?>
    <div class="tooolbars">
        <button id="add" title="bike/new_bike_main_type"   class="jadd_button">Add</button>
        <button title="bike/edit_bike_main_type" class="jedit_button">Edit</button>
        <button title="bike/delete_bike_main_type" class="jdelete_button">Delete</button>
        <button title="bike/bike_main_type_status/1" class="jstatus_button">Active</button>
        <button title="bike/bike_main_type_status/0" class="jstatus_button">Inactive</button>
    </div>
    <hr />
    <?php
    echo $grid_data;
    ?>
</div>
<div class="clear"></div>
<script>
    $j("#data_grid").jqGrid('navGrid', '#grid_pager', {
        edit: false,                    
        add: false,                             
        del: false,                     
        search: false,                      
        refresh:true
    })
</script>

<script>

    loadComplete: function() {
        $j("tr.jqgrow:odd").css("background", "#E0E0E0");
    }

</script>

<style type="text/css">
    .ui-priority-secondary { background-color: #ecf8ff; background-image: none;  }
    /*.myAltRowClass { background: #DDDDDC; }*/
</style>
