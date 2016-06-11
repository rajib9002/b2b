<div class="content">
    <?php if($msg!=''){ echo $msg; }?>
       
     <h3 style="margin:0;padding:0;"><strong><?php echo $user_info['user_name']; ?></strong></h3>
            <p><?php echo $user_info['user_first_name'].' '.$user_info['user_last_name']; ?></p>
            <p><?php echo $user_info['user_mobile']; ?></p>
            <p><?php echo $user_info['address']; ?></p>
            <p><?php echo $user_info['country']; ?></p>
</div>



