$(document).ready(function () {
    // increment and decrement quantity start
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

    // change image on click
    $('#gallery > div.images > img').click(function (e) {
        var thumbImg = $(this).attr('src');
        var mainImg = $('#gallery > div.main-img > img').attr('src');
        $('#gallery > div.main-img > img').attr('src', thumbImg);
    });

    // pagination
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        let sortBy = $('#sorting').children('option:selected').val();
        if(sortBy === undefined) {
            sortBy = '';
        }
        let page = $(this).attr('href').split('page=')[1];
        history.pushState(null, null, '?page=' + page + '&sortBy=' + sortBy);
        $.ajax({
            type: "GET",
            url: "/products?page=" + page,
            data: {sort_by:sortBy},
            success: function (response) {
                $('.data-products').html(response);
            }
        });
    });

    // filter
    $(document).on('change', '#sorting', function () {
        let sortBy = $(this).val();
        let searchParams = new URLSearchParams(window.location.search);
        var page = '';
        if(searchParams.has('page')) {
            var page = searchParams.get('page');
        }
        history.pushState(null, null, '?page=' + page + '&sortBy=' + sortBy);

        $.ajax({
            type: "GET",
            url: "/products?page=" + page,
            data: {sort_by:sortBy},
            success: function (response) {
                $('.data-products').html(response);
            }
        });
    });
});

$(".check-shipp").change(function () {
    $('.check-shipp').not(this).prop('checked', false);
});

