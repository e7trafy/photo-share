

<div class="row">
    @foreach($albums as $album)
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="card mt-4">
                <img  class="card-img-top" src="{{isset($album->photos[0])? $album->photos[0]->photo_path:''}}">
                <div class="card-body">
                    <h3 class="card-text"><strong>{{ $album->name }}</strong>
                    </h3>

                    <div>@if($album->privacy)
                        <h4  class="text-info">Public</h4>
                             @else
                            <h4 class="text-info">Private</h4>
                        @endif
                    </div>

                </div>
                <button class="btn btn-success m-2" onclick="viewAlbum({{$album->id}})">View Album</button>
            </div>
        </div>
    @endforeach
    <!-- Button trigger modal -->
{{--        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">--}}
{{--            Launch demo modal--}}
{{--        </button>--}}

        <!-- Modal -->
        <div class="modal fade " id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">

                </div>
            </div>
        </div>

</div>
