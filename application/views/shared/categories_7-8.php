<?php $type_rows = common:: get_type_data(); ?>

<style>
    ul.sdt_menu{
        z-index: 5000000;
        margin:0;
        padding:0;
        list-style: none;
        font-family:"Myriad Pro", "Trebuchet MS", sans-serif;
        font-size:14px;

    }
    ul.sdt_menu a{
        text-decoration:none;
        outline:none;
    }

    ul.sdt_menu li{
        /*border:1px solid red;*/
        position:relative;
        padding:0;
        display:block;
        background-color: #fff;
        border-bottom: 1px solid gray;

    }


    ul.sdt_menu li:hover{
        position:relative;
        padding:0;
        display:block;
        background-color: #fbfbfb;
        border-bottom: 1px solid gray;

    }

    ul.sdt_menu li a span.sdt_link{
        color:#7b7b7b;
        font-weight: normal;
    }
    ul.sdt_menu li a span.sdt_link:hover{

        color:#000;



    }
    ul.sdt_menu li a img{
        border:none;
        position:absolute;
        width:0px;
        height:0px;
        bottom:0px;
        left:85px;
        z-index:100;
        -moz-box-shadow:0px 0px 4px #000;
        -webkit-box-shadow:0px 0px 4px #000;
        box-shadow:0px 0px 4px #000;
    }

    ul.sdt_menu li div.sdt_box a{
        float:left;
        clear:both;
        /*        line-height:30px;*/
        color:#0B75AF;
    }
    ul.sdt_menu li div.sdt_box a:first-child{
        margin-top:15px;
    }
    ul.sdt_menu li div.sdt_box a:hover{
        color:#fff;
    }

    .sidebarmenu ul{
        margin: 0;
        padding: 0;
        list-style-type: none;
        font-size:14px;
        font-family:arial;
        color:#7b7b7b;
    }
    .sidebarmenu ul li{
        position: relative;
    }
    .sidebarmenu ul li a{
        font-weight: normal;
        display: block;
        overflow: auto; 
        text-decoration: none;
        text-align: left;
    }
</style>










<!--



<script type="text/javascript" src="script/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="script/jquery.easing.1.3.js"></script>
<script type="text/javascript">
    $(function() {
        /**
         * for each menu element, on mouseenter,
         * we enlarge the image, and show both sdt_active span and
         * sdt_wrap span. If the element has a sub menu (sdt_box),
         * then we slide it - if the element is the last one in the menu
         * we slide it to the left, otherwise to the right
         */
        $('#sdt_menu > li').bind('mouseenter',function(){
            var $elem = $(this);
            $elem.find('img')
            .stop(true)
            .animate({
                'width':'200px',
                'height':'166px',
                'left':'140px',
                'bottom':'0',
                'z-index':'10000000'
            },400,'easeOutBack')
            .andSelf()
            .find('.sdt_wrap')
            .stop(true)
            .animate({'top':'-70px','z-index':'100000'},500,'easeOutBack')
            .andSelf()
            .find('.sdt_active')
            .stop(true)
            .animate({'height':'0'},300,function(){
                //                var $sub_menu = $elem.find('.sdt_box');
                //                if($sub_menu.length){
                //                    var left = '166px';
                //                    if($elem.parent().children().length == $elem.index()+1)
                //                        left = '-166px';
                //                    $sub_menu.show().animate({'left':left},200);
                //                }
            });
        }).bind('mouseleave',function(){
            var $elem = $(this);
            var $sub_menu = $elem.find('.sdt_box');
            if($sub_menu.length)
                $sub_menu.hide().css('left','0px');

            $elem.find('.sdt_active')
            .stop(true)
            .animate({'height':'0px'},300)
            .andSelf().find('img')
            .stop(true)
            .animate({
                'width':'0px',
                'height':'0px',
                'left':'85px'},400)
            .andSelf()
            .find('.sdt_wrap')
            .stop(true)
            .animate({'top':'25px'},500);
        });
    });
</script>
-->



