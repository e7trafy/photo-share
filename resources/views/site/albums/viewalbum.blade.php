<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Album <span class="main-color"> {{$album->name}}</span> By <span class="main-color"> {{$album->user->name}}</span></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body row">
    @foreach($album->photos as $photo)
        <div class="col-md-6">
            <img src="{{$photo->photo_path}}" class="img-thumbnail" alt="">
        </div>
    @endforeach

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    @if(Auth::user() == $album->user)
                            <button type="button" onclick="editAlbum({{$album->id}})" class="btn btn-warning">Edit Album</button>

        <button type="button" onclick="deleteAlbum('{{$album->id}}','{{Auth::user()->id}}','{{ csrf_token()}}')" class="btn btn-danger">Delete Album</button>

    @endif
</div>
