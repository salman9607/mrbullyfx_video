@include('layouts.admin_header');
@include('layouts.admin_aside');

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">user Details</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
      <li class="breadcrumb-item active">user Details</li>
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
                                <td>Name: </td>
                                <td> <b> {{ $user->name  }} </b> </td>
                            </tr>


                            <tr>
                                <td>Email: </td>
                                <td> <b> {{ $user->email  }} </b> </td>
                            </tr>

                            <tr>
                                <td>Subscription: </td>
                                <td> <b>
                                {{ ($user->free_trail == 1 && $user->subscription_status != 1) ? 'Free Trail' : 'Basic' }}
                                
                                </b> </td>
                            </tr>

                            <tr>
                                <td>Payment: </td>
                                <td> <b>
                                    @if ($user->free_trail == 0) 
                                    {{ ($user->payment_status == 1) ? 'Paid' : 'Not Paid' }}
                                    @endif
                                </b> </td>
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
<script src="{{ asset('public\js\user.js') }}"></script>
