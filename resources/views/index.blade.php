@extends('layouts.app')

@section('content')

<div id="content-wrapper">
   <div class="container-fluid ">
      <div class="video-block section-padding">
         <div class="row">
         @foreach($videos as $video)
<div class="col-md-3" style="margin-top: 50px">

<div class="video-card">
   <div class="video-card-image">
                          <a class="play-icon" href="{{ route('play_video', $video->slug) }}"><i class="fas fa-play-circle"></i></a>
                          <a href="{{ route('play_video', $video->slug) }}"><img class="img-fluid" src="{{ asset('storage/app/'.$video->thumbnail) }}" style="height: 200px;" alt=""></a>
                          <div class="time">{{ $video->duration }}</div>
                        </div>
                       <div class="video-card-body">
                          <div class="video-title">
                             <a href="{{ route('play_video', $video->slug) }}">{{ $video->title}}</a>
                           </div>
                          <div class="video-page text-success">
                             {{ $video->category }}  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                          </div>
                          <div class="video-view">
                             {{ $video->views }} views &nbsp;<i class="fas fa-calendar-alt"></i> {{ Carbon\Carbon::parse($video->created_at)->diffForHumans()}}                           </div>
                        </div>
                           </div>
                  </div>
                  @endforeach      
               </div>
                  </div>
               </div>
            </div>
 @endsection