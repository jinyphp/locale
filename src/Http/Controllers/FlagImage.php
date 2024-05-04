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
        $code = $request->code;
        $code = strtolower($code);

        $path = __DIR__."/../../../public"; // package public path
        $path .= "/images/flags";

        $content_Type = $this->extention($code);
        if(file_exists($path."/".$code)) {
            $body = file_get_contents($path."/".$code);
            return response($body)
                ->header('Content-type',$content_Type);
        }

    }

    private function extention($flag)
    {
        $extension = substr($flag, strrpos($flag, '.')+1);
        if($extension == "gif") {
            $content_Type="image/gif";
        } else if($extension == "jpg") {
            $content_Type="image/jpeg";
        } else if($extension == "png") {
            $content_Type="image/png";
        } else if($extension == "svg") {
            $content_Type="image/svg+xml";
        }

        return $content_Type;
    }

}
