@extends('site.layouts.app')

@section('title' , $user->name)

@section('content')

    <section class="check_demo_movie">
        <div class="container">
            <h2 class=" wow fadeInDown"> User Name <span class="main-color"> {{ $user->name }}</span></h2>
            <p>{{ $user->email }}</p>
            <p>{{ $user->id }}</p>

            <div class="row">

            </div>
            @if(auth()->user() && $user->id == auth()->user()->id)
                <br>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <button onclick="$('#profileCard').slideToggle(600)" class="btn btn-outline-default btn-round"><i
                                class="fa fa-cog"></i> Update Profile
                        </button>
                    </div>
                </div>
                @include('site.profile.edit')

            @endif

            <div class="row">


                <div class="col-md-12 posts-container" >
                    @component('site.albums.albums',['albums'=>$user->albums])


                    @endcomponent
                    {{--                    <user-albums :user-id="{{$user->id}}"  />--}}
                </div>
            </div>
        </div>



    </section>

@endsection

@push('js')
    <script src="{{ asset('js/s/albums.js') }}"></script>
    @endpush
