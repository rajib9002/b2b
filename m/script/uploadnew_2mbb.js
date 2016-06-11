//(function () {
$j(document).ready(function(){

    $j('#images').bind('change', function() {
        var image_size_r=this.files[0].size/1024/1024;
        var imp=parseFloat(image_size_r);

        //window.globalVar=imp;
        $j('#value_of_images').val(imp);
    //if(imp>=1){load_ok();}else{alert(imp);}
    //alert(globalVar);
    //alert('This file size is: ' + this.files[0].size/1024/1024 + "MB");
    });
       






    var input = document.getElementById("images"),
    formdata = false;

    function showUploadedItem (source) {


        var list = document.getElementById("image-list"),
        li   = document.createElement("li"),
        img  = document.createElement("img");
        img.src = source;
        li.appendChild(img);
        list.appendChild(li);



    }

    if (window.FormData) {
        formdata = new FormData();
        document.getElementById("btn").style.display = "none";
    }
	
    input.addEventListener("change", function (evt) {

        var abc=$j('#value_of_images').val();
        var hello=parseFloat(abc);
//        alert(hello);

        if(hello>=2){

            document.getElementById("response").innerHTML = "Uploading . . ."
            //document.getElementById("response").innerHTML = ""
            var i = 0, len = this.files.length, img, reader, file;
            for ( ; i < len; i++ ) {
                file = this.files[i];
	
                if (!!file.type.match(/image.*/)) {
                    if ( window.FileReader ) {
                        reader = new FileReader();
                        reader.onloadend = function (e) {
                            showUploadedItem(e.target.result, file.fileName);
                        };
                        reader.readAsDataURL(file);
                    }
                    if (formdata) {
                        formdata.append("images[]", file);
                                        
                    }
                }
            }


        

            if (formdata) {
                $j.ajax({
                    //url:"upload.php",
                    url:base_url+'home/add_image_all',
                    type: "POST",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        document.getElementById("response").innerHTML = res;
                    }
                });
            }

        }else{
            alert('Minimum Image size need to be 2mb');
        }


    }, false);
}());
