<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Redirect;
use Validator;
use App\Video;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Storage;

use Auth;

class VideoController extends Controller
{
    //
    public function create(Request $request)
    {

        if(!Auth::guard('admin')->check())
        {
            return redirect()->route('admin_login');
        }

        if($request->session()->has('video_name'))
        {
            $video = Video::where('url', $request->session()->get('video_name'))->exists();
            // dd($video);
        }
        return view('Admin.upload_video');
    }

    public function uploadVideo(Request $request)
    {
        // dd($request->all());
        // dd($request->all());
         // 5 minutes execution time
         @set_time_limit(5 * 60);
         // Uncomment this one to fake upload time
         // usleep(5000);
 
         // Settings
 
         $targetDir =  "uploads";
         //$targetDir = 'uploads';
         $cleanupTargetDir = true; // Remove old files
         $maxFileAge = 5 * 3600; // Temp file age in seconds
 
 
         // Create target dir
         if (!file_exists($targetDir)) {
             @mkdir($targetDir);
         }
 
         // Get a file name
         if (isset($_REQUEST["name"])) {
             $fileName = $_REQUEST["name"];
         } elseif (!empty($_FILES)) {
             $fileName = $_FILES["file"]["name"];
         } else {
             $fileName = uniqid("file_");
         }
 
         $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
 
         // Chunking might be enabled
         $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
         $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
 
 
         // Remove old temp files    
         if ($cleanupTargetDir) {
             if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                 die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
             }
 
             while (($file = readdir($dir)) !== false) {
                 $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
 
                 // If temp file is current file proceed to the next
                 if ($tmpfilePath == "{$filePath}.part") {
                     continue;
                 }
 
                 // Remove temp file if it is older than the max age and is not the current file
                 if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
                     @unlink($tmpfilePath);
                 }
             }
             closedir($dir);
         }   
 
 
         // Open temp file
         if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) 
         {
             die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
         }
 
         if (!empty($_FILES)) {
             if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                 die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
             }
 
             // Read binary input stream and append it to temp file
             if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                 die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
             }
         } else {    
             if (!$in = @fopen("php://input", "rb")) {
                 die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
             }
         }
 
         while ($buff = fread($in, 4096)) {
             fwrite($out, $buff);
         }
 
         @fclose($out);
         @fclose($in);
 
         // Check if file has been uploaded
         if (!$chunks || $chunk == $chunks - 1) {
             // Strip the temp .part suffix off 
             rename("{$filePath}.part", $filePath);
         }
         $ext = pathinfo('uploads/'.$fileName, PATHINFO_EXTENSION);
         $ext = strtolower($ext);
         // echo $fileName;
 
         $newName = 'uploads/'.strtotime(date('Y-m-d H:s:i')).'.'.$ext;
         rename('uploads/'.$fileName, $newName);

         $request->session()->put('video_name', $newName);
        //  dd($newName);
         // $_SESSION['fl_name'] = $newName;
        //  $this->session->set_userdata('fl_name', $newName);
         
         // echo $_SESSION['fl_name'];
         // exit();
 
         // Return Success JSON-RPC response
        //  die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
        return response()->json(['status' => 0, 'message' => 'success', 'videoName' => $newName]); 
    }



    public function saveVideoData(Request $request)
    {
        // dd($request->all());
        $rules = [
            'title' => 'required|string',
            'category' => 'required',
            'description' => 'required',
            'video_url' => "required",
            'thumbnail' => "required"
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) 
        {
            dd($validator->errors());
            return response()->json(['status' => 1, 'error' => 'Some thing wrong']);

        }

        $currentTime = Carbon::now()->format('dmYhis');

        $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')."-".$currentTime),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'created_at' => now(),
            'ip_address' => $request->ip(),
            'url' => $request->video_url,
            'duration' => gmdate("H:i:s", $request->f_du),
            'user_id' => 1         
        ];

        $video = Video::create($data);

        if ($request->hasFile('thumbnail')) {
            $thumbnails = 'thumbnails';

            if(!Storage::exists($thumbnails))
            {
                Storage::makeDirectory($thumbnails);
            }

            $thumbnailsURL = Storage::putFile($thumbnails, new File($request->file('thumbnail')));
            $video->update(['thumbnail'=> $thumbnailsURL]);
        }

        // exit();


        return response()->json(['status' => 0, 'message' => 'video saved Successfully']);

    }

    public function listVideos()
    {
        if(!Auth::guard('admin')->check())
        {
            return redirect()->route('admin_login');
        }
        $videos = Video::get();
        return view('Admin.list_videos',['videos' => $videos]);
    }

    public function playVideo($id)
    {
        $video = Video::find($id);
        return view('Admin.video_details', ['video' => $video]);
    }
}
