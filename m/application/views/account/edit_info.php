

<div class='form_content'>
 
    <div id="stylized" class="myform2">
    <form id="form" action='<?= site_url($action); ?>' method='post'>
         <?php if($msg!='') {
                        echo "<div class='error'>".$msg."</div>"; 
                    }
                   
                    ?>
        <h1>Edit Personal Info</h1>        
       
        <label>First Name
           <span class="small"><?=form_error('user_first_name','<span>','</span>')?></span>
        </label>
        <input type="text" name='user_first_name' value='<?= set_value('user_first_name', $user_first_name) ?>' />
        
        <label>Last Name
           <span class="small"><?=form_error('user_last_name','<span>','</span>')?></span>
        </label>
        <input type="text" name='user_last_name' value='<?= set_value('user_last_name', $user_last_name) ?>' />        
        
        <label>Email
           <span class="small"><?=form_error('user_email','<span>','</span>')?></span>
        </label>
        <input type="text" name='user_email' value='<?= set_value('user_email', $user_email) ?>' />
        
        <label>Phone
           <span class="small"><?=form_error('user_email','<span>','</span>')?></span>
        </label>
        <input type="text" name='user_phone' value='<?= set_value('user_phone', $user_phone) ?>' />
         <label>Area
           <span class="small"><?=form_error('area_id','<span>','</span>')?></span>
        </label>
        <select name="area_id" class='text ui-widget-content ui-corner-all width_160'><?= common::get_area($area_id) ?></select>
         
        <label>Address
           <span class="small"><?=form_error('user_address','<span>','</span>')?></span>
        </label>
        <textarea  name="user_address"  cols="30" rows="3"  ><?= set_value('user_address', $user_address) ?></textarea>
       
        <input type="hidden" name="sess_value" value="<?= $user_id ?>" />
        <input class="button" type='submit' name='update' value='Update'/> 
        <div class="spacer"></div>

    </form>
</div>
    
    
    
   
</div>