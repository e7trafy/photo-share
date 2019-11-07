<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Create Album</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body row">
    <form id="createForm" class="dropzone form-horizontal col-12 text-left" enctype="multipart/form-data">
        @include('site.albums.form')
        <input id="photos" type="file" name="photos" multiple />

    </form>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" onclick="storeAlbum('{{Auth::user()->id}}')" class="btn btn-success">Create Album</button>

</div>
