@include('layouts.admin_header');
@include('layouts.admin_aside');

{{-- <link rel="stylesheet" href="{{ asset('public/css/file-drag_browser-uploader.css') }} ?>"> --}}

<style>
    .dz-message {
        font-size: 23px;
    }

    .dropzone {
        background: #ffffff;
        border: 2px dashed #dddddd;
        border-radius: 5px;
    }

    .dz-message {
        color: #999999;
    }

    .dz-message:hover {
        color: #464646;
    }

    .dz-message h3 {
        font-size: 200%;
        margin-bottom: 15px;
    }

    progress {
        border-radius: 2px;
        width: 100%;
        height: 22px;
        /* margin-left:-11.5%; */
    }

    progress::-webkit-progress-bar {
        background-color: #0091EA;
        border-radius: 2px;
    }

    progress::-webkit-progress-value {
        border-radius: 2px;
    }

    progress::-moz-progress-bar {
        /* style rules */
    }

    div#body {
        border: solid 1px;
        text-align: center;
        padding: 9px;
    }

    a#upload {
        width: 200px;
    }

</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard v2</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

    </div>

    <section>
        <div>
            <!-- Info boxes -->
            <div>
                <form method="post" action="{{ route('saveVideoData') }}" id="fileUploadForm"
                    enctype="multipart/form-data" onsubmit="return false">

                    <input type="hidden" value="{{ Session::token() }}" name="_token" id="token">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput1">Video Title</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput1">Video Thumbnail</label>
                                        <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                                    </div>

                                    
                                    <div class="form-group mb-3">
                                        <label for="simpleinput1">Choose Video</label>
                                        <input type="file" name="file" id="file_upload" class="form-control" accept="video/*">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="description_short">Description</label>
                                        <textarea class="form-control" id="description" name="description"
                                            rows="6"></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="category">Category</label>
                                        <span class="help"></span>
                                        <select class="form-control select2" id="category" name="category">

                                            <option value="Fun">
                                                Fun
                                            </option>
                                            <option value="Gaming">Gaming</option>
                                            <option value="Intertainment">Intertainment</option>

                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
            <div class="form-group">
                <label class="form-label">Preview</label>
                <div id="video_player_div">
                    <video id="videoclip" style="width: 500px" controls="controls"  title="Video title">
                        <source id="mp4video"  src="" type="video/mp4"  />
                       </video>
                </div>
            </div>
        </div>
        <input type="hidden" name="f_du" id="f_du"  size="5" /> 
        <input type="submit" value="Upload" id="upload-btn" style="display:none" />

                        <hr>
                        <div class="col-6">
                            <div class="row">
                                <div class="form-group col-6">
                                    <input style="margin-left: 10px" type="submit" onclick="uploadVideo()" id="upload-video"
                                        class="btn btn-success col-12" value="Submit Movie">
                                    <input type="hidden" name="video_url" id="video_name" value="">
                                </div>
                                <div class="col-6">

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.inf
        o-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->

            <!-- /.row -->

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <!-- MAP & BOX PANE -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<audio id="audio"></audio>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>


// Code to get duration of audio /video file before upload - from: http://coursesweb.net/
  
  //register canplaythrough event to #audio element to can get duration
  var f_duration =0;  //store duration
  document.getElementById('audio').addEventListener('canplaythrough', function(e){
    //add duration in the input field #f_du
    f_duration = Math.round(e.currentTarget.duration);
    document.getElementById('f_du').value = f_duration;
    URL.revokeObjectURL(obUrl);
  });
  
  //when select a file, create an ObjectURL with the file and add it in the #audio element
  var obUrl;
  document.getElementById('file_upload').addEventListener('change', function(e){
    var file = e.currentTarget.files[0];
    //check file extension for audio/video type
    if(file.name.match(/\.(avi|mp3|mp4|mpeg|ogg)$/i)){
      obUrl = URL.createObjectURL(file);
      document.getElementById('audio').setAttribute('src', obUrl);
    }
  });





    $(document).ready(function () {

        $("#file_upload").on('change', function (event) {

            $('#upload-video').prop('disabled', true);
            //stop submit the form, we will post it manually.
            //  event.preventDefault();

            // Get form
            var form = $('#fileUploadForm')[0];

            // Create an FormData object 
            var data = new FormData(form);

            // If you want to add an extra field for the FormData
            data.append("CustomField", "This is some extra data, testing");

            // disabled the submit button
            $("#btnSubmit").prop("disabled", true);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: routes.upload_video,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 800000,
                success: function (data) {
                    if (data.status == 0) {
                        $('#upload-video').prop('disabled', false);
                        $('#file_upload').prop('disabled', true);
                        $('#video_name').val(data.videoName);
                        
                        // $('#video_player_div').html('<video width="320" height="240" controls><source type="video/mp4" id="player"></video>');
                            var videocontainer = document.getElementById('videoclip');
                                var videosource = document.getElementById('mp4video');
                                var newmp4 = data.videoName;
                                        // var newposter = 'images/video-cover.jpg';
                                videocontainer.pause();
                                videosource.setAttribute('src', newmp4);
                                videocontainer.load();
                                //videocontainer.setAttribute('poster', newposter); //Changes video poster image
                                videocontainer.play();
                            

                    }
                    $("#output").text(data);
                    //  console.log("SUCCESS : ", data);
                    //  $("#btnSubmit").prop("disabled", false);

                },
                error: function (e) {

                    $("#output").text(e.responseText);
                    //  console.log("ERROR : ", e);
                    //  $("#btnSubmit").prop("disabled", false);

                }
            });

        });
    });


    function uploadVideo() {
        // / Get form
        // var data = {
        //     "title" : $('#title').val(),
        //     "description" : $('#description').val(),
        //     "video_url" : $("#video_name").val(),
        //     "_token" : $("#token").val(),
        //     "category" : $('#category').val(),
        //     "thumbnail" : $('#thumbnail').val()
        // };
        // console.log(data);
        
        // var data = $('#fileUploadForm').serialize();
        $.ajax({
            type: "POST",
            url: routes.saveVideoData,
            data: new FormData($('#fileUploadForm')[0]),
            processData: false,
                contentType: false,
                cache: false,
            success: function (response) {
                if (response.status == 0) {
                    window.location.href = "{{ route('listVideos') }}";
                }
                $("#output").text(response);
            },
            error: function (e) {

                $("#output").text(e.responseText);

            }
        });
    }

</script>


@include('layouts.admin_footer');
