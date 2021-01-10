            @foreach($videos as $video)
                 <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="video-card">
                       <div class="video-card-image">
                          <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                          <a href="#"><img class="img-fluid" src="{{ asset('img/v1.png') }}" alt=""></a>
                          <div class="time">3:50</div>
                       </div>
                       <div class="video-card-body">
                          <div class="video-title">
                          <a href="{{ route('playVideo',$video->id) }}" }}>{{ $video->title}}</a>
                          </div>
                          <div class="video-page text-success">
                             Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                          </div>
                          <div class="video-view">
                             1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                          </div>
                       </div>
                    </div>
                 </div>
                 @endforeach
