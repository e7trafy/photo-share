<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Edit Album <span class="main-color">  {{$album->name}}</span></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body row">
    <form id="editForm" class="dropzone form-horizontal col-12 text-left" enctype="multipart/form-data">
        @method('PUT')
        @include('site.albums.form')

        <input id="photos" type="file" name="photos" multiple/>
    </form>
    <div class="col-12" id="albumPhotos">

        @component('site.albums.photos',['photos'=>$album->photos])

        @endcomponent
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
{{--    {{ Auth::user()->name }}--}}
    @if(Auth::user() == $album->user)

        <button type="button" onclick="deleteAlbum('{{$album->id}}','{{Auth::user()->id}}')" class="btn btn-danger">Delete Album</button>
        <button type="button" onclick="saveAlbum('{{$album->id}}','{{Auth::user()->id}}')" class="btn btn-success">Save Album</button>
    @endif
</div>
