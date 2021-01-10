@include('layouts.admin_header');
@include('layouts.admin_aside');

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Video</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
      <li class="breadcrumb-item active">Video</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->

</div>

<section>
<div>
<!-- Info boxes -->
<div>
    <div class="">
        <div class="card card-default">
            <div class="card-body custom-row">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="admin-detail-page">
                            <tr>
                                {{-- <td>Tour Title </td> --}}
                                <td> <b> {{ $video->Title  }} </b> </td>
                            </tr>

                            <tr>
                                <td>
                                    <video width="320" height="240" controls>
                                        <source src="{{ asset($video->url) }}" type="video/mp4">
                                        {{-- <source src="movie.ogg" type="video/ogg"> --}}
                                        Your browser does not support the video tag.
                                      </video>

                                </td>
                            </tr>


                            <tr>
                                <td> 
                                    Description:
                                <p>
                                    {{ $video->description }}
                                </p>
                                </td>
                                
                            </tr>
                            
                            </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
  </div>

<div class="row">
  <div class="col-md-8">
  </div>

  <div class="col-md-4">
  </div>
</div>
</div>
</section>
</div>

<aside class="control-sidebar control-sidebar-dark">
</aside>

@include('layouts.admin_footer');
<script src="{{ asset('public\js\tour.js') }}"></script>
