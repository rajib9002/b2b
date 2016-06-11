<div class='form_content'>
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form action='<?= site_url('rider_class'); ?>' method='post'>
        <table cellpadding=0 cellspacing=1>
            <tbody>
                <tr>
                    <th>Class Name</th>
                    <td><input type="text" name="rider_class_name" value="" class='text ui-widget-content ui-corner-all width_80' /></td>
                    <td><input type='submit' name='search' value='Search' class="button" /> </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<div class="grid_area">
    <?php
    if ($msg != ''):
        echo '<div class="success">' . $msg . '</div>';
    endif;
    ?>
    <div class="tooolbars">
        <button id="add" title="rider_class/new_rider_class"   class="jadd_button">Add</button>
        <button title="rider_class/edit_rider_class" class="jedit_button">Edit</button>
        <button title="rider_class/delete_rider_class" class="jdelete_button">Delete</button>
        <button title="rider_class/rider_class_status/1" class="jstatus_button">Active</button>
        <button title="rider_class/rider_class_status/0" class="jstatus_button">Inactive</button>
    </div>
    <hr />
    <?php
    echo $grid_data;
    ?>
</div>
<div class="clear"></div>
