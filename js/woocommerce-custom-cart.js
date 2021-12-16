(function ($) {
    var customSideCart = $(".custom_side_cart");
    var customSideCartOverlay = $(".custom_cart_overlay");
    var customSideCartOpener = $(".custom_side_cart_opener");

    function openSideCart() {
        customSideCart.addClass('active');
        customSideCartOverlay.fadeIn();
    }

    function closeSideCart() {
        customSideCart.removeClass('active');
        customSideCartOverlay.fadeOut();
    }

    customSideCartOpener.on("click", function () {
        openSideCart();
    });

    customSideCart.find(".close_cart").on("click", function () {
        closeSideCart();
    });

    //Update items in shopping cart
    function updateShoppingCart(isItemAddedToCart) {
        var responseDiv = document.getElementById("response");

        $.ajax({
            url: customSideCart.data("action"),
            data: {
                action: "updateshoppingcart",
                addedToCart: isItemAddedToCart
            }, // form data
            type: "POST", // POST
            beforeSend: function (xhr) {},
            success: function (data) {
                responseDiv.innerHTML = data;
            },
            complete: function (xhr, status) {
                openSideCart();

                if( customSideCart.hasClass('checkout_page') && !customSideCart.find('.items .item').length ) {
                    window.location.href = '/';
                }
            },
        });
    }
    //Update items in shopping cart END

    //Event after adding to cart action
    $("body").on("added_to_cart", function () {
        updateShoppingCart(true);
    });
    //Event after adding to cart action END

    //Remove item from cart function
    customSideCart.on("click", ".remove_item", function (event) {
        event.preventDefault();
        var cartItemKey = $(this).data("target");

        $.ajax({
            url: $('.custom_side_cart').data('action'),
            data: {
                action: "woo_custom_remove_from_cart",
                cartItemKey: cartItemKey,
            },
            type: "POST", // POST
            beforeSend: function (xhr) {
                $("#cart_item_" + cartItemKey).slideUp(250);
            },
            success: function (data) {
                setTimeout(function(){
                    updateShoppingCart();
                }, 250);
            },
            complete: function (xhr, status) {},
        });
    });
    //Remove item from cart function END

    //Tickets template page
    if ($(".template_tickets_page_container").length) {
        //Add ticket to the cart
        $(".ticket_variations_form").each(function () {
            var formEl = $(this);
            $(formEl).validate({
                messages: {
                    "ticket-date-time": "Choose your ticket date and time",
                    "ticket-type": "Choose your ticket type",
                },
                submitHandler: function (form) {
                    var itemID = $(formEl).find(".add_to_cart_ticket").data("product-id");
                    var variationID = $(formEl).find("select[name=ticket-date-time]").val();
                    var quantityInput = $(formEl).find("input[name=quantity]");
                    var quantity = $(formEl).find("input[name=quantity]").val();

                    var responseEl = "ticket_options_" + itemID;

                    var ticketType = $('#ticket_type_'+itemID +' option:selected').text();
                    var ticketTypePrice = $('#ticket_type_'+itemID).val();
                    var ticketPriceInput = $('#ticket_price_input_'+itemID);
                    var price = quantity * ticketTypePrice;
                    ticketPriceInput.val(price);

                    $.ajax({
                        url: "/wp-admin/admin-ajax.php",
                        data: {
                            action: "check_ticket_quantity",
                            product_id: itemID,
                            variation_id: variationID,
                            quantity: quantity,
                        },
                        type: "POST",
                        beforeSend: function (xhr) {
                            formEl.find('.ticket_options').addClass('disabled');
                        },
                        success: function (data) {
                            formEl.find('.ticket_options').removeClass('disabled');

                            // console.log(data)
                            if( data === 'false' ) {
                                document.getElementById(responseEl).innerHTML = 'Tickets for this date are out of stock!'
                            } else if( data.includes('false') ){
                                let info = data.split(" ");
                                //Second element in info array is number of available tickets for specific variation(date)
                                let word = ( parseInt(info[1]) > 1 ) ? 'tickets' : 'ticket';
                                document.getElementById(responseEl).innerHTML = 'There is only ' + info[1] + ' ' + word + ' available for this date.'
                            } else if( data.includes('in-cart') ) {
                                let info = data.split(" ");
                                let word = ( parseInt(info[1]) > 1 ) ? 'tickets' : 'ticket';
                                document.getElementById(responseEl).innerHTML = 'There is no more available tickets for this date. You have last ' + word + ' in your cart.'
                            } else {
                                document.getElementById(responseEl).innerHTML = '';

                                $.ajax({
                                    url: "/wp-admin/admin-ajax.php",
                                    data: {
                                        action: "woo_custom_add_to_cart",
                                        product_id: itemID,
                                        product_sku: "",
                                        quantity: quantity,
                                        variation_id: variationID,
                                        custom_price_field: price,
                                        ticket_type: ticketType,
                                    },
                                    type: "POST", // POST
                                    beforeSend: function (xhr) {},
                                    success: function (data) {
                                        $('body').trigger('added_to_cart')
                                    },
                                    complete: function (xhr, status) {},
                                });
                            }
                        },
                        complete: function (xhr, status) {},
                    });

                    return false;
                },
                errorElement: "small",
            });
        });

        //Tickets quantity input (plus/minus)
        $('.quantity_input .quantity_plus_minus').on( 'click',function () {
            var ticketQuantityInput = $(this).parent().find("input[name=quantity]");
            var ticketQuantityInputVal = parseInt(ticketQuantityInput.val());

            if ($(this).hasClass("minus")) {
                if (ticketQuantityInputVal > 1) {
                    ticketQuantityInput.val((ticketQuantityInputVal -= 1));
                }
            } else {
                ticketQuantityInput.val((ticketQuantityInputVal += 1));
            }
        });
        //Tickets quantity input END
    }
    //Tickets template page END
})(jQuery);
