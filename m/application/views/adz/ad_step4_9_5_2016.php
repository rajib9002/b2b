<div class="content_m"> 
    <style>
        .img_c{width:280px;margin:0 auto;}
        .img_div{height:90px;float:left;margin-right:5px;margin-bottom:10px;}
        .bg_img{width:72px;height:70px;position:relative;background-image:url('images/img_bg.jpg');}
        .bg_img level{position:absolute;}
        .bg_img output{position:absolute;left:0;top:0;height:70px;width:70px;}
        .bg_img input{opacity:0;position:absolute;left:0;top:0;height:70px;width:70px;}
        .files_img_size img{width:71px;height:70px;}
        .prog{position:relative;}
        .prog progress{width:72px;background-color:#0059ab;height:20px;}
        .prog span{position: absolute;left: 22px;top: 2px;font-size: 12px;color: #fff;}
    </style>

    <?php
    $file0 = $this->session->userdata('file0');
    $file1 = $this->session->userdata('file1');
    $file2 = $this->session->userdata('file2');
    $file3 = $this->session->userdata('file3');
    $file4 = $this->session->userdata('file4');
    $file5 = $this->session->userdata('file5');
    ?>

    <form enctype="multipart/form-data" method="post" action="<?= site_url($action) ?>">
        <div class="img_div">
            <div class="row bg_img">
                <label  for="fileToUpload"></label>
                <output id="filesInfo" class="files_img_size">
                    <?php if ($file0 != '') { ?>
                        <div><img width="70" src="../uploads/bike_image/<?= $file0 ?>"></div>
                    <?php } ?>
                </output>
                <input   type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple"/>
            </div>
            <div  class="prog"><progress  id="progress" value="0"></progress><span id="display"></span></div>
        </div>
        <div class="img_div">
            <div class="row bg_img">
                <label  for="fileToUpload1"></label>
                <output id="filesInfo1" class="files_img_size">
                    <?php if ($file1 != '') { ?>
                        <div><img width="70" src="../uploads/bike_image/<?= $file1 ?>"></div>
                    <?php } ?>
                </output>
                <input   type="file" name="filesToUpload1[]" id="filesToUpload1" multiple="multiple"/>
            </div>
            <div  class="prog"><progress  id="progress1" value="0"></progress><span id="display1"></span></div>
        </div>
        <div class="img_div">
            <div class="row bg_img">
                <label  for="fileToUpload2"></label>
                <output id="filesInfo2" class="files_img_size">
                    <?php if ($file2 != '') { ?>
                        <div><img width="70" src="../uploads/bike_image/<?= $file2 ?>"></div>
                    <?php } ?>
                </output>
                <input   type="file" name="filesToUpload2[]" id="filesToUpload2" multiple="multiple"/>
            </div>
            <div  class="prog"><progress  id="progress2" value="0"></progress><span id="display2"></span></div>
        </div>
        <div class="img_div">
            <div class="row bg_img">
                <label  for="fileToUpload3"></label>
                <output id="filesInfo3" class="files_img_size">
                    <?php if ($file3 != '') { ?>
                        <div><img width="70" src="../uploads/bike_image/<?= $file3 ?>"></div>
                    <?php } ?>
                </output>
                <input   type="file" name="filesToUpload3[]" id="filesToUpload3" multiple="multiple"/>
            </div>
            <div  class="prog"><progress  id="progress3" value="0"></progress><span id="display3"></span></div>
        </div>
        <div class="img_div">
            <div class="row bg_img">
                <label  for="fileToUpload4"></label>
                <output id="filesInfo4" class="files_img_size">
                    <?php if ($file4 != '') { ?>
                        <div><img width="70" src="../uploads/bike_image/<?= $file4 ?>"></div>
                    <?php } ?>
                </output>
                <input   type="file" name="filesToUpload4[]" id="filesToUpload4" multiple="multiple"/>
            </div>
            <div  class="prog"><progress  id="progress4" value="0"></progress><span id="display4"></span></div>
        </div>
        <div class="img_div">
            <div class="row bg_img">
                <label  for="fileToUpload5"></label>
                <output id="filesInfo5" class="files_img_size">
                    <?php if ($file5 != '') { ?>
                        <div><img width="70" src="../uploads/bike_image/<?= $file5 ?>"></div>
                    <?php } ?>
                </output>
                <input   type="file" name="filesToUpload5[]" id="filesToUpload5" multiple="multiple"/>
            </div>
            <div  class="prog"><progress  id="progress5" value="0"></progress><span id="display5"></span></div>
        </div>
        <div class="clear"></div>
        <div class="button_p_n">      
            <input  class="previous_button" type="submit" onclick="history.back(-1)" value="Previous"/>     
                       
             <a style="float: right;
    text-align: center;
    cursor: pointer;
    color: #fff;
    background-color: #0059ab;
    border-radius: 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -o-border-radius: 0;
    -ms-border-radius: 0;
    border: 0;
    outline: 0;
    padding: 10px 20px;
    margin-top: 8px;
    font-size: 15px;
    color: #fff;" href="<?php echo site_url('adz/step6');?>" >Next</a>   
                    
            <!--<span class="show_button" style="float:right;"> <img src="img/load_process.gif" width="30px" height="30px"/></span>--> 
        </div>   
        <div class="clear"></div> 
    </form>
<script src="script/photo/jquery-2.2.3.js" type="application/javascript"></script>
    <script src="script/photo/app.js" type="application/javascript"></script>
</div>