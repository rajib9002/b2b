<div class="content" style="background-color:#fff;padding:30px;width:250px;margin:10px auto;">

    <p style="font-weight:bold;color:#000; font-size: 30px">SUCCESS!</p>
    <p style="color:#000;margin-right:2px;font-size: 20px"><?if($msg!='') echo $msg;?></p>
    <div class="clear"></div>

    <a class="next_previous_button" style="padding: 0px; border: 0px;" href="<?= site_url('login'); ?>">
        <input class="blue_button" style="float: none" type="submit" name="done" value="LOGIN"/>
    </a>


    <div class="clear"></div>
</div>



