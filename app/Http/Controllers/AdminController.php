<?php

namespace App\Http\Controllers;

use App\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Auth;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovalMail;

use App\Video;
use Storage;

use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::guard('admin')->check())
        {
            return redirect()->route('admin_login');
        }

        $videos = Video::get()->count();

        $users = User::get()->count();
     

        return view('Admin.admin', compact('videos', 'users'));
    }

    public function adminLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|string|max:191',
            'password' => 'required',
        ]);

    if ($validator->fails())
    {
        return Redirect::back()->withErrors($validator)->withInput($request->all());
    }
        
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1])) 
        {
            return redirect()->route('admin');
        }

        return back()->with('error' , 'invalid email/password');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function login()
    {

        if(Auth::guard('admin')->check())
        {
            return redirect()->route('admin');
        }
        
		return view('Admin.login');
    }
    
    public function listUsers()
    {
        if(!Auth::guard('admin')->check())
        {
            return redirect()->route('admin_login');
        }

        $users = User::get();

        return view('Admin.users', ['users' => $users]);
    }
    

    public function showUser($id)
    {
        if(!Auth::guard('admin')->check())
        {
            return redirect()->route('admin_login');
        }
        $user = User::find($id);

        return view('Admin.user_details', ['user' => $user]);
    }

    public function changeStatus(Request $request)
    {
        $user = User::find($request->userId);

        $user->update(['is_approved' => 1]);

        // Mail::to("zohaibzebi66@gmail.com")->send(new ApprovalMail());

//         // the message
// $msg = "Hello\n\nYour Account has been approved You can login now.\n\n Best Regards\nShoottube";

// // use wordwrap() if lines are longer than 70 characters
// // $msg = wordwrap($msg,70);

// $email = $request->email; 
// // send email
// $a = mail($email, "Approval Email" ,$msg);
$to = "zohaibzebi66@gmail.com";
$subject = "Approval email";

$message = "Hello\n\nYour Account has been approved You can login now.\n\n Best Regards\nShoottube";



// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@probrains.co>' . "\r\n";
$headers .= 'Cc: zohaibirshad862@gmail.com' . "\r\n";

$a =  mail($to,$subject,$message,$headers);



    }

    public function cancelSubscription(Request $request)
    {
        $user = User::find($request->userId);

        $user->update(['sub_cancelled' => 1, 'is_approved' => 0]);
        
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }

    public function deleteVideo(Request $request)
    {
        // dd($request->all());
        $video = Video::find($request->id);
        $video->delete();
        // dd($video->url);
        // unlink($video->url);
        Storage::delete($video->thumbnail);

        return response()->json(['status' => 0, 'message' => 'deleted successfully']);
    }

}
