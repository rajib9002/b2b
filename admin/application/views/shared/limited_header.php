<?php if (common::is_logged_in()): ?>
    <?php $user_id = $this->session->userdata('user_id');

    $info = sql::row("users", "user_id=$user_id"); ?>
    <div class="top_menu">
        <ul class="sf-menu">
            <li><a href="<?= site_url('home') ?>" title='Home' class="white">Home</a></li>  
            <li>
                <a href="#" class="white">Competiton Venue</a>
                <ul>
                    <li><a href="#">Result</a>
                        <ul>  <li><a href="<?= site_url('rider_class') ?>">Class</a></li>
                            
                                <li><a href="<?= site_url('competitionr') ?>">Competition</a></li>
                          
                                <li><a href="<?= site_url('competitionr_details') ?>">Competition Details</a></li>
                            
                                <li><a href="<?= site_url('rider') ?>">Rider</a></li>
                           
                                <li><a href="<?= site_url('competition_result') ?>">Competition Result</a></li>
                        </ul>
                    </li>                    
                    <li><a href="#">Host Club</a>
                       <ul>
                        <li><a href="<?= site_url('club') ?>">Manage Club</a></li>
                        <li><a href="<?= site_url('club/new_club') ?>">Add New Club</a></li>
                    </ul>
                    </li>                    
                </ul>
            </li>           
        </ul>
    </div>
    <div class="clear"></div>
<?php endif; ?>