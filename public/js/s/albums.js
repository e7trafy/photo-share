let csrf ="{{ csrf_token() }}";


function viewAlbum(id) {
    $.ajax({
        type: 'get',
        url: '/albums/get_album/' + id,
        success: function (data) {
            $('.modal-content').html(data);
            $("#viewModal").modal();
        }
    });
}

function editAlbum(id) {
    $.ajax({
        type: 'get',
        url: '/albums/' + id + '/edit',
        success: function (data) {
            $('.modal-content').html(data);
            // $("#viewModal").modal();
        }
    });
}

function createAlbum() {
    $.ajax({
        type: 'get',
        url: '/albums/create',
        success: function (data) {
            $('.modal-content').html(data);
            $("#viewModal").modal();
        }
    });
}

function storeAlbum(userId) {
    let form_data = new FormData($('#createForm').get(0));
    // form_data.append('photos', $('#photos')[0].files[0]);
    let ins = $('#photos')[0].files.length;
    for (let x = 0; x < ins; x++) {
        form_data.append("photos[]", $('#photos')[0].files[x]);
    }
    $.ajax({
        url: "/albums",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            //$("#preview").fadeOut();
            $("#err").fadeOut();
        },
        success: function (data) {
            $('#viewModal').modal('hide');

            if (data == 'invalid') {
                // invalid file format.
                $("#err").html("Invalid File !").fadeIn();
            } else {
                $.ajax({
                    type: 'get',
                    url: "/albums/get_all_user/" + userId,
                    success: function (result) {
                        $('#viewModal').modal('hide');
                        $('#albumsSection').html(result);
                    }
                });

            }
        },
        error: function (e) {
            $("#err").html(e).fadeIn();
        }
    });
}
function saveAlbum(id,userId) {
    let edit_form_data = new FormData($('#editForm').get(0));
    // form_data.append('photos', $('#photos')[0].files[0]);
    let ins = $('#photos')[0].files.length;
    for (let x = 0; x < ins; x++) {
        edit_form_data.append("photos[]", $('#photos')[0].files[x]);
    }

    $.ajax({
        url: '/albums/' + id,
        type: "post",
        data: edit_form_data,
        headers: {
            'X-CSRF-TOKEN': csrf
        },
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            //$("#preview").fadeOut();
            $("#err").fadeOut();
        },
        success: function (data) {
            $('#viewModal').modal('hide');

            if (data == 'invalid') {
                // invalid file format.
                $("#err").html("Invalid File !").fadeIn();
            } else {
                $.ajax({
                    type: 'get',
                    url: "/albums/get_all_user/" + userId,
                    // dataType: 'JSON',
                    success: function (result) {
                        $('#viewModal').modal('hide');
                        $('#albumsSection').html(result);
                    }
                });

            }
        },
        error: function (e) {
            $("#err").html(e).fadeIn();
        }
    });
}


function deleteAlbum(id,userId,token) {
    swal.fire({
        title: "Delete?",
        text: "Please ensure and then confirm!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: !0
    }).then(function (e) {

        if (e.value === true) {

            $.ajax({
                type: 'delete',
                url: "albums/" + id,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: {
                },
                dataType: 'JSON',
                success: function (results) {
                    $('#viewModal').modal('hide');
                    $.ajax({
                        type: 'get',
                        url: "/albums/get_all_user/" + userId,

                        // dataType: 'JSON',
                        success: function (result) {
                            $('#viewModal').modal('hide');
                            $('#albumsSection').html(result);
                        }
                    });


                    swal.fire("Done!", results.message, "success");

                }, error: function (results) {
                    swal.fire("Error!", results.message, "error");

                }
            });

        } else {
            $('#viewModal').modal('hide');

            e.dismiss;
        }

    }, function (dismiss) {
        return false;
    })
}


// $('#viewModal').modal('hide');
function deletePhoto(element, id,token) {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, do it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'delete',
                url: "albums/photo/" + id,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: {
                },
                dataType: 'JSON',
                success: function (results) {
                    $(element).parents(".album-photo").remove();


                    swal.fire("Done!", results.message, "success");

                }, error: function (results) {
                    swal.fire("Error!", results.message, "error");

                }
            });

        }
    })


}
