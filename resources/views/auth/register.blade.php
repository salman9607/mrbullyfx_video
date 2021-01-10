@extends('layouts.app')

@section('content')
<div class="">
      <section class="login-main-wrapper">
         <div class="container-fluid pl-0 pr-0">
            <div class="row no-gutters">
               <div class="col-md-5 p-5 bg-white full-height">
                  <div class="login-main-left">
                     <div class="text-center mb-5 login-main-left-header pt-4">
                        <img src="public/img/ShootTubeLogoBLACK.png" class="img-fluid" alt="LOGO">
                        <h5 class="mt-3 mb-3">Welcome to Shoottube</h5>
                        <p></p>
                     </div>
                     <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                                <label for="name" class="control-label">{{ __('Name') }}</label>
                                <div>
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                                    @error('name')
                                        <span class="is-invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group">
                                <label for="name" class="control-label">{{ __('E-Mail Address') }}</label>
                                <div>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="is-invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="name" class="control-label">{{ __('Password') }}</label>
                                <div>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="is-invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group">
                                <label for="name" class="control-label">{{ __('Confirm Password') }}</label>
                                <div>
                                    <input type="password" id="password-confirm" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                </div>
                        </div>

                        <div class="mt-4">
                           <div class="row">
                              <div class="col-12">
                                 <button type="submit" class="btn btn-outline-primary btn-block btn-lg">{{ __('Sign Up') }}</button>
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="text-center mt-5">
                        <p class="light-gray">Already have an Account? <a href="{{url ('login') }}">{{ __('Sign In') }}</a></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-7" style="    background-color: #39D198;">
                  <div class="login-main-right bg-white p-5 mt-5 mb-5">
                     <div class="owl-carousel owl-carousel-login">
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="public/img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">​Watch videos offline</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="public/img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Download videos effortlessly</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="public/img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Create GIFs</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

</div>
@endsection
