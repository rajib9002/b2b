$j(document).ready(function () {
    common.init();
    $j("#pagination-div-id a").click(function () {
       // <img style='margin:0 auto;width:36px;height:36px;' src='img/loading.gif'>
        $j('.loader').html("<div style='margin:0 auto;width:100px;height:36px;color:green;font-weight:bold;font-size:15px;'>Loading...</div>");
        $j.ajax({
            type: "POST",
            //beforetoSend: function() {

            // },
            url: $(this).attr("href"),
            data: "q=<?php echo $searchString; ?>",
            success: function (res) {
                $j('.loader').hide();
                $j("#containerid").html(res);
            }
        });
        return false;
    });
});
var common = {
    init: function () {
        $j('.jload_area').change(function () {
            common.load_area(this);
        });
        $j('.jtype_step3').change(function () {
            common.load_make2(this);

        });
        $j('#j_make_data2').change(function () {
            common.Jload_model3(this);
        });

        $j('.jload_area2').change(function () {
            common.load_area2(this);
        });
        $j('.jtype').change(function () {
            common.load_make(this);
        });
        $j('.jmake').change(function () {
            common.load_model(this);
        });
        $j('.jtype2').change(function () {
            common.load_make2(this);
        });
        $j('.jmake2').change(function () {
            common.load_model2(this);
        });

        $j('#j_ad_image').change(function () {
            common.load_ad_image(this);
        });
        $j('#howmany').change(function () {
            common.per_page_data_ajax(this);
        });

        $j('#des').click(function () {
            var order_type = $j('#des_hidden_r').val();
            var order_name = $('#des').attr('title');
            var ad_type = $j('.ad_type').val();
            var type_id = $j('.type_id').val();
            window.location.href = base_url + 'adz/all_advertise/' + order_type + '/' + order_name + '/';
        });

        $j('#year').click(function () {
            var order_type = $j('#des_hidden_r').val();
            var order_name = $('#year').attr('title');
            var ad_type = $j('.ad_type').val();
            var type_id = $j('.type_id').val();
            window.location.href = base_url + 'adz/all_advertise/' + order_type + '/' + order_name + '/';
        });


        $j('#seller_type').click(function () {
            var order_type = $j('#des_hidden_r').val();
            var order_name = $('#seller_type').attr('title');
            window.location.href = base_url + 'adz/all_advertise/' + order_type + '/' + order_name + '/';
        });

        $j('#location').click(function () {
            var order_type = $j('#des_hidden_r').val();
            var order_name = $('#location').attr('title');
            window.location.href = base_url + 'adz/all_advertise/' + order_type + '/' + order_name + '/';
        });

        $j('#mileage').click(function () {
            var order_type = $j('#des_hidden_r').val();
            var order_name = $('#mileage').attr('title');
            window.location.href = base_url + 'adz/all_advertise/' + order_type + '/' + order_name + '/';
        });

        $j('#engine').click(function () {
            var order_type = $j('#des_hidden_r').val();
            var order_name = $('#engine').attr('title');
            window.location.href = base_url + 'adz/all_advertise/' + order_type + '/' + order_name + '/';
        });
        $j('#price').click(function () {
            var order_type = $j('#des_hidden_r').val();
            var order_name = $('#price').attr('title');
            window.location.href = base_url + 'adz/all_advertise/' + order_type + '/' + order_name + '/';
        });

        $j('#hours').click(function () {
            var order_type = $j('#des_hidden_r').val();
            var order_name = $('#hours').attr('title');
            window.location.href = base_url + 'adz/all_advertise/' + order_type + '/' + order_name + '/';
        });

        $j("#j_model_data3").change(function () {
            var model_name = $j("#j_model_data3").val();
            if (model_name == 'Other')
                $j('#model_name').show();
            else
                $j('#model_name').hide();
            return true;
        });

 },
    load_area: function (obj) {
        var country_id = $j(obj).val();
        $j.ajax({
            type: 'POST',
            url: base_url + 'adz/get_area',
            data: {
                country_id: country_id
            },
            success: function (html) {
                $j('#j_area_data').html(html);
                $j('#j_area_data_advanced_search').html(html);
            },
            error: function (e, m, s)
            {
                //    alert(e+m+s);
            }
        });
    },
    load_area2: function (obj) {
        var country_id = $j(obj).val();
        $j.ajax({
            type: 'POST',
            url: base_url + 'adz/get_area',
            data: {
                country_id: country_id
            },
            success: function (html) {
                $j('#j_area_data2').html(html);
            },
            error: function (e, m, s)
            {
                //    alert(e+m+s);
            }
        });
    },
    load_make: function (obj) {
        var type_id = $j(obj).val();
        $j.ajax({
            type: 'POST',
            url: base_url + 'adz/get_make',
            data: {
                type_id: type_id
            },
            success: function (html) {
                $j('#j_make_data').html(html);
                $j('#j_make_data_advanced_search').html(html);
            },
            error: function (e, m, s)
            {
                //    alert(e+m+s);
            }
        });
    },
    per_page_data_ajax: function (obj) {
        var howmany = $j(obj).val();
        //alert(howmany);
        $j.ajax({
            type: 'POST',
            url: base_url + 'adz/index',
            data: {
                howmany: howmany
            },
            success: function (html) {
                //alert('Updated Successfully');
                location.reload();
            },
            error: function (e, m, s)
            {
                alert(e + m + s);
            }
        });
    },
    load_model: function (obj) {
        var type_id = $j('.jtype').val();
        var make_id = $j(obj).val();
        $j.ajax({
            type: 'POST',
            url: base_url + 'adz/get_model',
            data: {
                type_id: type_id,
                make_id: make_id
            },
            success: function (html) {
                $j('#j_model_data').html(html);
                $j('#j_model_data_advanced_search').html(html);
            },
            error: function (e, m, s)
            {
                //    alert(e+m+s);
            }
        });
    },
    load_make2: function (obj) {
        var type_id = $j(obj).val();
        $j.ajax({
            type: 'POST',
            url: base_url + 'adz/get_make',
            data: {
                type_id: type_id
            },
            success: function (html) {
                $j('#j_make_data2').html(html);
            },
            error: function (e, m, s)
            {
                //    alert(e+m+s);
            }
        });
    },
    load_model2: function (obj) {
        var type_id = $j('.jtype_step3').val();
        var make_id = $j(obj).val();
        $j.ajax({
            type: 'POST',
            url: base_url + 'adz/get_model',
            data: {
                type_id: type_id,
                make_id: make_id
            },
            success: function (html) {
                $j('#j_model_data2').html(html);
                // alert('success');
            },
            error: function (e, m, s)
            {
                // alert(e+m+s);
            }
        });
    },
    Jload_model3: function (obj) {
        var type_id = $j('.jtype_step3_new').val();
        var make_id = $j(obj).val();
        $j.ajax({
            type: 'POST',
            url: base_url + 'adz/get_model',
            data: {
                type_id: type_id,
                make_id: make_id
            },
            success: function (html) {
                $j('#j_model_data3').html(html);
            },
            error: function (e, m, s)
            {
                alert(e + m + s);
            }
        });
    },
    load_ad_image: function (obj) {
        var image = $j(obj).val();
        alert(image);
        $j.ajax({
            type: 'POST',
            url: base_url + 'adz/get_image',
            data: {
                image: image
            },
            success: function (html) {
                alert(5);
            },
            error: function (e, m, s)
            {
                alert(5);
                //    alert(e+m+s);
            }
        });
    }
}
