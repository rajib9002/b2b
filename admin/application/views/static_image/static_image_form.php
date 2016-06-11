


<div class="form_content">
    <form id="valid_static_image" method="POST" action="<?= $action ?>" enctype="multipart/form-data">
        <table>
            <tr>
                <th>static_image Title<span class='req_mark'>*</span></th>
                <td><input type='text' name='title' value='<?= set_value('title', $static_image_data['title']) ?>' class='text ui-widget-content ui-corner-all width_200 required' /><?= form_error('title', '<span>', '</span>') ?> </td>
            </tr>
               
            <tr>
                <th>static_image Image<span class='req_mark'>*</span></th>
                <? if ($static_image_data['image'] != '') { ?>
                    <td><img src="../uploads/static_image/<?= $static_image_data['image'] ?>" alt="<?= $static_image_data['image'] ?>" style="width:100px;height:64px;" />
                            
                    </td>
                <? } ?>
                    
            </tr>
            <tr><td>
                <td><input type='file' name='static_image'  /></td>
                </td></tr>
                    
                    
            <tr><th>&nbsp;</th><td><input type='submit' name='save' value='Save' class='button' /> <input type='button' value='Cancel' onclick='window.history.back();' class="cancel" /></tr>
        </table>
    </form>

</div>