<script type="text/javascript">

    //Nested Side Bar Menu (Mar 20th, 09)
    //By Dynamic Drive: http://www.dynamicdrive.com/style/

    var menuids=["sidebarmenu1"] //Enter id(s) of each Side Bar Menu's main UL, separated by commas

    function initsidebarmenu(){
        for (var i=0; i<menuids.length; i++){
            var ultags=document.getElementById(menuids[i]).getElementsByTagName("ul")
            for (var t=0; t<ultags.length; t++){
                ultags[t].parentNode.getElementsByTagName("a")[0].className+=" subfolderstyle"
                if (ultags[t].parentNode.parentNode.id==menuids[i]) //if this is a first level submenu
                    ultags[t].style.left=ultags[t].parentNode.offsetWidth+"px" //dynamically position first level submenus to be width of main menu item
                else //else if this is a sub level submenu (ul)
                    ultags[t].style.left=ultags[t-1].getElementsByTagName("a")[0].offsetWidth+"px" //position menu to the right of menu item that activated it
                ultags[t].parentNode.onmouseover=function(){
                    this.getElementsByTagName("ul")[0].style.display="block"
                }
                ultags[t].parentNode.onmouseout=function(){
                    this.getElementsByTagName("ul")[0].style.display="none"
                }
            }
            for (var t=ultags.length-1; t>-1; t--){ //loop through all sub menus again, and use "display:none" to hide menus (to prevent possible page scrollbars
                ultags[t].style.visibility="visible"
                ultags[t].style.display="none"
            }
        }
    }

    if (window.addEventListener)
        window.addEventListener("load", initsidebarmenu, false)
    else if (window.attachEvent)
        window.attachEvent("onload", initsidebarmenu)

</script>
<div class="mid_left">

    <!--<div id="accordion"> 
    <?php
    if (count($type_rows) > 0):
        foreach ($type_rows as $row):
            ?>
                                <div class="search1"><h3><?= $row['type_name'] ?></h3></div>
                                <div>
            <?php
            $brows = common:: get_type_data($row['type_id']);
            if (count($brows) > 0):
                ?>
                                                <ul id="sdt_menu" class="sdt_menu"><?php
            foreach ($brows as $row2):
                    ?>
                                    
                                    
                                                                <li>
                                                                    <a href="<?php echo site_url('adz/index/all/' . $row2['type_id']); ?>">
                                                                        <img src="<?php echo base_url() ?>/uploads/bike_type_image/<?php echo $row2['type_image'] ?>" alt="<?php echo $row2['type_image'] ?>"/>
                                                                        <span class="sdt_active"></span>
                                                                        <span class="sdt_wrap">
                                                                            <span class="sdt_link"><?= $row['type_name'] . '      ' . $row2['type_name'] ?></span>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <div class="clear"></div>
                                                                                            <li style="list-style: none; margin-left: -35px; float: left;"> <a style="text-align: left;" href="<?php echo site_url('adz/index/all/' . $row2['type_id']); ?>"><?= $row['type_name'] . '      ' . $row2['type_name'] ?> </a> </li>  
                                    
                    <?php
                endforeach;
                ?>
                                                </ul><?php
        endif;
            ?>              
                                </div>
            <?php
        endforeach;
    endif;
    ?>
    
    </div>-->

    <a href="<?php echo site_url('adz/add_adz'); ?>"><img src="images/post_btn_2.png"/></a><br/><br/><br/>

<!--    <h1 style="color:#c9bec2;font-weight: normal;font-size: 28px;background-color:#36121e;word-spacing: 5px;letter-spacing: 2px;font-family: 'tahoma';margin:0;padding:10px 5px;"><strong>all</strong>types </h1>                    -->

    <div class="sidebarmenu">



        <ul id="sidebarmenu1">

            <?php
            if (count($type_rows) > 0):
                foreach ($type_rows as $row):
                    ?>

                    <li><a class="search1" href=""><?= $row['type_name'] ?></a>
                        <ul id="sdt_menu" class="sdt_menu">
                            <?php
                            $brows = common:: get_type_data($row['type_id']);
                            if (count($brows) > 0):
                                foreach ($brows as $row2):
                                    ?>
                                    <li>
                                        <a href="<?php echo site_url('adz/index/all/' . $row2['type_id']); ?>">
                                            <img src="<?php echo base_url() ?>/uploads/bike_type_image/<?php echo $row2['type_image'] ?>" alt="<?php echo $row2['type_image'] ?>"/>
                                            <span class="sdt_active"></span>
                                            <span class="sdt_wrap">
                                                <span class="sdt_link"><?= $row2['type_name'] ?></span>
                                            </span>
                                        </a>
                                    </li>
                                    <div class="clear"></div>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </ul>
                    </li>
                <?php endforeach;
            endif; ?>


        </ul>
    </div>
</div>
