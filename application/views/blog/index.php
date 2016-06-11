<?php
//$header_image = common::blog_header_image();
?>
<div class="table_content">
    <table>
<div class="blog_mid_content float_left" >
    
        <div class="clear"></div>

<?=$this->load->view('shared/blog_top_button.php'); ?>
        




<?php foreach ($blog_list as $blog) { ?>
            <div class="comments_all"style="width:99%;float:left;">
                <div style="margin-top:10px;"></div>

                    <?php
                    
                    //echo $blog['blog_id'];
                    
                    $user_data = $this->mod_blog->get_profile_pic($blog['blog_id']);
                    $user_image = $user_data['user_image'];    //print_r($user_data);exit();
                    $user_name = $this->mod_blog->get_user_name($user_data['user_id']);
                    ?>
                    <?php if ($user_image == '') { ?>
                        <img style="float:left;margin-right:5px;" src="images/default_user_image.png" width="60" height="60" alt="user image"/>
                    <?php } else { ?>
                        <img style="float:left;margin-right:5px;" src="<?php echo base_url() . 'uploads/profile_pic/small_' . $user_image ?>" width="60" height="60" alt="user image"/>
                    <?php } ?>
                    <h4 style="font-size:12px;color:#2786c2;font-family: verdana;"><strong><?php echo($user_name['user_username']); ?></strong></h4>
                    <h3 style="font-size:11px;color:#444444;font-family: verdana;margin-top: 3px;"><strong><?php echo $blog['title']; ?></strong></h3>
                    <p style="padding:0;text-align:left;font-family: verdana;margin-top: 3px;color:#333333;"><?=substr($blog['blog_description'], 0, 550) . '...' ?>
                    <a style="font-size:11px;text-align:left;" href="<?= site_url('blog/blog_description/' . $blog['blog_id']) ?>"><strong>more</strong></a></p>
                    <div class="clear"></div>
                    <div style="margin-top:10px;border-bottom:1px dotted #e2e2e2;"></div>
            </div>
            <div class="clear"></div>
<?php } ?>
        <div class="clear"></div>
        <div ></div>
        <div class="pagination_links">
            <div style="float:left;">Showing <?=$start.'-'.$end.' of '.$total?></div><div style="float:right;"><?=$pagination_links ?></div>
        </div>
        <div class="clear"></div>
</div>
    </table>
    </div>