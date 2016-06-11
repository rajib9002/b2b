<div class="form_content">
    <h3><?= $page_title ?></h3>
    <form id="valid_form" action='<?= site_url('settings/site_settings') ?>' enctype="multipart/form-data" method='post'>
        <table>
           <?php if($msg!=''){echo "<div class='message success'>".$msg."</div>";}?>
            <tr>
                <th>Site Title1 <span class='req_mark'>*</span></th>
                <td><input type='text' name='site_title1' value='<?= $site_title1 ?>' class='input_txt required width_250' /></td>
            </tr>
             <tr>
                <th>Site Title2 <span class='req_mark'>*</span></th>
                <td><input type='text' name='site_title2' value='<?= $site_title2 ?>' class='input_txt required width_250' /></td>
            </tr>
            
            <tr>
                <th>Site Title3 <span class='req_mark'>*</span></th>
                <td><input type='text' name='site_title3' value='<?= $site_title3 ?>' class='input_txt required width_250' /></td>
            </tr>
            
            <tr>
                <th>Welcome Right Image</th>
                <td><input type='file' name='image' /></td>
            </tr>
            <tr>
                <th>&nbsp;</th><td><input type='submit' name='update' value='Update Settings' class='button' /> <input type='button' name='cancel' value='Cancel' class='cancel' /></td>
            </tr>
        </table>
    </form>
</div>
<div class="clear"></div>