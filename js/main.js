$('.select_submit').on('click', function(e) {
    if($('.select_options').val() == 1){
        var arr = [];
        $('.row_main input').each(function () {
            if (this.checked)
                arr.push($(this).val())
        });

        $.ajax({
            type: 'GET',
            url: '/site/deleteproduct/',
            data: {arr: arr},
            success: function (response) {
                arr.forEach(function(item, i, arr) {
                    $('.id'+item).remove();
                });
            },
            error: function () {

            }
        });
    }
    if($('.select_options').val() == 2)
        window.location.href = '/site/addproducts'
});

$('.select-add-product').on('click', function () {
    $('.add-select-result div.item-add').hide();
    $('.add-select-result div[data-id='+$(this).val()+']').show();
});

$('.add_product').on('click', function () {
    $.ajax({
        type: 'POST',
        url: '/site/addproducts/',
        dataType: 'JSON',
        data: $('.form-add-product').serialize(),
        success: function (response) {
            if(response.success == 1){
                $('.success').show();
                //$('.error').hide();
                $('.form_model').val('');
                $('.error-value').html('');
                $('.error-type_product').html('');
                $('.error-scu').html('');
                $('.error-name').html('');
                $('.error-price').html('');
                $('.error-type').html('');
                $('.select-add-product option[value=0]').css('selected', 'selected');
                $('.add-select-result div.item-add').hide();
            }else{
                $('.success').hide();
                //$('.error').show();
                $('.error-value').html('');
                $('.error-type_product').html('');
                $('.error-scu').html('');
                $('.error-name').html('');
                $('.error-price').html('');
                $('.error-type').html('');
                for (val in response)
                    $('.error-'+val).html(response[val]);
            }

        },
        error: function () {

        }
    });
});