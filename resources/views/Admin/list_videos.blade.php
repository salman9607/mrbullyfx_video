@include('layouts.admin_header');
@include('layouts.admin_aside');

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Videos</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="">Home</a></li>
      <li class="breadcrumb-item active">Videos</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->

{{-- <a  href="{{ route('upload_video') }}" class="btn btn-info btn-lg float-right" style="margin-bottom: 20px" >Upload New Video</a> --}}

</div>

<section class="content">
<div>

    <!-- Info boxes -->

<div>
 
  <table id="video-table" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>uploaded on</th>
            <th>Action</th>
          </tr>
    </thead>
    <tbody>
      @php
          $count = 1;
      @endphp
      @foreach ($videos as $video)      
      <tr>
        <td>{{ $count }}</td>
        <td><a href="{{ route('playVideo', $video->id) }}">{{ $video->title }}</a></td>
        <td>{{ $video->category }}</td>
        <td>{{ date('d-m-Y h:s:A', strtotime($video->created_at)) }}</td>

        <td><a style="text-decoration:none" href="javascript:void(0);"
          onclick="deleteVideo({{  $video->id }});"
          class="action-btn"> Delete </a></td>
      </tr>
      @php
          $count++
      @endphp
      @endforeach  
    </tbody>
</table>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
   
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
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
  
    <!-- /.info-box -->
  
  
    <!-- /.info-box -->
   
    <!-- /.info-box -->
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

@include('layouts.admin_footer');

<script>
  $(function () {
    $('#video-table').DataTable({
    });
  });
</script>
