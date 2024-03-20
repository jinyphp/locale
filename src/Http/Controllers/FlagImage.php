<?php
namespace Jiny\Locale\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FlagImage extends Controller
{
    public function index(Request $request)
    {

        // if(isset($request->id)) {
        //     // 사용자 지정 id
        //     $user_id = $request->id;
        // } else {
        //     // 현재 로그인된 id
        //     $user_id = Auth::user()->id;
        // }

        // $path = storage_path('app').DIRECTORY_SEPARATOR;

        // //dd("avata");

        // $profile = DB::table('user_profile')->where('user_id',$user_id)->first();
        // if($profile) {

        //     $extension = substr($profile->image, strrpos($profile->image, '.')+1);
        //     if($extension == "gif") {
        //         $content_Type="image/gif";
        //     } else if($extension == "jpg") {
        //         $content_Type="image/jpeg";
        //     } else if($extension == "png") {
        //         $content_Type="image/png";
        //     } else if($extension == "svg") {
        //         $content_Type="image/svg+xml";
        //     }

        //     if(file_exists($path.$profile->image)) {
        //         $body = file_get_contents($path.$profile->image);
        //         return response($body)
        //             ->header('Content-type',$content_Type);
        //     }
        // }

        // // 프로파일 미설정
        // // 정보가 없는 경우 기본값 출력
        // if(file_exists($path.'photos/default.jpg')) {
        //     $body = file_get_contents($path.'photos/default.jpg');
        //     return response($body)
        //         ->header('Content-type',"image/jpeg");
        // }
        // //dd($path.'photos/default.jpg');

        // return "프로파일 정보가 없습니다.";
    }

}
