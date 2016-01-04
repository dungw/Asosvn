/**
 * Created by nhuthep on 1/4/16.
 */

(function( $ ){
    $.addToCart = function(id, name, qty, price, options) {
        var data = {
            id: id,
            name: name,
            qty: qty,
            price: price,
            options: options
        };

        $.post('cart/add', data, $.callback());
    };

    $.callback = function() {
        //todo: in case have something to do in callback
    };
})( jQuery );