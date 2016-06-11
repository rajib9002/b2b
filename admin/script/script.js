$j(document).ready(function(){
    var inc=1;
    validator.init();
    common.init();
     
    $j('.cancel').click(function(){
        window.history.back(-1);
    });
    $j('a.button,button.button,input[type="button"].button,input[type="submit"].button,input[type="reset"].button,button.cancel,input[type="button"]').button();
    $j(".tooolbars #add").button({
        icons: {
            primary: 'ui-icon-plus'
        }
    }).next().button({
        icons: {
            primary: 'ui-icon ui-icon-pencil'
        }
    }).next().button({
        icons: {
            primary: 'ui-icon ui-icon-info'
        }
    }).next().button({
        icons: {
            primary: 'ui-icon ui-icon-link'
        }
    }).next().button({
        icons: {
            primary: 'ui-icon ui-icon-trash'
        }
    }).next().button({
        icons: {
            primary: 'ui-icon ui-icon-refresh'
        }
    }).next().button({
        icons: {
            primary: 'ui-icon ui-icon-disk'
        }
    }).next().button({
        icons: {
            primary: 'ui-icon ui-icon-disk'
        }
    });
    $j('ul.sf-menu').superfish();
    $j(".jremove").live('click',function(){
        var id=$j(this).attr("rel");
        $j("#"+id).replaceWith("");
        $j(this).replaceWith("");
        return false;
    });
    $j(".jmedicine_name").live('click',function(){
        var id=$j(this).attr('id');
        $j("#data_list").attr('title',id);
    });
    $j("#type_name").change(function(){
        if($j(this).val()=='Other')
            $j('#type_field').show();
        else
            $j('#type_field').hide();
        return true;
    });
    
    $j('.jtype_step3').change(function(){
        common.load_make2(this);
    });
    $j('.jclass_id').change(function(){
        common.load_rider_data();
    });    
    
    
});

