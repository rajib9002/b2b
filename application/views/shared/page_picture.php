<?php $all_image = sql::rows("static_image"); ?>


<?php if ($page_banner == 'add_place') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[0]['image'] ?>" width="1000px" height="125px">
<?php } ?>
<?php if ($dir == 'signup') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[2]['image'] ?>" width="1000px" height="125px">
<?php } ?>

<?php if ($page == 'my_ads') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[3]['image'] ?>" width="1000px" height="125px">
<?php } ?>    


<?php if ($page == 'advance_search') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[4]['image'] ?>" width="1000px" height="125px">
<?php } ?> 

<?php if ($dir == 'login') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[5]['image'] ?>" width="1000px" height="125px">
<?php } ?>

<?php if ($page == 'about_us') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[6]['image'] ?>" width="1000px" height="125px">
<?php } ?>

<?php if ($dir == 'contact') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[7]['image'] ?>" width="1000px" height="125px">
<?php } ?>

<?php if ($page == 'terms_of_use') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[8]['image'] ?>" width="1000px" height="125px">
<?php } ?>
    
    
  <?php if ($page == 'privacy_policy') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[9]['image'] ?>" width="1000px" height="125px">
<?php } ?>  
    <?php if ($page == 'how_to_use') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[10]['image'] ?>" width="1000px" height="125px">
<?php } ?>
    
      <?php if ($page == 'spam') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[11]['image'] ?>" width="1000px" height="125px">
<?php } ?>
    
    
    <?php if ($page == 'careers') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[12]['image'] ?>" width="1000px" height="125px">
<?php } ?>
    
    <?php if ($page == 'careers') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[12]['image'] ?>" width="1000px" height="125px">
<?php } ?>
    
      <?php if ($page == 'mobile_version') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[13]['image'] ?>" width="1000px" height="125px">
<?php } ?>
    
    <?php if ($page == 'change_password') { ?>
    <img src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[14]['image'] ?>" width="1000px" height="125px">
<?php } ?>
    
<?php if($banner!=''){?>
    <!--<img src="<?= base_url() ?><?php echo $banner ?>" width="1000px" height="125px"/>-->
<img  src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[1]['image'] ?>" width="1000px" height="125px">
<?php } else if(($dir=='adz' && $page == 'index') || ($dir=='adz' && $page == 'details') || ($dir=='adz' && $page == 'edit_form') || ($dir=='payment') || ($dir=='adz' && $page == 'save_ads')|| ($dir=='competition')|| ($dir=='competition_result')) { ?>
    <img  src="<?= base_url() ?>/uploads/static_image/<?php echo $all_image[1]['image'] ?>" width="1000px" height="125px">
<?php }?>







