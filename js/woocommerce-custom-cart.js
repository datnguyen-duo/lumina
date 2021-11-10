(function ($) {
    var customSideCart = $('.custom_side_cart');
    var customSideCartOpener = $('.custom_side_cart_opener');

    customSideCartOpener.on('click', function(){
        customSideCart.fadeIn();
    });

    customSideCart.find('.close_cart').on('click', function(){
        customSideCart.fadeOut();
    });

    //Update items in shopping cart
    function updateShoppingCart() {
        var responseDiv = document.getElementById('response');

        $.ajax({
            url: customSideCart.data('action'),
            data: {
                action: 'updateshoppingcart',
            }, // form data
            type: 'POST', // POST
            beforeSend: function (xhr) {},
            success: function (data) {
                responseDiv.innerHTML = data;
            },
            complete: function (xhr, status) {
                customSideCart.fadeIn();
            }
        });
    }
    //Update items in shopping cart END

    //Event after adding to cart action
    $('body').on('added_to_cart',function(){
        $('.button_holder').append('<p class="added_to_cart_message">Item has been added to cart.</p>')
        updateShoppingCart();
    });
    //Event after adding to cart action END


    //Remove item from cart function
    customSideCart.on('click', '.remove_item', function(event) {
        event.preventDefault();
        var productID = $(this).data('product_id');
        var cartItemID = $(this).data('target');

        $.ajax({
            url: $(this).attr('href'),
            data: {
                // action: "product_remove",
                product_id: productID
            },
            type: 'POST', // POST
            beforeSend: function (xhr) {
                $('#cart_item_'+cartItemID).slideUp(250);
            },
            success: function (data) {
                updateShoppingCart();
            },
            complete: function (xhr, status) {}
        });
    });
    //Remove item from cart function END


    //Add ticket to the cart
    if( $('.template_tickets_page_container').length ) {
        $('.ticket_variations_form').each(function(){
            var formEl = $(this);
            $(formEl).validate({
                messages: {
                    'ticket_type' : 'Chose type of ticket.'
                },
                submitHandler: function(form) {
                    var itemID = $(formEl).find('button').data('product-id')
                    var variation_id =  $(formEl).find('input[name="ticket_type"]:checked').val();
                    var responseEl = 'edit_ticket_container_'+itemID;

                    $('.edit_ticket_container').remove();

                    $('.custom_side_cart').append(
                        '<div class="edit_ticket_container" id="'+responseEl+'"></div>'
                    ).fadeIn();

                    $.ajax({
                        url: '/wp-admin/admin-ajax.php',
                        data: {
                            action: 'edit_ticket_product',
                            product_id: itemID,
                            variation_id: variation_id,
                        },
                        type: 'POST',
                        beforeSend: function (xhr) {},
                        success: function (data) {
                            document.getElementById(responseEl).innerHTML = data;
                        },
                        complete: function (xhr, status) {}
                    });

                    return false;
                },
                errorElement : 'small',
            });
        });
    }

    customSideCart.on('click', '.add_to_cart_t', function() {
        var itemID = $(this).data('product-id');
        var variationID = $(this).data('variation-id');
        var responseEl = 'edit_ticket_container_'+itemID;
        var elId = $('#'+responseEl);
        var quantity = elId.find('input[name="custom_quantity"]').val();
        var date_time_input = elId.find('.time_label input:checked').val();
        var date_time = date_time_input.split("__");
        var date = date_time[0];
        var time = date_time[1];

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'woo_custom_add_to_cart',
                product_id: itemID,
                product_sku: '',
                quantity: quantity,
                variation_id: variationID,
                custom_data: {
                    date: date,
                    time: time,
                }
            },
            type: 'POST', // POST
            beforeSend: function (xhr) {},
            success: function (data) {
                $('#edit_ticket_container_'+itemID).fadeOut(function(){
                    $(this).remove();
                });
                updateShoppingCart();
            },
            complete: function (xhr, status) {}
        });
    });

    customSideCart.on('click', '.change_step', function() {
        var target = $(this).data('target');

        if( target === '.step_2') {
            $('.step_1').validate({
                messages: {
                    'date' : 'Chose the date.'
                },
                submitHandler: function(form) {
                    $('.step').removeClass('active');
                    $(target).addClass('active');
                },
                errorElement : 'small',
                errorLabelContainer: '#step_1_errors_div',
            });
        } else {
            $('.step').removeClass('active');
            $(target).addClass('active');
        }
    });

    customSideCart.on('click', '.variation .quantity_plus_minus', function() {
        var input = $('.quantity_input_holder').find('input');
        var inputVal = parseInt(input.val());
        var productPrice = parseInt($('.step .variation .price p').data('value'));

        if( $(this).hasClass('minus') ) {
            if( inputVal > 1 ) {
                input.val(inputVal-=1);
            }
        } else {
            input.val(inputVal+=1);
        }

        $('.step .variation .price p span').text(inputVal * productPrice);
    });

    customSideCart.on('click', '.close_product', function() {
        var itemID = $(this).data('product-id');

        $('#edit_ticket_container_'+itemID).fadeOut(function(){
            $(this).remove();
        });
    });
    //Add ticket to the cart END
})(jQuery);