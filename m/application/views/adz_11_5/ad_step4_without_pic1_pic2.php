<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script><script src="script/script_multiple_image.js"></script>
<script type="text/javascript">
    function hide_button()
    {
        var name = $(":file").val(); var first_img = $(".first_img").val()        if (name != '' || first_img != '') {
            $j('.hide_button').hide();
            $j('.show_button').show();
        }
    }
</script>
<style>   
    .abcd{position:absolute;} 
    .abcd img {
        border: none;
        width: 71px;
        height: 69px;
    }	
    .abcd img#img{z-index:10;position:absolute;top:0; width: 20px;height: 20px;right:0;} 
    .abcd img#imgup{      
        z-index: 0;    
        position: absolute; 
        width: 20px;      
        height: 20px;    
        top: 0;        
        right: 25px;  
    }    
    .filediv{    
        background: url(images/img_bg.jpg) no-repeat; 
        width:72px;  
        height:70px;   
        position:relative;  
        float:left;     
        margin-bottom:15px;
        display: inline-block;  
        margin-left:13px; 
    }    
    .filediv  input{ 
        filter: alpha(opacity=0); 
        opacity: 0;     
        height: 100%;   
        cursor: pointer;    
        position:absolute;left:0;  
    }
</style>
<div class="content_m"> 
    <form enctype="multipart/form-data" action="<?= site_url($action) ?>" method="post" class="">    
        <div  style="margin-left:-15px;">      
            <div class="filediv">        
                <?php
                $file0 = $this->session->userdata('file0');
                if ($file0 != '') {
                    ?>                   
                    <div id="abcd0" class="abcd">            
                        <img id="previewimg0" src="<?php echo base_url() ?>../uploads/bike_image/<?php echo $file0 ?>">            
                        <img id="imgup" src="img/up.png" alt="Upload">              
                    </div>             
                <?php } ?>              
                <input type="hidden" name="first_img" class="first_img" value="<?php echo $file0 ?>">   
                <input name="file0" type="file" id="file0"/>    
            </div>        
            <div class="filediv">     

                <?php
                $file1 = $this->session->userdata('file1');
                if ($file1 != '') {
                    ?>               
                    <div id="abcd1" class="abcd">                     
                        <img id="previewimg1" src="<?php echo base_url() ?>../uploads/bike_image/<?php echo $file1 ?>">      
                        <img id="imgup" src="img/up.png" alt="Upload">          
                    </div>              
                <?php } ?>       
                <input name="file1" type="file" id="file1"/>      
            </div>            <div class="filediv">    
                <?php
                $file2 = $this->session->userdata('file2');
                if ($file2 != '') {
                    ?>                    <div id="abcd2" class="abcd">          
                        <img id="previewimg2" src="<?php echo base_url() ?>../uploads/bike_image/<?php echo $file2 ?>">      
                        <img id="imgup" src="img/up.png" alt="Upload">               
                    </div>             
                <?php } ?>          
                <input name="file2" type="file" id="file2"/>         
            </div>        
            <div class="filediv">       
                <?php
                $file3 = $this->session->userdata('file3');
                if ($file3 != '') {
                    ?>                
                    <div id="abcd3" class="abcd">              
                        <img id="previewimg3" src="<?php echo base_url() ?>../uploads/bike_image/<?php echo $file3 ?>">        
                        <img id="imgup" src="img/up.png" alt="Upload">         
                    </div>           
                <?php } ?>            
                <input name="file3" type="file" id="file3"/>          
            </div>         
            <div class="filediv">     
                <?php
                $file4 = $this->session->userdata('file4');
                if ($file2 != '') {
                    ?>                    <div id="abcd4" class="abcd">            
                        <img id="previewimg4" src="<?php echo base_url() ?>../uploads/bike_image/<?php echo $file4 ?>">      
                        <img id="imgup" src="img/up.png" alt="Upload">         
                    </div>                <?php } ?>            
                <input name="file4" type="file" id="file4"/>         
            </div>         
            <div class="filediv">        
                <?php
                $file5 = $this->session->userdata('file5');
                if ($file5 != '') {
                    ?>                

                    <div id="abcd5" class="abcd">                    
                        <img id="previewimg5" src="<?php echo base_url() ?>../uploads/bike_image/<?php echo $file5 ?>">                       

                        <img id="imgup" src="img/up.png" alt="Upload">                  
                    </div>               
                <?php } ?>              
                <input name="file5" type="file" id="file5"/>     
            </div>     
        </div>      
        <div class="clear"></div>    
        <div class="button_p_n">      
            <input  class="previous_button" type="submit" onclick="history.back(-1)" value="Previous"/>     
            <span class="hide_button">             
                <input class="next_button" type="submit" value="Next" onclick="hide_button();" name="submit" id="upload" class="next_previous_button"/>       
            </span>         
            <span class="show_button" style="float:right;"> <img src="img/load_process.gif" width="30px" height="30px"/></span> 
        </div>   
        <div class="clear"></div>    
    </form> 
    <div class="clear"></div>
</div>