<div class="table_content">
    <table>
<div class="blog_mid_content float_left">
    <?=$this->load->view('shared/blog_top_button.php'); ?>
    <div class="mid_box_upper">

    </div>
    <div class="mid_box_mid">
        <?=$this->load->view('shared/blog_top_button.php'); ?>
        <div class="clear"></div>
        <div class="profile_right float_left">
        <form id="success_story" action='<?=site_url($action)?>' method='post' enctype="multipart/form-data">
        <table width="70%" border="0" cellspacing="3" align="left" class="mar_top_20 mar_left_25">

            <tr>
                <th width="25%" align="right">Username:</th>
                <td align="left"><input type='text' name='user_username' value='<?=set_value('user_username',$info['user_username'])?>'></td>

            </tr>

            <tr>
               <th align="right">Email:</th>
               <td align="left"><input type='text' name='user_email' value='<?=set_value('user_email',$info['user_email'])?>'></td>


            </tr>
          
            </div><tr>
               <th align="right">Title</th>
               <td align="left"><input type='text' name='user_title' value='<?=set_value('user_title',$info['user_title'])?>'></td>


            </tr>
            
            <tr>
                <th align="right">Description:</th>
                <td align="left"><textarea  name="user_description" style="width:300px; height:auto;"><?=set_value('user_description',$info['user_description'])?></textarea></td>

             </tr>
            
            
            

            <tr>
                <th align="right">Phone No:</th>
                <td align="left"><input type='text' name='phone_no' value='<?=set_value('phone_no',$info['phone_no'])?>'></td>

            </tr>

             <tr>
                <th align="right">Address:</th>
                <td align="left"><textarea  name="address" style="width:300px; height:auto;"><?=set_value('address',$info['address'])?></textarea></td>

             </tr>

            <tr>
                <th align="right" valign="top">Post Code:</th>
                <td align="left"><input type='text' name='post_code' value='<?=set_value('post_code',$info['post_code'])?>'></td>

            </tr>

           <tr>
                 <td align="right"><strong>Country:</strong><span class='req_mark'>*</span></td>
                 <td align="left">
                     <select name="country">
                         <?php echo $country_list;?>
                     </select>
                 </td>
             </tr>

            <tr>
                <th>&nbsp;</th>
                <td align="left">
                    <input type="submit" name="submit" value="Submit"/>
                    <input type="submit" name="cancel" value="Cancel">
                </td>
            </tr>


        </table>

  </form>
        </div>
<div class="clear"></div>

    </div>
    <div class="mid_box_foot">

    </div>

</div>
</table>

</div>
