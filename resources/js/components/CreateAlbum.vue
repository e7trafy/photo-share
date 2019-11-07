<template>
<div class="row">
    <button class="btn btn-success m-2" @click="createAlbumButton()">Add Album</button>
    <el-dialog  :visible.sync="createDialogVisible" width="40%">
        <div class="card mt-4" >

            <div class="card-header">New Album</div>
            <div class="card-body">
                <div v-if=status_msg :class="{'alert-success': status, 'alert-danger': !status }" class="alert" role="alert">
                    {{ status_msg }}
                </div>
                <form>
                    <div class="form-group">
                        <label class="col-3 float-left" for="title">Title</label>
                        <input name="title" v-model="title" type="text" class="form-control col-8" id="title" placeholder="Album Title" required>
                    </div>
                    <div class="form-group">
                        <label class="col-3" for="Privacy">Album Privacy</label>
                        <el-select v-model="value" value-key="value" placeholder="Select" class="col-8">

                            <el-option
                                v-for="item in options"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value">
                            </el-option>
                        </el-select>

                    </div>
                    <div class="">
                        <el-upload
                            name="photos"
                            action="/"
                            list-type="picture-card"
                            :on-preview="handlePictureCardPreview"
                            :on-change="updateImageList"
                            :auto-upload="false">
                            <i class="el-icon-plus"></i>
                        </el-upload>
                        <el-dialog :visible.sync="dialogVisible">
                            <img width="100%" :src="dialogImageUrl" alt="">
                        </el-dialog>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="button" @click="createAlbum" class="btn btn-success">
                    {{ isCreatingAlbum ? 'Albuming...' : 'Create Album' }}
                </button>
            </div>
        </div>

    </el-dialog>

</div>

</template>

<script>
    import { mapState, mapActions } from 'vuex';

    export default {
        name: "CreateAlbum",
        props: ['albums','userId'],
        data() {
            return {
                createDialogVisible: false,
                dialogImageUrl: '',
                dialogVisible: false,
                imageList: [],
                status_msg: '',
                status: '',
                isCreatingAlbum: false,
                title: '',
                body: '',
                options:[{
                    value:'1',
                    label:'Public'
                },{
                    value:'0',label:'Private'
                }],
                value: '1',
            };
        },
        computed: {
            ...mapActions(['getUserAlbums','getPublicAlbums']),
        },
        mounted() {
        },
        methods: {
            createAlbumButton() {
                this.createDialogVisible = true;
            },
            updateImageList(file) {
                this.imageList.push(file.raw);
            },
            handlePictureCardPreview(file) {
                this.dialogImageUrl = file.url;
                this.imageList.push(file);
                this.dialogVisible = true;
            },
            createAlbum(e) {
                e.preventDefault();
                if (!this.validateForm()) {
                    return false;
                }

                this.isCreatingAlbum = true;
                let formData = new FormData();

                formData.append('title', this.title);
                formData.append('privacy', this.value);

                $.each(this.imageList, function(key, image) {
                    formData.append(`photos[${key}]`, image);
                });

                api.post('/albums/create_album', formData, {headers: {'Content-Type': 'multipart/form-data'}})
                    .then((res) => {
                        this.title = this.body = '';
                        this.status = true;
                        this.showNotificaiton('Album Successfully Created');
                        this.isCreatingAlbum = false;
                        // this.getUserAlbums();
                        this.$store.dispatch('getUserAlbums',this.userId);

                    });
                this.createDialogVisible = false;
            },
            validateForm() {
                if (!this.title) {
                    this.status = false;
                    this.showNotificaiton('Album title cannot be empty');
                    return false;
                }
               return true;
            },
            showNotificaiton(message) {
                this.status_msg = message;
                setTimeout(() => {
                    this.status_msg = '';
                }, 3000);
            }
        },
    };
</script>


<style scoped>

</style>
