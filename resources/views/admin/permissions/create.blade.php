@extends('admin.layout.app')

@section('title')
    Photo Share | {{$pageTitle}}
@endsection
@push('css')

@endpush

@section('content')

    @component('admin.layout.header')
        @slot('nav_title')
            {{$pageTitle}}
        @endslot
    @endcomponent
    @component('admin.shared.create',['pageTitle'=>$pageTitle,'pageDesc'=>$pageDesc])
        <form action="{{route('admin.'.$routeName.'.store')}}" method="POST">
            @include('admin.'.$folderName.'.form')
            <button type="submit" class="btn btn-primary pull-right">{{$pageTitle}}</button>
            <div class="clearfix"></div>
        </form>
    @endcomponent


@endsection

@push('js')

@endpush
