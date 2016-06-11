<div class="table_content">
        <table>
<div style="margin-top:5px;"></div>
<div class="blog_mid_content float_left">
    <?=$this->load->view('shared/blog_top_button.php'); ?>
    <div class="mid_box_upper">

    </div>
        <div class="mid_box_mid">
        <form action="<?=$action . '/' . $blog_detail['blog_id']?>" method="post">
                <div class="blog_picture"style="float:left;width:80px;height:80px;">
                    <?php
                    $user_data = $this->mod_blog->get_profile_pic($blog_detail['blog_id']);
                    $user_image = $user_data['user_image'];    //print_r($user_data);exit();
                    $user_name = $this->mod_blog->get_user_name($user_data['user_id']);
                    ?>
                    <?php if ($user_image == '') { ?>
                        <img style="float:left;" src="images/default_user_image.png" width="80" height="80" alt="user image"/>
                    <?php } else { ?>
                        <img style="float:left;" src="<?php echo base_url() . 'uploads/profile_pic/mid_' . $user_image ?>" width="80" height="80" alt="user image"/>       
                    <?php } ?>
                </div>
                <div style="float:left;margin:0;padding:0;width:420px;margin-left:5px;">
                    <h4 style="font-size:12px;color:#2786c2;font-family: verdana;"><strong><?php echo($user_name['user_username']); ?></strong></h4>
                    <h3 style="font-size:11px;color:#444444;font-family: verdana;margin-top: 3px;"><strong><?php echo $blog_detail['title']; ?></strong></h3>
                     <p style="text-align:left;float:left;margin:0;padding:0;"><?php echo $blog_detail['blog_description'] ?></p>
                </div>
                    <div class="clear"></div>
                    <?php
                    $user_id = $this->session->userdata('user_id');
                    if ($user_id == $blog_detail['user_id']) {?>
                        <div style="float:right;margin-right:10px;">
                            <input type='submit' name='remove' value="Remove Post"/>
                            <input type='submit' name='edit' value="Edit Post"/>
                        </div>
                    <?php } ?>

                    <div class="clear"></div>

                    <div style="margin-top:10px;"></div>
                    <?php foreach ($blog_comment as $comment) { ?>
                                <div class="all_comment_picture" style="margin-left:90px;margin-right:5px;width:50px;height:50px;float:left">
                                    <?php
                                    $user_data = $this->mod_blog->get_commenter_pic($blog_detail['blog_id'], $comment['id']);
                                    $user_image = $user_data['user_image'];
                                    ?>
                                    <?php if ($user_image == '') { ?>
                                                    <img src="images/default_user_image.png" width="50" height="50" alt="user image"/>
                                    <?php } else { ?>
                                        <img  src="<?php echo base_url() . 'uploads/profile_pic/small_' . $user_image ?>" width="50" height="50" alt="user image"/>
                                        <?php echo $user_data['user_name']; ?>
                                    <?php } ?>
                                </div>
                                    <div class="text_align_left" style="color:darkred;float:left;width:355px;">
                                        <?php $username = sql::row("users", "user_id=$comment[user_id]");
                                        echo $username['user_name'] ?> Says,
                                        <p style="margin:0;padding:0;text-align: left;"><?php echo $comment['comment'] ?></p>
                                    </div>
                                   
                            <div class="clear"></div>
                            <div style="margin-top:10px;"></div>
                            
                    <?php } ?>
                            </form>
                        <div class="clear"></div>
                         <?php if (common::is_logged_in()) { ?>
                       <form action="<?=$action . '/' . $blog_detail['blog_id']?>" method="post" onSubmit="if(document.getElementById('comment').value==''){alert('Please enter your comment');return false;}">
                                    <table style="color:#333333;font-size: 11px;font-weight: normal;float:left;padding-left:86px;">
                                        <tr>
                                            <td align="left"><textarea  name='comment' id="comment" cols="49" rows="3"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><input type='submit' name='submit' value="Comment"/></td>
                                        </tr>
                                    </table>
                        <?php } ?>
                        </form>
            <div class="clear"></div>
                </div>

                    <div class="clear"></div>


                <div class="mid_box_foot">

                </div>
                    </div>
</table>

</div>