var common={
    init:function(){
        $j('.jadd_button').click(function(){
            common.add_content(this);
        });
        $j('.jmore_competition').click(function(){
            common.add_more_products();
        });
        
        $j('.jedit_button').click(function(){
            common.edit_content(this);
        });
        $j('.jdelete_button').click(function(){
            common.delete_content(this);
        });
        $j('.jstatus_button').click(function(){
            common.status_content(this);
        });
        $j('.print_view').click(function(){
            common.print_view_content(this);
        });
        $j('#print_doc').click(function(){
            var url=$j(this).attr('title');
            url=url;
            common.open_win(url,800);
            return false;
        });
        $j('.jload_competition').change(function(){
            common.load_competition(this);
        });
        
        $j('.jload_compResult').change(function(){
            common.load_CompYear(this);
            common.load_CompRound(this);
            common.load_CompClass(this);
        });
        $j('.jload_club').change(function(){
            common.load_club(this);
        });
        $j('.jmain_type').change(function(){
            common.load_type_data(this);
        });
        $j('.jload_host').change(function(){
            common.load_host_body(this);
        });
        $j('.jload_year').change(function(){
            common.load_year(this);
        });  
        $j(".date_picker").datepicker({
            dateFormat:'yy-mm-dd',
            changeYear:true
        });
        $j('.add').click(function(){
            var index=$j('#num_image').val();
            index=parseInt(index)+1;

            var a=  "<tr><th >Image</th><td style='float:left;padding:5;margin:0'><input type='file'  style='float:left'  name='upload_file_"+index+"'></td><tr>";
            $j('#image_table').append(a);
            $j('#num_image').val(index);
            return false;
        });
    //        $j('.add').click(function(){
    //
    //            var index=$j('#num_image').val();
    //            var a=  '<tr><td>&nbsp;</td><td><input type="file"  class="text ui-widget-content ui-corner-all width_400" name="image_name_'+index+'"</td><tr>';
    //            $j('#add_image').append(a);
    //            index=parseInt(index)+1;
    //            $j('#num_image').val(index);
    //            return false;
    //        });
    },
    print_view_content:function(obj){
        alert(obj);
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var id=s[0];
        var url=$j(obj).attr('title');
        url=url+id;

        common.open_win(url,800);
        return false;
    },

    load_competition:function(obj){
        var country_id=$j(obj).val();
        //alert(country_id);
        $j.ajax({
            type:'POST',
            url:base_url+'competitionr_details/get_competition',
            data:{
                country_id:country_id
            },
            success:function(html){
                $j('#j_competition_data').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });
    },
    load_year:function(obj){
        var country_id=$j(obj).val();
        //alert(country_id);
        $j.ajax({
            type:'POST',
            url:base_url+'competitionr_details/get_year',
            data:{
                country_id:country_id
            },
            success:function(html){
                $j('#j_year_data').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });
    },
    
    load_CompYear:function(obj){
        var competitionr_id=$j(obj).val();
        $j.ajax({
            type:'POST',
            url:base_url+'competition_result/get_year',
            data:{
                competitionr_id:competitionr_id
            },
            success:function(html){
                $j('#jcompYear').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });
    },
    load_CompRound:function(obj){
        var competitionr_id=$j(obj).val();
        //alert(country_id);
        $j.ajax({
            type:'POST',
            url:base_url+'competition_result/get_round',
            data:{
                competitionr_id:competitionr_id
            },
            success:function(html){
                $j('#jcompRound').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });
    },
    load_CompClass:function(obj){
        var competitionr_id=$j(obj).val();
        //alert(country_id);
        $j.ajax({
            type:'POST',
            url:base_url+'competition_result/get_class',
            data:{
                competitionr_id:competitionr_id
            },
            success:function(html){
                $j('#jcompClass').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });
    },
    
    load_club:function(obj){
        var country_id=$j(obj).val();
        //alert(country_id);
        $j.ajax({
            type:'POST',
            url:base_url+'club/get_club',
            data:{
                country_id:country_id
            },
            success:function(html){
                $j('#j_club_data').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });
    },
    
    load_type_data:function(obj){
        var main_type_id=$j(obj).val();
        //alert(main_type_id);
        $j.ajax({
            type:'POST',
            url:base_url+'bike/get_type',
            data:{
                main_type_id:main_type_id
            },
            success:function(html){
                $j('#jtype_name').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });
    },
    
    load_host_body:function(obj){
        var country_id=$j(obj).val();
        //alert(country_id);
        $j.ajax({
            type:'POST',
            url:base_url+'host_body/get_host_body',
            data:{
                country_id:country_id
            },
            success:function(html){
                $j('#j_host_data').html(html);
            },
            error:function(e,m,s)
            {
            //    alert(e+m+s);
            }
        });
    },

    open_win:function(url)
    {
        var width=800;
        var full_url=base_url+url;
        var TheNewWin= newwindow=window.open(full_url,'Print','width=800,height=600,menubar=1,status=0,location=1,toolbar=0,scrollbars= ');
        var left=(screen.width-width)/2;
        var top=(screen.height-200)/2;

        TheNewWin.moveTo(left,top);
    },
    
    add_content:function(obj){
        var url=$j(obj).attr('title');
        window.location=base_url+url;
    },
    edit_content:function(obj){
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var id=s[0];
        var url=$j(obj).attr('title');
        window.location=base_url+url+'/'+id;
        return false;
    },
    delete_content:function(obj){
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var id=s[0];
        if(confirm('Are you sure want to delete the content?')){
            var url=$j(obj).attr('title');
            window.location=base_url+url+'/'+id;
        }

        return false;
    },
    status_content:function(obj){
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var id=s[0];
        var url=$j(obj).attr('title');
        window.location=base_url+url+'/'+id;
        return false;
    },
    load_make2:function(obj){
        var type_id=$j(obj).val();
        $j.ajax({
            type:'POST',
            url:base_url+'bike/get_make',
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
    load_rider_data:function(){
        $j.ajax({
            url:'home/load_result_data',
            type:'post',
            beforeSend:function(){
                $j('.jall_data').html("<tr><td colspan='3'>Loading...</td></tr>");
            },
            data:{
                competitionr_id:$j("select[name='competitionr_id']").val(),
                class_id:$j("select[name='class_id']").val()
            },
            success:function(html){
                $j('.jall_data').html(html);
            },
            error:function(e,m,s){
                alert(e+m+s);
            }
        });
    },
       
    getTotal_data:function(i){
        var r1=$j('#jr1_score_'+i).val();
        var r2=$j('#jr2_score_'+i).val();
        var r3=$j('#jr3_score_'+i).val();
        var r4=$j('#jr4_score_'+i).val();
        var r5=$j('#jr5_score_'+i).val();
        var r6=$j('#jr6_score_'+i).val();
        var r7=$j('#jr7_score_'+i).val();
        
        if(r1==''|| r1==null || r1==undefined  || r1=="NaN"){
            r1=0
        }
        if(r2==''|| r2==null || r2==undefined  || r2=="NaN"){
            r2=0
        }
        if(r3==''|| r3==null || r3==undefined  || r3=="NaN"){
            r3=0
        }
        if(r4==''|| r4==null || r4==undefined  || r4=="NaN"){
            r4=0
        }
        if(r5==''|| r5==null || r5==undefined  || r5=="NaN"){
            r5=0
        }
        if(r6==''|| r6==null || r6==undefined  || r6=="NaN"){
            r6=0
        }
        if(r7==''|| r7==null || r7==undefined  || r7=="NaN"){
            r7=0
        }

        var total=
        parseFloat(r1)+
        parseFloat(r2)+
        parseFloat(r3)+
        parseFloat(r4)+
        parseFloat(r5)+
        parseFloat(r6)+
        parseFloat(r7);
        
        
        if(total==''|| total==null || total==undefined  || total=="NaN"){
            total=0;
        }
        
        $j('#total_'+i).val(parseFloat(total));
        
    },
    add_more_products:function(){
        var inc=1;
        $j.ajax({
            type:'POST',
            url:base_url+"home/get_competitionr_options",
            success:function(html){
                var new_products='<tr>'+
                '<th>&nbsp;</th><td><select style="width:200px;" class="select-style2" name="competitionr_id[]">'+html+'</select><input type="hidden" name="pro_serial[]" value="" id="pr_serial_'+inc+'"/></td>'+
                '</tr>';
                $j('#product').append(new_products);
                inc++;
                return false;
            }
        });
    }
}