<?php

namespace App\Http\Controllers;
use App\Video;
use Auth;
use App\User;
use App\View;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');


    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $videos = Video::inRandomOrder()->get();

        // dd($videos);
        return view('index', ['videos' => $videos]);
    }
    
    public function playVideo($slug)
    {
        $video = Video::where('slug', $slug)->first();

        $videos = Video::inRandomOrder()->limit(10)->get();

        // $video_views = Video::select('views')->where('slug', $slug)->first();

        // dd($video->views);
        

        

        $view =  View::firstOrCreate(['user_id' => Auth::id(), 'video_id' => $video->id]);
        // dd($view->wasRecentlyCreated);
        // dd(asset($video->url));

        if($view->wasRecentlyCreated)
        {
            $video->update(['views' => $video->views + 1]);
        }


        return view('play_video',['video' => $video, 'videos' => $videos]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function getSubs()
    {
        return view('subscriptions');
    }

    public function checkOut()
    {
        return view('checkout');
    }

    public function confirmPayment()
    {
        $user = User::find(Auth::id());

        $user->update(['payment_status' => 1, 'subscription_status' => 1, 'sub_cancelled' => 0]);

        return view('thankyou');
    }

    public function cancelled()
    {
        return view('cancelled');
    }



}
