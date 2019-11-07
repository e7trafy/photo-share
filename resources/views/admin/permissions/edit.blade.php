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

    @component('admin.shared.edit',['pageTitle'=>$pageTitle,'pageDesc'=>$pageDesc])


            <form action="{{route('admin.'.$routeName.'.update',[$row])}}" method="POST" id="editForm">
                @method('PUT')
                @include('admin.'.$folderName.'.form')
                <button type="button" onclick="saveForm('{{route('admin.'.$routeName.'.update',[$row->id])}}')" class="btn btn-primary pull-right">Save {{$moduleName}}</button>
                <div class="clearfix"></div>
            </form>

            @slot('md4')

            @endslot
    @endcomponent

@endsection

@push('js')
<script>
    function saveForm(id) {
        let edit_form_data = new FormData($('#editForm').get(0));

        let csrf ="{{ csrf_token() }}";
        $.ajax({
            url:  id,
            type: "post",
            data: edit_form_data,
            headers: {
                'X-CSRF-TOKEN': csrf
            },
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                // $('#viewModal').modal('hide');

                if (data == 'invalid') {
                } else {
                    Swal.fire(
                        'Its done!',
                        data['data'],
                        'success'
                    )

                }
            },
            error: function (e) {
                $("#err").html(e).fadeIn();
            }
        });
    }

</script>
@endpush
