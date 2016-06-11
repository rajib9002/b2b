


<div class="form_content">
    <form id="valid_ad_image" method="POST" action="<?= $action ?>" enctype="multipart/form-data">
        <table>
            <tr>
                <th>ad_image Title<span class='req_mark'>*</span></th>
                <td><input type='text' name='title' readonly="readonly" value='<?= set_value('title', $ad_image_data['title']) ?>' class='text ui-widget-content ui-corner-all width_200 required' /><?= form_error('title', '<span>', '</span>') ?> </td>
            </tr>
               
            <tr>
                <th>ad_image Image<span class='req_mark'>*</span></th>
                <? if ($ad_image_data['image'] != '') { ?>
                    <td><img src="../uploads/ad_image/<?= $ad_image_data['image'] ?>" alt="<?= $ad_image_data['image'] ?>" style="width:100px;height:64px;" />
                            
                    </td>
                <? } ?>
                    
            </tr>
            <tr><td>
                <td><input type='file' name='ad_image'  /></td>
                </td></tr>
                    
                    
            <tr><th>&nbsp;</th><td><input type='submit' name='save' value='Save' class='button' /> <input type='button' value='Cancel' onclick='window.history.back();' class="cancel" /></tr>
        </table>
    </form>

</div>