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
    @component('admin.shared.table',['pageTitle'=>$pageTitle,'pageDesc'=>$pageDesc])
        @slot('addButton')
            <div class="col-4 text-right">
                <a href="{{ route('admin.'.$routeName.'.create')}}" class="btn btn-white btn-round">Add {{$sModuleName}}</a>
                <button onclick="fetchAllPermission()" class="btn btn-white btn-round">Fetch All Routes</button>

            </div>

        @endslot
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <th>
                    ID
                </th>
                <th>
                    Name
                </th>

                <th class="text-left">
                    Controls
                </th>
                </thead>
                <tbody>
                @foreach($rows as $row)

                    <tr>
                        <td>
                            {{$row->id}}
                        </td>

                        <td>
                            {{$row->name}}
                        </td>

                        <td class="td-actions text-left">
                            @include('admin.shared.buttons.edit')
                            @include('admin.shared.buttons.delete')

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!!  $rows->links() !!}
        </div>

    @endcomponent
@endsection

@push('js')
<script>
function fetchAllPermission(){

    Swal.fire({
        title: 'Are you sure?',
        text: "This will set all routes as permissions",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, do it!',
        preConfirm: (result) => {
            return fetch(`http://photo.share/admin/permissions/fetch`)
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
            Swal.fire(
                'Its done!',
                'All Routes is permissions now.',
                'success'
            )
        }
    })
}

</script>
@endpush
