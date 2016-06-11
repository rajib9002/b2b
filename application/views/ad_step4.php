
<script src="script/jquery.min.js"></script>
<script src="script/script_multiple_image.js"></script>
<link rel="stylesheet" type="text/css" href="styles/style_multiple_image.css">

<script type="text/javascript">
    function hide_button() {
        var name = $(":file").val();
        if (name) {
            $j('.hide_button').hide();
            $j('.show_button').show();
        }
    }
</script>
<style>
    .abcd{position:absolute;top:30px;}
    .filediv{
        background: url(images/img_bg.jpg) no-repeat;
        width:138px;
        height:140px;
        position:relative;
        float:left;
        display: inline-block;
        margin-left:13px;
    }
    .filediv  input{
        filter: alpha(opacity=0);
        opacity: 0;
        height: 100%;
        cursor: pointer;
        width: 138px;
    }
</style>

<div class="step2_upper">
    <h2>Step 6 : Add Photos</h2>
</div>

<form enctype="multipart/form-data" action="<?= site_url($action) ?>" method="post" class="">
    <div class="content step_content">
        <div id="maindiv">
            <div id="formdiv" style="width:900px;">
        <!--        <form enctype="multipart/form-data" action="<?= $action ?>" method="post" class="form2">                    
                    <div style="color:#fff; float: left; font-size: 14px;margin-right: 10px">Bike Images :</div> 
                    <div class="clear"></div>
                    <input class="hide_button upload" type="button" id="add_more"  value="Add More Images"/>
                    <div id="filediv">
                        <input style="padding: 5px; border-radius:5px;"name="file[]" type="file" id="file"/>
                    </div>
        
                    <div id="all_images">
                    </div>
                    <div class="clear"></div>
        
                    <span style="float: left; margin-top: 90px">
                        <a class="next_previous_button" href="" onclick='window.history.back();'>
                            < Previous Step
                        </a>
                    </span>
                    <span  style="float:right; margin-top: 90px">        
                        <span class="hide_button"> <input type="submit" value="Next Step >" onclick="hide_button();" name="submit" id="upload" class="next_previous_button"/></span>
                        <span class="show_button"> Images are Uploading, Wait Few moment Please....</span>
                         <span class="show_button"> <img src="img/load_process.gif" width="110"/></span>
                    </span>
        
        
        
                </form>-->




                <div  style="margin-left:-15px;">
                    <div class="filediv">
                        <input name="file0" type="file" id="file0"/>
                    </div>
                    <div class="filediv">
                        <input name="file1" type="file" id="file1"/>
                    </div>
                    <div class="filediv">
                        <input name="file2" type="file" id="file2"/>
                    </div>
                    <div class="filediv">
                        <input name="file3" type="file" id="file3"/>
                    </div>
                    <div class="filediv">
                        <input name="file4" type="file" id="file4"/>
                    </div>
                    <div class="filediv">
                        <input name="file5" type="file" id="file5"/>
                    </div>
                </div>
                <div class="clear"></div>



                
            </div>



        </div>
        <div class="clear"></div>
    </div>
    
    
    
    <div class="clear"></div>
    <span class="prev_step">
        <input  class="next_previous_button" type="submit" onclick="history.back(-1)" value="< Previous Step"/>

    </span>
    <span  class="next_step hide_button">
        <input  class="next_previous_button" type="submit" name="submit"  onclick="hide_button();" id="upload"  value="Next Step >"/>
        
        
<!--        <span class="hide_button"> 
            <input class="next_button" type="submit" value="Next" onclick="hide_button();" name="submit" id="upload" class="next_previous_button"/>
        </span>-->
        <span class="show_button" style="float:right;"> <img src="images/load_process.gif" width="30px" height="30px"/></span>
        
    </span>
    
<!--    <div class="button_p_n">
        <input  class="previous_button" type="submit" onclick="history.back(-1)" value="Previous"/>
        <span class="hide_button"> 
            <input class="next_button" type="submit" value="Next" onclick="hide_button();" name="submit" id="upload" class="next_previous_button"/>
        </span>
        <span class="show_button" style="float:right;"> <img src="img/load_process.gif" width="30px" height="30px"/></span>
    </div>-->
    <div class="clear"></div>
</form>