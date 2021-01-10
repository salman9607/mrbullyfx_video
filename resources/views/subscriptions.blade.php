@extends('layouts.app')

@section('content')
      
    
         <div id="content-wrapper" style="margin-bottom: 450px;">
            <div class="container-fluid pb-0">
               <div class="video-block section-padding">
                  <div class="row">
                      
                     <div class="col-md-8">
                        <div class="single-video-left">
                           <div class="single-video">
                          
                            <h3>
                                Your Trail period is over 
                                You have to Buy Subscription
                            </h3>

                            <div class="card" style="width: 18rem;">
                              <img src="{{ asset('public/img/404.png') }}" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Basic</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="{{ route('payment') }}" class="btn btn-primary">Buy Subscription</a>
                              </div>
                            </div>

                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="single-video-right">
                           <div class="row">
                              <div class="col-md-12">
                          
                                    
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->

      
         <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="login.html">Logout</a>
               </div>
            </div>
         </div>
      </div>

@endsection
