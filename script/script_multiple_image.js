var abc = 0; //Declaring and defining global increement variable
var i = 1;
$(document).ready(function () {

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
//    $('#add_more').click(function () {
//        i = i + 1;
//        if (i == 5) {
//            $('.upload').hide()
//        }
//        ;
//        $(this).after($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
//                $("<input/>", {name: 'file[]', type: 'file', id: 'file'})
//                ));
//    });

//following function will executes on change event of file input to select different file	
    $('body').on('change', '#file0', function () {
        //if (this.files && this.files[0]) {
            abc = 0; //increementing global variable by 1

            var z = abc - 1;
            var x = $(this).parent().find('#previewimg' + z).remove();
            $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");

            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);

            //$(this).hide();
            $("#abcd" + abc).append($("<img/>", {id: 'img', src: 'img/x.png', alt: 'delete'}).click(function () {
                // $(this).parent().parent().remove();
                $(this).parent().remove();
            }));
       // }
    });




    $('body').on('change', '#file1', function () {
        //if (this.files && this.files[1]) {
            abc = 1; //increementing global variable by 1

            var z = abc - 1;
            var x = $(this).parent().find('#previewimg' + z).remove();
            $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");

            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);

            //$(this).hide();
            $("#abcd" + abc).append($("<img/>", {id: 'img', src: 'img/x.png', alt: 'delete'}).click(function () {
                // $(this).parent().parent().remove();
                $(this).parent().remove();
            }));
        //}
    });
    
      $('body').on('change', '#file2', function () {
        //if (this.files && this.files[2]) {
            abc = 2; //increementing global variable by 1

            var z = abc - 1;
            var x = $(this).parent().find('#previewimg' + z).remove();
            $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");

            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);

            //$(this).hide();
            $("#abcd" + abc).append($("<img/>", {id: 'img', src: 'img/x.png', alt: 'delete'}).click(function () {
                // $(this).parent().parent().remove();
                $(this).parent().remove();
            }));
       // }
    });
    
      $('body').on('change', '#file3', function () {
        //if (this.files && this.files[3]) {
            abc = 3; //increementing global variable by 1

            var z = abc - 1;
            var x = $(this).parent().find('#previewimg' + z).remove();
            $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");

            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);

            //$(this).hide();
            $("#abcd" + abc).append($("<img/>", {id: 'img', src: 'img/x.png', alt: 'delete'}).click(function () {
                // $(this).parent().parent().remove();
                $(this).parent().remove();
            }));
        //}
    });
    
      $('body').on('change', '#file4', function () {
        //if (this.files && this.files[4]) {
            abc = 4; //increementing global variable by 1

            var z = abc - 1;
            var x = $(this).parent().find('#previewimg' + z).remove();
            $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");

            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);

            //$(this).hide();
            $("#abcd" + abc).append($("<img/>", {id: 'img', src: 'img/x.png', alt: 'delete'}).click(function () {
                // $(this).parent().parent().remove();
                $(this).parent().remove();
            }));
       // }
    });
    
      $('body').on('change', '#file5', function () {
        //if (this.files && this.files[5]) {
            abc = 5; //increementing global variable by 1

            var z = abc - 1;
            var x = $(this).parent().find('#previewimg' + z).remove();
            $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");

            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);

            //$(this).hide();
            $("#abcd" + abc).append($("<img/>", {id: 'img', src: 'img/x.png', alt: 'delete'}).click(function () {
                // $(this).parent().parent().remove();
                $(this).parent().remove();
            }));
        //}
    });






//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    }
    ;

    $('#upload').click(function (e) {
        var name = $(":file").val();
         var name1 = $(".first_img").val();
        if (!name && name1=='')
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});