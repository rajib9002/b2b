$j(document).ready(function(){
    common.init();
    

});
    var common={
    init:function(){ 
        $j('.jload_area').change(function(){
            common.load_area(this);
            
        }); 
         
         $j('.jload_area2').change(function(){
            common.load_area2(this);
        });
         $j('.jtype').change(function(){
            common.load_make(this);
            
        }); 
         $j('.jmake').change(function(){
            common.load_model(this);            
        }); 
         $j('.jtype2').change(function(){
            common.load_make2(this);
            
        }); 
         $j('.jmake2').change(function(){
            common.load_model2(this);            
        }); 
        
          $j('#j_ad_image').change(function(){
            common.load_ad_image(this);
        });
    },   
   
    load_area:function(obj){
        var country_id=$j(obj).val();
        $j.ajax({
            type:'POST',
            url:base_url+'adz/get_area',
            data:{
                country_id:country_id
            },
            success:function(html){
                $j('#j_area_data').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });
    },
     load_area2:function(obj){
        var country_id=$j(obj).val();
        $j.ajax({
            type:'POST',
            url:base_url+'adz/get_area',
            data:{
                country_id:country_id
            },
            success:function(html){
                $j('#j_area_data2').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });
    },
     load_make:function(obj){
        var type_id=$j(obj).val();
        $j.ajax({
            type:'POST',
            url:base_url+'adz/get_make',
            data:{
                type_id:type_id
            },
            success:function(html){
                $j('#j_make_data').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });
    },
     load_model:function(obj){
        var type_id=$j('.jtype').val();
         var make_id=$j(obj).val();
        $j.ajax({
            type:'POST',
            url:base_url+'adz/get_model',
            data:{
                type_id:type_id,
                make_id:make_id
            },
            success:function(html){
                $j('#j_model_data').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });
    },
     load_make2:function(obj){
        var type_id=$j(obj).val();
        alert(type_id);
        $j.ajax({
            type:'POST',
            url:base_url+'adz/get_make',
            data:{
                type_id:type_id
            },
            success:function(html){
                $j('#j_make_data2').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });
    },
     load_model2:function(obj){
        var type_id=$j('.jtype2').val();
         var make_id=$j(obj).val();
        $j.ajax({
            type:'POST',
            url:base_url+'adz/get_model',
            data:{
                type_id:type_id,
                make_id:make_id
            },
            success:function(html){
                $j('#j_model_data2').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });
    },
       load_ad_image:function(obj){
            var image=$j(obj).val();
            alert(image);
        $j.ajax({
            type:'POST',
            url:base_url+'adz/get_image',
            data:{
                image:image
            },
            success:function(html){
                alert(5);
            },
            error:function(e,m,s)
            {
                 alert(5);
            //    alert(e+m+s);
            }
        });
    }
}
