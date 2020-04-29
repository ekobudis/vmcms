<?php

namespace App\Http\Controllers\Frontends;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Harimayco\Menu\Models\Menus;

class WebController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->segment(0));
        $slides = Banner::select('id','banner_subtitle','banner_title','banner_image')
                    ->where('section_id',0)
                    ->orderBy('id','desc')
                    ->limit(5)
                    ->get();

        $homes = Banner::where('section_id','!=',0)
                    ->limit(5)
                    ->get();

        return view('frontend.index',compact('slides','homes'));
    
    }

    public function pages(Request $request, $uri_dest){
        //dd($request->segment(1));
        if($request->segment(1)=='contact' || $request->segment(1)=='contact-us'){
            return view('frontend.index');
        }elseif($request->segment(1)=='portofolio' || $request->segment(1)=='galery'){
            return view('frontend.index');
        }elseif($request->segment(1)=='product' || $request->segment(1)=='services' || $request->segment(1)=='product-services'){
            return view('frontend.index');
        }elseif($request->segment(1)=='career' || $request->segment(1)=='recruitment'){
            return view('frontend.index');
        }elseif($request->segment(1)=='blog'){
            return view('frontend.index');
        }elseif($request->segment(1)=='home' || $request->segment(1)==''){
            $slides = Banner::select('id','banner_subtitle','banner_title','banner_image')
                        ->where('section_id',0)
                        ->orderBy('id','desc')
                        ->limit(5)
                        ->get();

            $homes = Banner::where('section_id','!=',0)
                        ->limit(5)
                        ->get();

            return view('frontend.index',compact('slides','homes'));
        }
    }

    /*public function services()
    {
        $uri_dest = "";
        return view('frontend.index'));
    }*/
}
