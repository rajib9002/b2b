<div class='grid_area'>
    <?php if($msg!=''): echo '<div class="success">'.$msg.'</div>'; endif;?>
    <div class="tooolbars">

        <button id="add" title="competition/add_competition"  class="jadd_button">Add</button>
        <button title="competition/edit_competition" class="jedit_button">Edit</button>
        <button title="competition/com_status/1" class="jstatus_button">Activate</button>
        <button title="competition/com_status/0" class="jstatus_button">Deactivate</button>
        <button  class="jdelete_button" title="competition/delete_com/">Delete</button>
        
    </div>
<?php echo $grid_data ?>
</div>