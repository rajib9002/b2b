<div class="table_content">
        <table>
<div class="blog_mid_content float_left">
  <?=$this->load->view('shared/blog_top_button.php'); ?>
        <div class="clear"></div>
<?php foreach ($blog_list as $blog) { ?>
            <div class="comments_all"style="width:500px;float:left;">
                <div style="margin-top:10px;"></div>
                <?php
                $user_data=$this->mod_blog->get_profile_pic($blog['blog_id']);
                $user_image=$user_data['user_image'];
                $user_name=$this->mod_blog->get_user_name($user_data['user_id']);
                 ?>
                    <img style="float:left;margin-right:5px;" src="<?php echo base_url()?>uploads/profile_pic/small_<?php echo $user_image; ?>" alt="" width="60px" height="60px"/>
                    <h4 style="font-size:12px;color:#2786c2;font-family: verdana;"><strong><?php echo($user_name['user_username']); ?></strong></h4>
                    <h3 style="font-size:11px;color:#444444;font-family: verdana;margin-top: 3px;"><strong><?php echo $blog['title']; ?></strong></h3>
                    <p style="padding:0;text-align:left;font-family: verdana;margin-top: 3px;color:#333333;"><?=substr($blog['blog_description'], 0, 550) . '...' ?>
                    <a style="font-size:11px;text-align:left;" href="<?= site_url('blog/blog_description/' . $blog['blog_id']) ?>"><strong>more</strong></a></p>
                    <div class="clear"></div>
                    <div style="margin-top:10px;border-bottom:1px dotted #e2e2e2;"></div>
            </div>
            <div class="clear"></div>
<?php } ?>


       

    </div>
             </table>
    </div>