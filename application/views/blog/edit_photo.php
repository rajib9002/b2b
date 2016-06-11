<div class="table_content">
        <table>
<div class="blog_mid_content float_left">
    <div class="mid_box_upper">

    </div>
    <div class="mid_box_mid">
        <?=$this->load->view('shared/blog_top_button.php'); ?>
        <div class="clear"></div>
          <form action="<?=  site_url('account/edit_photo')?>" method="post" enctype="multipart/form-data">
            <table width="100%" border="0">

                <tr>
                    <th>Image:</th>
                    <td align="left">
                        <?php if ($user_info['user_image'] != '') {?>
                            <img src="<?= base_url() . '/uploads/profile_pic/small_' . $user_info['user_image'] ?>" alt="alt"/>
                        <?php } ?>
                        <input type="file" name="user_image">

                    </td>
                </tr>

                  <tr>
                       <th>&nbsp;</th>
                       <td align="left"><input type='submit' name='save' value='Save'/> <input type='button' value='Cancel' onclick='window.history.back();' class="cancel" /></td>
                   </tr>

            </table>
        </form>
    </div>

    <div class="mid_box_foot">

    </div>
</div>
    </table>
    </div>