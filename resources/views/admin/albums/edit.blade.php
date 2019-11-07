@extends('admin.layout.app')

@section('title')
    Photo Share | {{$pageTitle}}
@endsection
@push('css')
    <link href="/assets/css/select2.min.css" rel="stylesheet"/>
@endpush

@section('content')

    @component('admin.layout.header')
        @slot('nav_title')
            {{$pageTitle}}
        @endslot
    @endcomponent

    @component('admin.shared.edit',['pageTitle'=>$pageTitle,'pageDesc'=>$pageDesc])


        <form action="{{route('admin.'.$routeName.'.update',[$row->id])}}" method="POST" id="editForm">
            @method('PUT')
            @include('admin.'.$folderName.'.form')


            <button type="button" onclick="saveAlbum('{{route('admin.'.$routeName.'.update',[$row->id])}}')" class="btn btn-primary pull-right">Save {{$moduleName}}</button>
        </form>

        <form action="{{route('admin.albums.destroy',[$row])}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" rel="tooltip" title="" class="btn btn-danger" data-original-title="Delete Album">
                <i class="material-icons">close</i> Delete Album
            </button>
        </form>
                    <div class="clearfix"></div>

        @foreach($row->photos as $photo)
            <div class="col-4 float-left">


            <div class="album-photo">
                <img class="image " data-photoid="{{$photo->id}}" src="{{$photo->photo_path}}"/>


                <div class="overlay">

{{--                    <form action="{{route('photo.destroy',[$photo])}}" method="POST">--}}
{{--                        @csrf--}}
{{--                        @method('delete')--}}
                        <button onclick="deletePhoto(this,{{$photo->id}})" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Delete Photo">
                            <i class="material-icons">close</i>
                        </button>
{{--                    </form>--}}

                </div>
            </div>
            </div>
        @endforeach
        @slot('md4')

        @endslot
    @endcomponent



@endsection

@push('js')
    <script src="/assets/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2Multi').select2();
            $("#allPerm").click(function () {
                if ($("#allPerm").is(':checked')) {
                    $("#permissionsSelect > option").prop("selected", "selected");
                    $("#permissionsSelect").trigger("change");
                } else {
                    $("#permissionsSelect > option").removeAttr("selected");
                    $("#permissionsSelect").trigger("change");
                }
            });
        });
        function saveAlbum(id) {
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
                        // invalid file format.
                        $("#err").html("Invalid File !").fadeIn();
                    } else {
                        Swal.fire(
                            'Its done!',
                            'Album Updated !.',
                            'success'
                        )

                    }
                },
                error: function (e) {
                    $("#err").html(e).fadeIn();
                }
            });
        }


        function deletePhoto(element,id){

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, do it!',
                preConfirm: (result) => {
                    return fetch(`http://photo.share/admin/photo/`+id)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)

                            }

                            return response.json()
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value) {

                    $(element).parents( ".album-photo").remove();
                    Swal.fire(
                        'Its done!',
                        data['data'],
                        'success'
                    )

                }
            })


        }

    </script>

@endpush
