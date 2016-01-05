/**
 * Created by nhuthep on 1/4/16.
 */

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
            $("#cart-item-" + data).fadeOut(300, function(){
                $("#cart-item-" + data).remove();
            });
        }
    });
};