<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="script/script_multiple_image.js"></script>
<link rel="stylesheet" type="text/css" href="styles/style_multiple_image.css">
<script type="text/javascript">
//    function hide_button() {
//        var name = $(":file").val();
//        if (name) {
//            $j('.hide_button').hide();
//            $j('.show_button').show();
//        }
//    }
</script>

<style>
    .filediv{
        background: url(images/img_bg.jpg) no-repeat;width:72px;height:70px;float:left;
        position:relative;
        margin-right:10px; margin-bottom:10px;
    }
    .filediv  input{
        filter: alpha(opacity=0);
        opacity: 0;
    }
</style>

<div class="step2_upper">
    <h2>Step 6 : Add Photos</h2>
</div>
<form enctype="multipart/form-data" action="<?= site_url($action) ?>" method="post" class="">
    <div class="content" style="background-color:#fff;padding:20px 20px 5px 20px;width:280px;margin:10px auto;">
        <div class='' style="width:100%;">

 <!--<input class="hide_button upload"  type="button" id="add_more"  value="Add More Images"/>-->
            <br/>
            <div class="filediv">
                <input name="file[]" type="file" id="file"/>
            </div>
            <div class="filediv">
                <input name="file[]" type="file" id="file"/>
            </div>
            <div class="filediv">
                <input name="file[]" type="file" id="file"/>
            </div>
            <div class="filediv">
                <input name="file[]" type="file" id="file"/>
            </div>
            <div class="filediv">
                <input name="file[]" type="file" id="file"/>
            </div>
            
            <div class="filediv">
                <input name="file[]" type="file" id="file"/>
            </div>
            <br/>







<!--            <div id="all_images">
            </div>-->
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div style="padding:30px 0;">
            <span style="float: left;">
                <a class="next_previous_button" href="" onclick='window.history.back();'>
                    < Previous Step
                </a>
            </span>
            <span  style="float:right;">
                <span class="hide_button"> <input type="submit" value="Next Step >" onclick="hide_button();" name="submit" id="upload" class="next_previous_button"/></span>
    <!--                <span class="show_button"> Images are Uploading, Wait Few moment Please....</span>-->
                <span class="show_button"> <img src="img/load_process.gif" width="110"/></span>
            </span>
            <div class="clear"></div>
        </div>
    </div>
</form>