<div class="table_content">
        <table>
<div class="blog_mid_content float_left">
    <?=$this->load->view('shared/blog_top_button.php'); ?>
    <div class="mid_box_upper">

    </div>
    <div class="mid_box_mid">
        <div class="">
            <form action="<?=$action?>" method="post">
                <br/>
                <table style="padding: 10px;color:#333333;font-size: 11px;font-weight: normal;">
                    <tr>
                        <td valign="top" align="left">Title<span>*</span></td></tr>
                    <tr><td align="left"><input style="width:200px;" type='text' name='title' value='<?= set_value('title', $blog_data['title'])?>' class="field_width"/></td>
                    </tr>
                    <tr>
                        <td valign="top"align="left">description<span>*</span></td></tr>
                    <tr> <td align="left"><textarea class="field_width" id="content" style="height:200px;" name='description' cols="30" rows="5"><?= set_value('description', $blog_data['blog_description'])?></textarea></td>
                    </tr>
                    <tr><td align="left"><input type='submit' name='save' value='Save'/></td></tr>
                </table>
            </form>
            <div class="clear"></div>
        </div>
    </div>
    <div class="mid_box_foot">
    </div>
</div>
    </table>
    </div>