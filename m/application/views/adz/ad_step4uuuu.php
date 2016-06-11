<div class="content_m">
    <div id="main" style="position:relative;width:300px;margin:0 auto;height:230px;margin-bottom:50px">
        <ul id="image-list" style="position:absolute;left:0;top:0;">

        </ul>
        <form method="post" enctype="multipart/form-data"  action="<?php echo site_url('adz/step4')?>" style="position:absolute;left:0;top:0;">
            <input style="width:70px;height:70px;opacity:0;" type="file" name="images" id="images" multiple/>
            <button style="opacity:0;" type="submit" id="btn"></button>
        </form>
        <div id="response" style="color:red;margin-left:-300px;"></div>
    </div>
    <div class="clear"></div>
    <a style="display:block" href="<?php echo site_url('adz/step6')?>" class="next_previous_button">Next</a>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="script/upload.js"></script>
</div>






