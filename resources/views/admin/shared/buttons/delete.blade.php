
<form action="{{route('admin.'.$routeName.'.destroy',[$row])}}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Delete {{$sModuleName}}">
        <i class="material-icons">close</i>
    </button>
</form>
