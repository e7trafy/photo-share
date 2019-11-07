<div class="row">
    @foreach($albums as $album)
    <div class="col-md-3" >
        <div class="card mt-4">
            <img v-if="album.photos.length" class="card-img-top" src="{{$album.photos[0].photo_path}}">
            <div class="card-body">
                <h3 class="card-text"><strong>{{ $album.name }}</strong>


                </h3>

                <div v-if="album.privacy">
                    <i class="fal fa-lock-open"></i>
                </div>
                <div v-else>
                    <i class="fas fa-lock"></i>
                </div>

            </div>
            <button class="btn btn-success m-2" @click="viewAlbum(i)">View Album</button>
        </div>
    </div>
    <el-dialog v-if="currentAlbum" :visible.sync="albumDialogVisible" width="40%">
      <span>
        <h3>{{ currentAlbum.title }}</h3>
        <div class="row">
          <div class="col-md-6" v-for="(img, i) in currentAlbum.photos" :key=i>
            <img :src="img.photo_path" class="img-thumbnail" alt="">
          </div>
        </div>
        <hr>
        <p>{{ currentAlbum.body }}</p>
      </span>
        <span slot="footer" class="dialog-footer">
        <el-button type="primary" @click="albumDialogVisible = false">Okay</el-button>
      </span>
    </el-dialog>
        @endforeach
</div>
