<div class="form_content">
    <form action="<?= site_url('ad_image') ?>" method="POST">
        <table>
            <tr>
                <th class="txt_right">Ad Image Title:</th><td><input type="text" name="title" value="<?= $_REQUEST['title'] ?>" class="text ui-widget-content ui-corner-all width_160" /></td>
            </tr>
            <tr>
                <th>Ad Image Status:</th>
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

<!--        <button  title="ad_image/new_ad_image"  class="jadd_button">Add</button>-->
        <button id="add" title="ad_image/edit_ad_image" class="jedit_button">Edit</button>
        <button title="ad_image/update_status/1" class="jstatus_button">Activate</button>
        <button title="ad_image/update_status/0" class="jstatus_button">Deactivate</button>
        
        
    </div>
<?php echo $grid_data ?>
</div>