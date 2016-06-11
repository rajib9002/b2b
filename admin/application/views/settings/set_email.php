<div class="form_content" style="width:860px;">
     <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <?php if($msg!=''): echo '<div class="success">'.$msg.'</div>'; endif;?>
    <form action='<?= site_url('settings/set_paypal') ?>' method='post'>
        <table>
            <tr>
                <th>Paypal Account Email:</th>
                <td><input type='text' name='business_email' value='<?=$business_email?>' class='text ui-widget-content ui-corner-all required width_200' />
                </td>
            </tr>
            <tr>
                <th>API Username:</th>
                <td><input type='text' name='api_user' value='<?=$api_user?>' class='text ui-widget-content ui-corner-all required width_200' />
    
                </td>
            </tr>
            <tr>
                <th>API Password:</th>
                <td><input type='text' name='api_password' value='<?=$api_password?>' class='text ui-widget-content ui-corner-all required width_200' />

                </td>
            </tr>
            <tr>
                <th>Api Signature:</th>
                <td><input type='text' name='api_signature' value='<?=$api_signature?>' class='text ui-widget-content ui-corner-all required width_200' />

                </td>
            </tr>
            <tr>
                <th>Rate For Ad</th>
                <td><input type='text' name='ad_price' value='<?= $ad_price ?>' class='text ui-widget-content ui-corner-all required width_200' /> Euro</td>
<!--                <td><input type='text' name='usd_to_bdt' value='<?=$usd_to_bdt?>' class='text ui-widget-content ui-corner-all required width_200' /> BDT-->

                </td>
            </tr>

            <tr>
                <th>&nbsp;</th><td><input type='submit' name='update' value='Update' class='button' /> <input type='button' name='cancel' value='Cancel' class='cancel' /></td>
            </tr>
        </table>
    </form>
</div>