<div class='grid_area'>
    <?php if($msg!=''): echo '<div class="success">'.$msg.'</div>'; endif;?>
    <div class="tooolbars">

        <button id="add" title="competition_result/add_competition_result"  class="jadd_button">Add</button>
        <button title="competition_result/edit_competition_result" class="jedit_button">Edit</button>
        <button title="competition_result/com_status/1" class="jstatus_button">Activate</button>
        <button title="competition_result/com_status/0" class="jstatus_button">Deactivate</button>
        <button  class="jdelete_button" title="competition_result/delete_com/">Delete</button>
        
    </div>
<?php echo $grid_data ?>
</div>