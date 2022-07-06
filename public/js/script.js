$(document).ready(function () {
    var quantity = 1;
    $('.quantity-plus').click(function (e) {
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
        $('#quantity').val(quantity + 1);
    });

    $('.quantity-minus').click(function (e) {
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());

        if(quantity > 1) {
            $('#quantity').val(quantity - 1);
        }
    });
});