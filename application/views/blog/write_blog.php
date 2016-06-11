<div class="table_content">
    <table>
<div class="blog_mid_content float_left">

    <div class="mid_box_upper">

    </div>
    <div class="mid_box_mid">
        <?=$this->load->view('shared/blog_top_button.php'); ?>
        <div class="clear"></div>
        <div style="margin:0;padding:0;">
            <form action="<?=$action?>" method="post">
                <table style="text-align:left;float:left;font-size: 12px;">
                    <tr><td>Title<span>*</span></td></tr>
                    <tr><td><input  type='text' name='title' value=''/></td></tr>
                    <tr><td>description<span>*</span></td></tr>
                    <tr><td><textarea id="content" name='description' cols="30" rows="5"></textarea></td></tr>
                    <tr><td align="left"><input type='submit' name='save' value='Save'/></td></tr>
                </table>
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div class="mid_box_foot">

    </div>
</div>
        </table>
    </div>