<div class="form_content">
    <form action="<?= site_url('static_image') ?>" method="POST">
        <table>
            <tr>
                <th class="txt_right">static_image Title:</th><td><input type="text" name="title" value="<?= $_REQUEST['title'] ?>" class="text ui-widget-content ui-corner-all width_160" /></td>
            </tr>
            <tr>
                <th>static_image Status:</th>
                <td>
                    <input type="radio" name="status" value="1" <?= $_REQUEST['status'] == 1 ? 'checked' : '' ?>/>&nbsp;Active&nbsp;
                    <input type="radio" name="status" value="0" <?= $_REQUEST['status'] == 0 ? 'checked' : '' ?>/>&nbsp;Inactive&nbsp;
                    <input type="radio" name="status" value="" <?= $_REQUEST['status'] == '' ? 'checked' : '' ?>/>&nbsp;All&nbsp;
                </td>
            </tr>
            <tr>
                <th><td align="left"><input type='submit' name='search' value='Search' class='button' /></td>
            </tr>
        </table>
    </form>
</div>
<div class='grid_area'>
    <?php if($msg!=''): echo '<div class="success">'.$msg.'</div>'; endif;?>
    <div class="tooolbars">

<!--        <button  title="static_image/new_static_image"  class="jadd_button">Add</button>-->
        <button id="add" title="static_image/edit_static_image" class="jedit_button">Edit</button>
        <button title="static_image/update_status/1" class="jstatus_button">Activate</button>
        <button title="static_image/update_status/0" class="jstatus_button">Deactivate</button>
        
        
    </div>
<?php echo $grid_data ?>
</div>