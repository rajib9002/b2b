<div class="form_content">
    <h3><?= $page_title ?></h3>
    <form id="valid_form" action='<?= site_url('settings/social_weblink') ?>' enctype="multipart/form-data" method='post'>
        <table>
           <?php if($msg!=''){echo "<div class='message success'>".$msg."</div>";}?>
            <tr>
                <th>Facebook Link <span class='req_mark'>*</span></th>
                <td><input type='text' name='faecbook_link' value='<?= $faecbook_link ?>' plaseholder="must begin with http://"class='input_txt required width_250' /></td>
            </tr>
             <tr>
                <th>Twitter Link <span class='req_mark'>*</span></th>
                <td><input type='text' name='twitter_link' value='<?= $twitter_link ?>' class='input_txt required width_250' /></td>
            </tr>
            
            <tr>
                <th>Youtube Link <span class='req_mark'>*</span></th>
                <td><input type='text' name='youtube_link' value='<?= $youtube_link ?>' class='input_txt required width_250' /></td>
            </tr>
             <tr>
                <th>Google Plus Link <span class='req_mark'>*</span></th>
                <td><input type='text' name='googleplus_link' value='<?= $googleplus_link ?>' class='input_txt required width_250' /></td>
            </tr>
            
          
            <tr>
                <th>&nbsp;</th><td><input type='submit' name='update' value='Update Settings' class='button' /> <input type='button' name='cancel' value='Cancel' class='cancel' /></td>
            </tr>
        </table>
    </form>
</div>
<div class="clear"></div>