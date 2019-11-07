

    @foreach($photos as $photo)
        {{--                {{dd($photo)}}--}}
        <div class="col-md-6 float-left">

            <div class="album-photo">
                <img class="img-thumbnail " data-photoid="{{$photo->id}}" src="{{$photo->photo_path}}"/>
                <div class="overlay">
                    <button onclick="deletePhoto(this,'{{$photo->id}}','{{csrf_token()}}')" rel="tooltip" title="" class="btn btn-danger btn-sm" data-original-title="Delete Photo">
                        <i class="fa fa-2x fa-trash-alt"></i>
                    </button>

                </div>
            </div>
        </div>
    @endforeach
