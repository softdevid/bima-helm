$(document).ready(function () {
    // increment and decrement quantity
    $('.quantity-plus').click(function (e) {
        e.preventDefault();
        var max = parseInt($('#quantity').attr('max'));
        var quantity = parseInt($('#quantity').val());
        if (quantity < max) {
            $('#quantity').val(quantity + 1);
        }
    });
    $('.quantity-minus').click(function (e) {
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
        if (quantity > 1) {
            $('#quantity').val(quantity - 1);
        }
    });

    // on change size
    $('#size').on('change', function () {
        var size = $(this).val();
        var id = $('#' + size).text();
        $('#quantity').attr('max', id);
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
        if (sortBy === undefined) {
            sortBy = '';
        }
        let page = $(this).attr('href').split('page=')[1];
        history.pushState(null, null, '?page=' + page + '&sortBy=' + sortBy);
        $.ajax({
            type: "GET",
            url: "/products?page=" + page,
            data: { sort_by: sortBy },
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
        if (searchParams.has('page')) {
            var page = searchParams.get('page');
        }
        history.pushState(null, null, '?page=' + page + '&sortBy=' + sortBy);

        $.ajax({
            type: "GET",
            url: "/products?page=" + page,
            data: { sort_by: sortBy },
            success: function (response) {
                $('.data-products').html(response);
            }
        });
    });

    // bs valid pass
    $('#regForm').bootstrapValidator({
        fields: {
            password: {
                validators: {
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    });
});

$(".check-shipp").change(function () {
    $('.check-shipp').not(this).prop('checked', false);
});

function onChangeRegion(url, id, name) {
    var token = $('#token').val();
    $.ajax({
        type: "POST",
        url: url,
        data: { _token:token,id: id },
        success: function (response) {
            $('#' + name).empty();
            $('#' + name).append('<option>Pilih Salah Satu</option>');

            $.each(response, function (key, value) {
                $('#' + name).append('<option value="' + key + '">' + value + '</option>');
            });
            $('#' + name).removeAttr('disabled');
        }
    });
}

function getPostalCode(name) {

    $('#loading-spinner').append('<div class="spinner-border float-end position-relative" style="top: -40px; right: 5px;" role="status"><span class="visually-hidden">Loading...</span></div>');
    $('#loading-spinner-info').append('<span class="small" >Mohon tunggu...</span>');

    $.ajax({
        type: "GET",
        url: 'https://kodepos.vercel.app/search',
        data: {q:name},
        dataType: "json",
        success: function (data) {
            if(data.status == true) {
                console.log(data.messages);
                $('#postal-code').val('');
                $('#postal-code').val(data.data[0].postalcode);
                $('#loading-spinner').empty();
                $('#loading-spinner-info').empty();
            }
        }
    });
}

$(function () {
    $('#province').on('change', function () {
        onChangeRegion('/indonesia/cities', $(this).val(), 'city');
    });
    $('#city').on('change', function () {
        onChangeRegion('/indonesia/districts', $(this).val(), 'district');
    });
    $('#district').on('change', function () {
        onChangeRegion('/indonesia/villages', $(this).val(), 'village');
    });
    $('#village').on('change', function () {
        var village = $('#village option:selected').text();
        var district = $('#district option:selected').text();
        getPostalCode(village+' '+district);
    });
});
