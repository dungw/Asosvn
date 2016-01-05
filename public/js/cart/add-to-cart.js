/**
 * Created by nhuthep on 1/4/16.
 */

$.addToCart = function(id, name, qty, price, options) {
    var data = {
        id: id,
        name: name,
        qty: qty,
        price: price,
        options: options
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
