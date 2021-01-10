  <!-- Main Footer -->
  <footer class="main-footer" style="">
    <strong>Copyright &copy; 2020-2021 <a href="http://adminlte.io">mrbullyfx</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('public/assets/js/bootstrap.bundle.mi') }}n.js"></script>
<script src="{{ asset('public/assets/js/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/assets/js/dataTables.bootstrap4.js') }}"></script>

<!-- overlayScrollbars -->

<script src="{{ asset('public/assets/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- AdminLTE App -->

<script src="{{ asset('public/assets/js/adminlte.min.js') }}"></script>

<script src="{{ asset('public/js/plupload/plupload.full.min.js') }}" ></script>

<script>

function deleteVideo(id) {
    var result = window.confirm('Are you sure you want to Delete Video?');
  if (result == false) {
      event.preventDefault();
    } else {
      $.ajax({
          method: "POST",
          url: routes.deleteVideo,
          data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              'id': id
          },
          success: function(response) 
          {
            location.reload();
          }
      });
    }
}



  function changeApproval(status, id) {
    var result = window.confirm('Are you sure you want to Approve user?');
  if (result == false) {
      event.preventDefault();
    } else {
      $.ajax({
          method: "POST",
          url: routes.changeStatus,
          data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              'status': status,
              'userId': id
          },
          success: function(response) 
          {
            location.reload();
          }
      });
    }
}


function cancelSubscription(status, id,email) {
    var result = window.confirm('Are you sure you want to cancel Subscription?');
  if (result == false) {
      event.preventDefault();
    } else {
      $.ajax({
          method: "POST",
          url: routes.cancelSubscription,
          data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              'status': status,
              'userId': id,
              'email' : email
          },
          success: function(response) 
          {
            location.reload();
          }
      });
    }
}


</script>
{{-- <script src="{{ asset('public/js/application.js') }}" type='text/javascript'></script> --}}


<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<!-- <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script> -->
<!-- <script src="plugins/raphael/raphael.min.js"></script> -->
<!-- <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script> -->
<!-- <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script> -->
<!-- ChartJS -->
<!-- <script src="plugins/chart.js/Chart.min.js"></script> -->

<!-- PAGE SCRIPTS -->
<!-- <script src="js/dashboard2.js"></script> -->
</body>
</html>
