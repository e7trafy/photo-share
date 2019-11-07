@extends('site.layouts.app')

@section('content')
    <section class="check_demo_movie">
        <div class="container">
            <h2 class=" wow fadeInDown">Check Our <span class="main-color"> Packages</span></h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book.</p>

<div  id="homeAlbums">

</div>
{{--            <public-albums />--}}

        </div>
    </section>

@endsection
@push('js')


    <script>

        $(document).ready(function(){
            $.ajax({ url: "get_public_all",
                context: document.body,
                success: function(result){
                    $('#homeAlbums').html(result);
                }});
        });

        function viewAlbum(id) {
            $.ajax({
                type: 'get',
                url: '/albums/get_album/' + id,
                success: function (data) {
                    $('.modal-content').html(data);
                    $('.modal-footer').html('    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>\n');
                    $("#viewModal").modal();
                }
            });
        }


    </script>
@endpush
