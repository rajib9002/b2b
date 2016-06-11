<div class="form_content">
    <form action="<?= site_url('contact') ?>" method="post">
        <table>
            <tr>
                <th class="txt_right">Name:</th><td><input type="text" name="name" value="<?= $_REQUEST['name'] ?>" class="text ui-widget-content ui-corner-all width_160" /></td>
            </tr>
            <tr>
                <th class="txt_right">Subject Keyword:</th><td><input type="text" name="subject" value="<?= $_REQUEST['subject'] ?>" class="text ui-widget-content ui-corner-all width_160" /></td>
            </tr>

            <tr>
                <th>&nbsp;</th>
                <td align="left"><input type='submit' name='search' value='Search' class='button' /></td>
            </tr>
        </table>
    </form>
</div>
<?php if ($msg) { ?>
    <div class="success" ><?php echo $msg; ?></div>
<?php } ?>
<div class='txt_center grid_area'>
    <div class="tooolbars">
        <button id="add" title="contact/reply"  class="jedit_button">Reply</button>
        <button id="add" title="contact/delete_contact"  class="jdelete_button">Delete</button>

    </div>
    <hr />
    <?php echo $grid_data ?>
</div>