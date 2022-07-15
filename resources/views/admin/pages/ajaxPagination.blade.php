@extends('admin.layouts.template')
@section('content')
    <div class="container">
        <h1>Laravel 8 AJAX Pagination Example - Codingspoint.com</h1>
        <div id="tag_container">
            @include('admin.pages.product')
        </div>
    </div>

    <script type="text/javascript">
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getData(page);
                }
            }
        });

        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();

                $('li').removeClass('active');
                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];

                getData(page);
            });

        });

        function getData(page) {
            $.ajax({
                url: '?page=' + page,
                type: "get",
                datatype: "html"
            }).done(function(data) {
                $("#tag_container").empty().html(data);
                location.hash = page;
            }).fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('No response from server');
            });
        }
    </script>
@endsection
