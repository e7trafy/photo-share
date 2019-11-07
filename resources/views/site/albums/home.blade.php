@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropzone/dropzone.css') }}">
@endpush
@section('content')
    <section class="check_demo_movie">
        <div class="container">
            <h2 class=" wow fadeInDown">Check Our <span class="main-color"> Albums</span></h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book.</p>
            <div class="row">

                <div class="w-100">
                    <button type="button" class="btn btn-info btn-lg" onclick="createAlbum()">Create Album</button>

                </div>
                <div class="col-md-12 posts-container" id="albumsSection">
                    @component('site.albums.albums',['albums'=>$albums])
                    @endcomponent

                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('js/s/albums.js') }}"></script>
@endpush
