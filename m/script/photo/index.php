<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Uploader</title>
    </head>
    <body>
        <style>
            .img_c{width:280px;margin:0 auto;}
            .img_div{height:90px;float:left;margin-right:10px;margin-bottom:10px;}
            .bg_img{width:72px;height:70px;position:relative;background-image:url('images/img_bg.jpg');}
            .bg_img level{position:absolute;}
            .bg_img output{position:absolute;left:0;top:0;height:70px;width:70px;}
            .bg_img input{opacity:0;position:absolute;left:0;top:0;height:70px;width:70px;}
            .files_img_size img{width:71px;height:70px;}
            .prog{position:relative;}
            .prog progress{width:72px;background-color:#0059ab;}
            .prog span{position: absolute;left: 22px;top: 2px;font-size: 12px;color: #fff;}
        </style>
        <form enctype="multipart/form-data" method="post" action="" class="img_c">

            <div class="img_div">
                <div class="row bg_img">
                    <label  for="fileToUpload"></label>
                    <output id="filesInfo" class="files_img_size"></output>
                    <input   type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple"/>
                </div>
                <div  class="prog"><progress  id="progress" value="0"></progress><span id="display"></span></div>
            </div>

            <div class="img_div">
                <div class="row bg_img">
                    <label  for="fileToUpload1"></label>
                    <output id="filesInfo1" class="files_img_size"></output>
                    <input   type="file" name="filesToUpload1[]" id="filesToUpload1" multiple="multiple"/>
                </div>
                <div  class="prog"><progress  id="progress1" value="0"></progress><span id="display1"></span></div>
            </div>

            <div class="img_div">
                <div class="row bg_img">
                    <label  for="fileToUpload2"></label>
                    <output id="filesInfo2" class="files_img_size"></output>
                    <input   type="file" name="filesToUpload2[]" id="filesToUpload2" multiple="multiple"/>
                </div>
                <div  class="prog"><progress  id="progress2" value="0"></progress><span id="display2"></span></div>
            </div>

            <div class="img_div">
                <div class="row bg_img">
                    <label  for="fileToUpload3"></label>
                    <output id="filesInfo3" class="files_img_size"></output>
                    <input   type="file" name="filesToUpload3[]" id="filesToUpload3" multiple="multiple"/>
                </div>
                <div  class="prog"><progress  id="progress3" value="0"></progress><span id="display3"></span></div>
            </div>

            <div class="img_div">
                <div class="row bg_img">
                    <label  for="fileToUpload4"></label>
                    <output id="filesInfo4" class="files_img_size"></output>
                    <input   type="file" name="filesToUpload4[]" id="filesToUpload4" multiple="multiple"/>
                </div>
                <div  class="prog"><progress  id="progress4" value="0"></progress><span id="display4"></span></div>
            </div>

            <div class="img_div">
                <div class="row bg_img">
                    <label  for="fileToUpload5"></label>
                    <output id="filesInfo5" class="files_img_size"></output>
                    <input   type="file" name="filesToUpload5[]" id="filesToUpload5" multiple="multiple"/>
                </div>
                <div  class="prog"><progress  id="progress5" value="0"></progress><span id="display5"></span></div>
            </div>













        </form>



        <script src="jquery-2.2.3.js" type="application/javascript"></script>
        <script src="app.js" type="application/javascript"></script>
    </body>
</html>