jQuery(document).ready(function () {
var imageSettings = {
        MAX_WIDTH: 300,
        MAX_HEIGHT: 300,
        PREVIEW_WIDTH: 70
        },
        
        progressBar = jQuery("#progress"),
        display = jQuery("#display");
        progressBar.hide();
        jQuery('#filesToUpload').on('change', fileSelect);
        
        
        
        progressBar1 = jQuery("#progress1"),
        display1 = jQuery("#display1");
        progressBar1.hide();
        jQuery('#filesToUpload1').on('change', fileSelect1);
        
        progressBar2 = jQuery("#progress2"),
        display2 = jQuery("#display2");
        progressBar2.hide();
        jQuery('#filesToUpload2').on('change', fileSelect2);
        
        progressBar3 = jQuery("#progress3"),
        display3 = jQuery("#display3");
        progressBar3.hide();
        jQuery('#filesToUpload3').on('change', fileSelect3);
        
        progressBar4 = jQuery("#progress4"),
        display4 = jQuery("#display4");
        progressBar4.hide();
        jQuery('#filesToUpload4').on('change', fileSelect4);
        
        progressBar5 = jQuery("#progress5"),
        display5 = jQuery("#display5");
        progressBar5.hide();
        jQuery('#filesToUpload5').on('change', fileSelect5);
        
        
        function fileSelect(evt) {
        if (window.File && window.FileReader && window.FileList && window.Blob) {
        let files = evt.target.files,
                file;
                for (let i = 0; file = files[i]; i++) {
        if (!file.type.match('image.*')) {
        continue;
        }
        jQuery('#filesInfo').empty();
        resizeAndUpload(file,0).then(function (response) {
        let divImgPreview = jQuery('<div/>'),
                imgPreview = jQuery('<img/>').attr({
        width: imageSettings.PREVIEW_WIDTH,
                src: response
        }).appendTo(divImgPreview);
                jQuery('#filesInfo').html(divImgPreview);
        });
        }
        } else {
        alert('The File APIs are not fully supported in this browser.');
        }
        }
        
        
         function fileSelect1(evt) {
        if (window.File && window.FileReader && window.FileList && window.Blob) {
        let files = evt.target.files,
                file;
                for (let i = 0; file = files[i]; i++) {
        if (!file.type.match('image.*')) {
        continue;
        }
        jQuery('#filesInfo1').empty();
        resizeAndUpload(file,1).then(function (response) {
        let divImgPreview = jQuery('<div/>'),
                imgPreview = jQuery('<img/>').attr({
        width: imageSettings.PREVIEW_WIDTH,
                src: response
        }).appendTo(divImgPreview);
                jQuery('#filesInfo1').html(divImgPreview);
        });
        }
        } else {
        alert('The File APIs are not fully supported in this browser.');
        }
        }
        
         function fileSelect2(evt) {
        if (window.File && window.FileReader && window.FileList && window.Blob) {
        let files = evt.target.files,
                file;
                for (let i = 0; file = files[i]; i++) {
        if (!file.type.match('image.*')) {
        continue;
        }
        jQuery('#filesInfo2').empty();
        resizeAndUpload(file,2).then(function (response) {
        let divImgPreview = jQuery('<div/>'),
                imgPreview = jQuery('<img/>').attr({
        width: imageSettings.PREVIEW_WIDTH,
                src: response
        }).appendTo(divImgPreview);
                jQuery('#filesInfo2').html(divImgPreview);
        });
        }
        } else {
        alert('The File APIs are not fully supported in this browser.');
        }
        }
        
         function fileSelect3(evt) {
        if (window.File && window.FileReader && window.FileList && window.Blob) {
        let files = evt.target.files,
                file;
                for (let i = 0; file = files[i]; i++) {
        if (!file.type.match('image.*')) {
        continue;
        }
        jQuery('#filesInfo3').empty();
        resizeAndUpload(file,3).then(function (response) {
        let divImgPreview = jQuery('<div/>'),
                imgPreview = jQuery('<img/>').attr({
        width: imageSettings.PREVIEW_WIDTH,
                src: response
        }).appendTo(divImgPreview);
                jQuery('#filesInfo3').html(divImgPreview);
        });
        }
        } else {
        alert('The File APIs are not fully supported in this browser.');
        }
        }
        
         function fileSelect4(evt) {
        if (window.File && window.FileReader && window.FileList && window.Blob) {
        let files = evt.target.files,
                file;
                for (let i = 0; file = files[i]; i++) {
        if (!file.type.match('image.*')) {
        continue;
        }
        jQuery('#filesInfo4').empty();
        resizeAndUpload(file,4).then(function (response) {
        let divImgPreview = jQuery('<div/>'),
                imgPreview = jQuery('<img/>').attr({
        width: imageSettings.PREVIEW_WIDTH,
                src: response
        }).appendTo(divImgPreview);
                jQuery('#filesInfo4').html(divImgPreview);
        });
        }
        } else {
        alert('The File APIs are not fully supported in this browser.');
        }
        }
        
         function fileSelect5(evt) {
        if (window.File && window.FileReader && window.FileList && window.Blob) {
        let files = evt.target.files,
                file;
                for (let i = 0; file = files[i]; i++) {
        if (!file.type.match('image.*')) {
        continue;
        }
        jQuery('#filesInfo5').empty();
        resizeAndUpload(file,5).then(function (response) {
        let divImgPreview = jQuery('<div/>'),
                imgPreview = jQuery('<img/>').attr({
        width: imageSettings.PREVIEW_WIDTH,
                src: response
        }).appendTo(divImgPreview);
                jQuery('#filesInfo5').html(divImgPreview);
        });
        }
        } else {
        alert('The File APIs are not fully supported in this browser.');
        }
        }
        

function resizeAndUpload(file,counter) {
return new Promise(function (resolve, reject) {
let reader = new FileReader();
        reader.onloadend = function () {
        let tempImg = new Image();
                tempImg.src = reader.result;
                tempImg.onload = function () {
                let tempW = tempImg.width;
                        let tempH = tempImg.height;
                        if (tempW > tempH) {
                if (tempW > imageSettings.MAX_WIDTH) {
                tempH *= imageSettings.MAX_WIDTH / tempW;
                        tempW = imageSettings.MAX_WIDTH;
                }
                } else {
                if (tempH > imageSettings.MAX_HEIGHT) {
                tempW *= imageSettings.MAX_HEIGHT / tempH;
                        tempH = imageSettings.MAX_HEIGHT;
                }
                }
                let canvas = jQuery('<canvas/>').attr({
                id: 'tempImg',
                        width: tempW + 'px',
                        height: tempH + 'px'
                }).get(0);
                        let ctx = canvas.getContext("2d");
                        ctx.drawImage(this, 0, 0, tempW, tempH);
                        let dataURL = canvas.toDataURL("image/jpeg");
                        let xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function (ev) {
                        };
                        
                        if(counter==0){
                            xhr.open('POST', 'http://www.bike2biker.com/m/adz/pic0/', true);
                        }
                        if(counter==1){
                            xhr.open('POST', 'http://www.bike2biker.com/m/adz/pic1/', true);
                        }
                        if(counter==2){
                            xhr.open('POST', 'http://www.bike2biker.com/m/adz/pic2/', true);
                        }
                        if(counter==3){
                            xhr.open('POST', 'http://www.bike2biker.com/m/adz/pic3/', true);
                        }
                        if(counter==4){
                            xhr.open('POST', 'http://www.bike2biker.com/m/adz/pic4/', true);
                        }
                        if(counter==5){
                            xhr.open('POST', 'http://www.bike2biker.com/m/adz/pic5/', true);
                        }
                        
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        let data = 'image=' + dataURL;
                        
                        
                        if(counter==0){
                                            if (xhr.upload) {
                                    progressBar.show();
                                            xhr.upload.onprogress = function (e) {
                                            if (e.lengthComputable) {
                                            progressBar.attr({
                                            'max': e.total,
                                                    'value': e.loaded
                                            });
                                                    display.html(Math.floor((e.loaded / e.total) * 100) + '%');
                                            }
                                            }
                                    xhr.upload.onloadstart = function (e) {
                                    progressBar.attr('value', 0);
                                            display.html('0%');
                                    }
                                    xhr.upload.onloadend = function (e) {
                                    progressBar.attr('value', e.loaded);
                                    }
                                    }
                                    
                        }  
                        
                        
                         if(counter==1){
                                            if (xhr.upload) {
                                    progressBar1.show();
                                            xhr.upload.onprogress = function (e) {
                                            if (e.lengthComputable) {
                                            progressBar1.attr({
                                            'max': e.total,
                                                    'value': e.loaded
                                            });
                                                    display1.html(Math.floor((e.loaded / e.total) * 100) + '%');
                                            }
                                            }
                                    xhr.upload.onloadstart = function (e) {
                                    progressBar1.attr('value', 0);
                                            display1.html('0%');
                                    }
                                    xhr.upload.onloadend = function (e) {
                                    progressBar1.attr('value', e.loaded);
                                    }
                                    }
                                    
                        }
                        
                          if(counter==2){
                                            if (xhr.upload) {
                                    progressBar2.show();
                                            xhr.upload.onprogress = function (e) {
                                            if (e.lengthComputable) {
                                            progressBar2.attr({
                                            'max': e.total,
                                                    'value': e.loaded
                                            });
                                                    display2.html(Math.floor((e.loaded / e.total) * 100) + '%');
                                            }
                                            }
                                    xhr.upload.onloadstart = function (e) {
                                    progressBar2.attr('value', 0);
                                            display2.html('0%');
                                    }
                                    xhr.upload.onloadend = function (e) {
                                    progressBar2.attr('value', e.loaded);
                                    }
                                    }
                                    
                        }
                        
                          if(counter==3){
                                            if (xhr.upload) {
                                    progressBar3.show();
                                            xhr.upload.onprogress = function (e) {
                                            if (e.lengthComputable) {
                                            progressBar3.attr({
                                            'max': e.total,
                                                    'value': e.loaded
                                            });
                                                    display3.html(Math.floor((e.loaded / e.total) * 100) + '%');
                                            }
                                            }
                                    xhr.upload.onloadstart = function (e) {
                                    progressBar3.attr('value', 0);
                                            display3.html('0%');
                                    }
                                    xhr.upload.onloadend = function (e) {
                                    progressBar3.attr('value', e.loaded);
                                    }
                                    }
                                    
                        }
                        if(counter==4){
                                            if (xhr.upload) {
                                    progressBar4.show();
                                            xhr.upload.onprogress = function (e) {
                                            if (e.lengthComputable) {
                                            progressBar4.attr({
                                            'max': e.total,
                                                    'value': e.loaded
                                            });
                                                    display4.html(Math.floor((e.loaded / e.total) * 100) + '%');
                                            }
                                            }
                                    xhr.upload.onloadstart = function (e) {
                                    progressBar4.attr('value', 0);
                                            display4.html('0%');
                                    }
                                    xhr.upload.onloadend = function (e) {
                                    progressBar4.attr('value', e.loaded);
                                    }
                                    }
                                    
                        }
                        
                        if(counter==5){
                                            if (xhr.upload) {
                                    progressBar5.show();
                                            xhr.upload.onprogress = function (e) {
                                            if (e.lengthComputable) {
                                            progressBar5.attr({
                                            'max': e.total,
                                                    'value': e.loaded
                                            });
                                                    display5.html(Math.floor((e.loaded / e.total) * 100) + '%');
                                            }
                                            }
                                    xhr.upload.onloadstart = function (e) {
                                    progressBar5.attr('value', 0);
                                            display5.html('0%');
                                    }
                                    xhr.upload.onloadend = function (e) {
                                    progressBar5.attr('value', e.loaded);
                                    }
                                    }
                                    
                        }
                        
                        
                                    
                                    
                xhr.onload = function () {
                if (xhr.status == 200) {
                resolve(xhr.response);
                }
                else {
                reject(Error(xhr.statusText));
                }
                }

                xhr.onerror = function () {
                reject(Error("Network Error"));
                }

                xhr.send(data);
                }
        }
reader.readAsDataURL(file);
});
}
});
