<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <base href="<?= base_url() ?>"/>
    <title> <?= $page_title ?> :: Car Reconditioned </title>
    <link href="<?= base_url() ?>styles/style.css" rel="stylesheet" type="text/css">  
<!--    <script type='text/javascript' src='<?= base_url() ?>tools/jquery-1.4.2.min.js'></script>-->

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
    <script type="text/javascript" src="<?= base_url() ?>tools/lightbox/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>tools/lightbox/jquery.lightbox-0.5.css"  />
    <script type="text/javascript" src="<?= base_url() ?>script/sliderman.1.3.7.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>script/flowplayer-3.2.4.min.js"></script>
    
     <script type='text/javascript' src='<?= base_url() ?>admin/tools/tiny_mce/tiny_mce.js'></script>
     <script type='text/javascript' src='<?= base_url() ?>admin/tools/tiny_mce/jquery.tinymce.js'></script>
     <script type='text/javascript' src='<?= base_url() ?>admin/tools/tiny_mce/editor.js'></script>
    

    <script type="text/javascript">
        var $j=jQuery.noConflict();
        var base_url="<?= base_url() ?>";
    </script>


    <script type="text/javascript">
        $j(function() {
            $j('#gallery a').lightBox();
        });
    </script>
<!--    <script>
        $j(function() {
            $j( "#accordion" ).accordion({
                collapsible: true
            });
        });
    </script>-->

    <script type='text/javascript' src='<?= base_url() ?>script/script.js'></script>
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
                'left':'200px',
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


<script type="text/javascript">
    $(function() {
        /**
         * for each menu element, on mouseenter,
         * we enlarge the image, and show both sdt_active span and
         * sdt_wrap span. If the element has a sub menu (sdt_box),
         * then we slide it - if the element is the last one in the menu
         * we slide it to the left, otherwise to the right
         */
        $('#header_menu > li').bind('mouseenter',function(){
            var $elem = $(this);
            $elem.find('img')
            .stop(true)
            .animate({
                'width':'80px',
                'height':'80px',
                'left':'0',
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
                'width':'40px',
                'height':'40px',
                'left':'0'},400)
            .andSelf()
            .find('.sdt_wrap')
            .stop(true)
            .animate({'top':'0'},500);
        });
    });
</script>
</head>