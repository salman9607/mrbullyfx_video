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
 
  <table id="users-table" class="table table-striped table-bordered table-hover" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Registered on</th>
            <th>Subscription</th>

            <th>Payment Status</th>

            <th>Action</th>
          </tr>
    </thead>
    <tbody>
      @php
          $count = 1;
      @endphp
      @foreach ($users as $user)      
      <tr>
        <td>{{ $count }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ date('d-m-Y h:s:A', strtotime($user->created_at)) }}</td>
        <td>
        {{ ($user->free_trail == 1 && $user->subscription_status != 1) ? 'Free Trail' : 'Basic' }}
        </td>
        <td>
        @if ($user->free_trail == 0) 
        {{ ($user->payment_status == 1) ? 'Paid' : 'Not Paid' }}
        @endif
      </td>
        <td>

          @if($user->payment_status == 1 && $user->subscription_status == 1 && $user->is_approved == 0)
           <a style="text-decoration:none" href="javascript:void(0);"
              onclick="changeApproval(1, {{  $user->id }});"
              class="action-btn"> Approve </a>|
          @elseif($user->is_approved == 1)
           Approved |
          
           @endif

          <a style="text-decoration:none" href="{{ route('userDetails', $user->id) }}"
              
              class="action-btn"> Details </a>


              @if($user->sub_cancelled != 1 && $user->subscription_status == 1)
           | <a style="text-decoration:none" href="javascript:void(0);"
              onclick="cancelSubscription(1, {{  $user->id }},'{{ $user->email }}');"
              class="action-btn">Cancel </a>
          @elseif($user->sub_cancelled == 1)
           | Cancelled 
          
           @endif

      </td>

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
    
      <!-- /.info-box-content -->
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
    $('#users-table').DataTable({
    });
  });


</script>
