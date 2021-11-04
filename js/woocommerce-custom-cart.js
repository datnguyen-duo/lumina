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


    //Add ticket to the cart function
    $('.add_to_cart_ticket').on('click', function(event) {
        var itemID = $(this).data('product-id');
        var url = '?add-to-cart='+itemID;
        var variation_id = $('input[name="ticket_type"]:checked').val();

        $.ajax({
            url: url,
            data: {
                // action: 'ajax_add_to_cart',
                product_id: itemID,
                product_sku: '',
                quantity: 1,
                variation_id: variation_id,
            },
            type: 'POST', // POST
            beforeSend: function (xhr) {},
            success: function (data) {
                updateShoppingCart();
            },
            complete: function (xhr, status) {}
        });
    });
    //Afd ticket to the cart function END

})(jQuery);