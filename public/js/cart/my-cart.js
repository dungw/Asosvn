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
                $.growl.notice({ message: "Product was add to cart successfully!" });
            }

            if (data == 'error') {
                $.growl.error({ message: "Cannot add product to cart!" });
            }
        });
    };

    $.removeFromCart = function(rowId) {
        $.ajax({
            url: 'cart/remove/' + rowId,
            type: 'DELETE',
            success: function(data) {
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
});