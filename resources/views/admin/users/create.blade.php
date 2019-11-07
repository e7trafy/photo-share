@extends('admin.layout.app')

@section('title')
    Photo Share | {{$pageTitle}}
@endsection
@push('css')
    <link href="/assets/css/select2.min.css" rel="stylesheet" />

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
    <script src="/assets/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2Multi').select2();
            $("#allPerm").click(function(){


                if($("#allPerm").is(':checked') ){
                    $("#permissionsSelect > option").prop("selected","selected");
                    $("#permissionsSelect").trigger("change");
                }else{
                    $("#permissionsSelect  option").removeAttr("selected");
                    $("#permissionsSelect").trigger("change");
                }
            });
        });
    </script>
@endpush
