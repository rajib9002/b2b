<div class="form_content">
    <h3><?= $page_title ?></h3>
    <form id="valid_form" action='<?= site_url('settings/change_logo') ?>' enctype="multipart/form-data" method='post'>
        <table>
           <?php if($msg!=''){echo "<div class='message success'>".$msg."</div>";}?>
        
            
            <tr>
                <th>Logo</th>
                <td><input type='file' name='image' /></td>
            </tr>
            <tr>
                <th>&nbsp;</th><td><input type='submit' name='update' value='Update Settings' class='button' /> <input type='button' name='cancel' value='Cancel' class='cancel' /></td>
            </tr>
        </table>
    </form>
</div>
<div class="clear"></div>