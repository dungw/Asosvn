/**
 * Created by nhuthep on 1/4/16.
 */

$(document).ready(function($)
{
    $.addToCart = function(id, name, qty, price, slug, image, sku) {
        var data = {
            id: id,
            name: name,
            qty: qty,
            price: price,
            slug: slug,
            image: image,
            sku: sku
        };

        $.post('/cart/add', data, function(data) {
            if (data == 'success') {
                $.growl.notice({ message: localStorage.getItem("add-cart-success") });
                $.updateMenu();
            }

            if (data == 'error') {
                $.growl.error({ message: localStorage.getItem("add-cart-error") });
            }
        });
    };

    $.removeFromCart = function(rowId) {
        $.ajax({
            url: 'cart/remove/' + rowId,
            type: 'DELETE',
            success: function(data) {
                $.growl.notice({ message: localStorage.getItem("remove-cart-success") });
                $.updateMenu();
                $.updateCartTotal();
                $("#cart-item-" + data['rowId']).fadeOut(300, function(){
                    $.when($("#cart-item-" + data['rowId']).remove()).then(function() {
                        if (data['qty'] == 0) {
                            $("#cart-empty-message").show();
                        };
                    });
                });
            }
        });
    };

    $.updateMenu = function() {
        $.get('/cart/update-menu', function(data) {
            $("#shop-menu").html(data);
        });
    };

    $.updateCartTotal = function() {
        $.get('/cart/update-total', function(data) {
            $("#cart-total-area").html(data);
        });
    };

    $.cartQuantityUp = function(rowId) {
        $.post('/cart/qty-up/' + rowId, function(data) {
            $("#cart-item-" + rowId).find(".cart_quantity_input").val(data.qty);
            $("#cart-item-" + rowId).find(".item_total_price").html(data.totalPrice);
            $.updateMenu();
            $.updateCartTotal();
            $.growl.notice({ message: localStorage.getItem("update-cart-success") });
        });
    };

    $.cartQuantityDown = function(rowId) {
        $.post('/cart/qty-down/' + rowId, function(data) {
            if (data.empty) {
                $("#cart-item-" + rowId).fadeOut(300, function(){
                    $.when($("#cart-item-" + rowId).remove()).then(function() {
                        $.checkEmptyCart();
                    });
                });
                $.growl.notice({ message: localStorage.getItem("remove-cart-success") });
            } else {
                $("#cart-item-" + rowId).find(".cart_quantity_input").val(data.qty);
                $("#cart-item-" + rowId).find(".item_total_price").html(data.totalPrice);
                $.growl.notice({ message: localStorage.getItem("update-cart-success") });
            }
            $.updateMenu();
            $.updateCartTotal();
        });
    };

    $.cartUpdateQuantity = function(rowId, qty) {
        var data = {
            rowId: rowId,
            qty: qty
        };
        $.post('/cart/update-qty', data, function(data) {
            if (data.error) {
                $.growl.error({ message: data.error });
            } else {
                $("#cart-item-" + rowId).find(".cart_quantity_input").val(data.qty);
                $("#cart-item-" + rowId).find(".item_total_price").html(data.totalPrice);
                $.updateMenu();
                $.updateCartTotal();
                $.growl.notice({ message: localStorage.getItem("update-cart-success") });
            }
        });
    };

    $.checkEmptyCart = function() {
        $.get('/cart/totalQty', function(data) {
            if (!(data > 0)) {
                $("#cart-empty-message").show();
            }
        });
    };

});