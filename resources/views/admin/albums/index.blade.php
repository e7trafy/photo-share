@extends('admin.layout.app')

@section('title')
    Photo Share || {{$pageTitle}}
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

                <th>
                    Author
                </th>
                <th>
                    # Photos
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

                        <td>
                            {{$row->user->name}}
                        </td>

                        <td>
                            {{$row->photos->count()}}
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

@endpush
