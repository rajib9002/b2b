

        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>



        <style>
            html, body, div, span, applet, object, iframe,
            h1, h2, h3, h4, h5, h6, p, blockquote, pre,
            a, abbr, acronym, address, big, cite, code,
            del, dfn, em, img, ins, kbd, q, s, samp,
            small, strike, strong, sub, sup, tt, var,
            b, u, i, center,
            dl, dt, dd, ol, ul, li,
            fieldset, form, label, legend,
            table, caption, tbody, tfoot, thead, tr, th, td,
            article, aside, canvas, details, embed, 
            figure, figcaption, footer, header, hgroup, 
            menu, nav, output, ruby, section, summary,
            time, mark, audio, video {
                margin: 0;
                padding: 0;
                border: 0;
                font-size: 100%;
            }

            body{
                margin:0;padding:0;
            }



            .slider_wrapper{
                overflow: hidden;
                margin:0 auto;
                width:200px;
                height:100%;
            }
            ul#image_slider{
                position:relative;
                transition: left 0.3s ease-in;
                left:0;
                width:10000px;
            }
            ul#image_slider li{
                list-style: none;
                display: block;
                float: left;
            }

        </style>
    </head>
    

        <a href="tel:01719235897">call</a>

        <a href="sms:01719235897?body=hello">sms</a> <!--android-->

        <a href="sms:01719235897;body=hi">sms ios</a> <!--ios-->

        <a href="sms:01719235897&body=hiii">sms ios update</a>  <!--ios update-->

        <a href="mailto:rajibpaul51@yahoo.com">email</a>

        <div style="position:relative; height: 200px;">
        <div data-role="page" id="pageone" style="position:relative; min-height: 200px;">
            <span  id="prev"><img src="images/prev.png"></span>
            <span  id="next"><img src="images/next.png"></span>
            <div class="slider_wrapper">
                <ul id="image_slider">
                    <li><img width="200px" src="images/3.jpg"/></li>
                    <li><img width="200px" src="images/4.jpg"/></li>
                    <li><img width="200px" src="images/5.jpg"/></li>
                </ul>					
            </div>
        </div>
            </div>


    <script type="text/javascript">
        document.getElementById("pageone").style.height = "200px";
        var slider_wrapper;
        var ul = document.getElementById('image_slider');
        var li_items;
        var imageNumber;
        var imageWidth;
        var imageHeight;
        var prev = document.getElementById("prev");
        var next = document.getElementById("next");
        var currentPostion = 0;
        var currentImage = 0;
        function init() {
            li_items = ul.children;
            imageNumber = li_items.length;
            imageWidth = li_items[0].children[0].offsetWidth;
            ul.style.width = parseInt(imageWidth * imageNumber) + 'px';
            prev.onclick = function () {
                onClickPrev();
            };
            next.onclick = function () {
                onClickNext();
            };
        }
        function slideTo(imageToGo) {
            ul.style.left = parseInt(imageWidth * imageToGo * -1) + 'px';
            currentImage = imageToGo;
        }
        function onClickPrev() {
            if (currentImage == 0) {
                slideTo(imageNumber - 1);
            }
            else {
                slideTo(currentImage - 1);
            }
        }
        function onClickNext() {
            if (currentImage == imageNumber - 1) {
                slideTo(0);
            }
            else {
                slideTo(currentImage + 1);
            }
        }
        window.onload = init;		
		
		
        $(document).on("pagecreate","#pageone",function(){
            $("#image_slider").on("swipeleft",function(){
                //alert("You swiped left!");
	
                if (currentImage == imageNumber - 1) {
                    slideTo(0);
                }
                else {
                    slideTo(currentImage + 1);
                }
	
	
	
	
            }); 

            $("#image_slider").on("swiperight",function(){
                //alert("You swiped right!");
                if (currentImage == 0) {
                    slideTo(imageNumber - 1);
                }
                else {
                    slideTo(currentImage - 1);
                }
            }); 
                      
        });
        document.getElementById("pageone").style.height = "200px";
    </script>



<a href="tel:01719235897">call</a>

<a href="sms:01719235897?body=hello">sms</a> <!--android-->

<a href="sms:01719235897;body=hi">sms ios</a> <!--ios-->

<a href="sms:01719235897&body=hiii">sms ios update</a>  <!--ios update-->

<a href="mailto:rajibpaul51@yahoo.com">email</a>


