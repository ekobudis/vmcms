<?php

namespace App\Http\Controllers\Backends;

use Image;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\WebmasterBanner;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        // set the model
    }

    public function index(Request $request)
    {
        $save_state = '';
        $title = "Image Lists";
        $banner = new Banner;
        if($request->ajax()){
            $banners = Banner::select(\DB::raw('banners.id,banners.section_id,banners.banner_subtitle,banners.banner_title,banners.banner_description,banners.banner_image,banners.status,webmaster_banners.banner_name'))
                        ->join('webmaster_banners','webmaster_banners.id','=','banners.webmaster_banner_id')
                        ->get();

            if(!empty($banners)){
                return DataTables::of($banners)
                    ->addColumn('gabungan', function ($banners) {
                        $uri_edit = url()->current();
                        return '<div class="media-left">
                                    <div class="media-body">
                                        <a href="'.$uri_edit.'/'.$banners->id.'" class="text-blue-700 text-semibold">'.$banners->banner_subtitle .'</a>
                                    </div>
                                    <div class="text-muted text-size-small"><span class="text-semibold">'.ucfirst(preg_replace('/[A-Z]/', ' $0', $banners->banner_name)).'</span>
                                    </div>
                                </div>';
                    })
                    ->addColumn('preview',function($banners){
                        if($banners->banner_image != ''){
                            if($banners->section_id==0){
                                $imgView = asset('images/main-slider/'.$banners->banner_image);
                            }else{
                                $imgView = asset('images/content/'.$banners->banner_image);
                            }
                            return '<div class="text-center">
                                        <img src="'.$imgView.'" width="130px" height="85px">
                                    </div>';
                        }else{
                            return '<div class="text-center">
                                        
                                    </div>';
                        }
                    })
                    ->addColumn('status',function($banners){
                        if($banners->status == 0){
                            return '<div class="text-center">
                                        <span class="badge badge-info"> Actived </span>
                                    </div>';
                        }else{
                            return '<div class="text-center">
                                        <span class="badge badge-danger"> Suspend </span>
                                    </div>';
                        }
                    })
                    ->addColumn('action', function ($banners) {
                        return '<div class="text-center">
                                    <a href="#" onclick="showDeleteData('.$banners->id.');" data-id='.$banners->id.' data-token="{{csrf_token()}}" data-toggle="tooltip" title="Delete Record"> <i class="fas fa-trash"></i></a>
                                </div>';
                    })
                    ->rawColumns(['gabungan','preview','status','action'])
                    ->make(true);
            }
        }

        return view('admin.banners.index',compact('title','save_state','banner'));
    }

    public function create(Request $request)
    {
        $save_state = 'add';
        $title = "New Image";
        $banner = new Banner();
        return view('admin.banners.index',compact('title','save_state','banner'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'webmaster_banner_id' => 'required',
            'banner_subtitle' => 'required',
            'banner_title' => 'required',
            'banner_meta' => 'required|string|min:2',
            'image_upload' => 'required|mimes:jpg,jpeg,png|max:5120',
        ]);

        //dd($request->all());
        try{
            $sectionID = $request->webmaster_banner_id;
            //dd($section_id);
            $bannerSetting =  WebmasterBanner::find($sectionID);
            
            if($request->section_id==null){
                $sectionID = 0;
            }else{
                $sectionID = $request->section_id;
            }

            if ($request->file('image_upload')) {
                $image_banner = $request->file('image_upload');
    
                $file_banner = time(). rand(1111, 9999) . '.' .$image_banner->getClientOriginalExtension();
    
                if($sectionID==0){
                    $save_Path = public_path('images/main-slider/'.$file_banner);
                }else{
                    $save_Path = public_path('images/content/'.$file_banner);
                }
    
                Image::make($image_banner->getRealPath())
                        ->resize($bannerSetting->width, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save($save_Path);
            } else {
                $file_banner = "";
            }

            $banner = new Banner();
            $banner->webmaster_banner_id = $request->webmaster_banner_id;
            $banner->banner_title = $request->banner_title;
            $banner->banner_subtitle = $request->banner_subtitle;
            $banner->section_id = $sectionID;
            if($sectionID == 0){
                $banner->title_class = '';
                $banner->data_delay = 0;
                $banner->data_class = '';
            }else{
                $banner->title_class = $request->title_class;
                $banner->data_delay = $request->data_delay;
                $banner->data_class = $request->data_class;
            }
            $banner->page_content = $request->page_content;
            $banner->banner_description = $request->banner_description;
            $banner->banner_meta = $request->banner_meta;
            $banner->banner_meta_description = $request->banner_meta_description;
            $banner->banner_abstract = $request->banner_abstract;
            $banner->banner_image = $file_banner;
            $banner->save();
            
            $notification = array(
                'message' => 'Image data successfull to saved',
                'alert-type' => 'info'
            ); 

            return redirect(route('admin.images'))->with($notification);
        } catch(\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function edit(Request $request, $id)
    {
        $save_state = 'edit';
        $title = "Edit Image";
        $banner = Banner::find($id);
        return view('admin.banners.index',compact('title','save_state','banner'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'webmaster_banner_id' => 'required',
            'banner_subtitle' => 'required',
            'banner_title' => 'required',
            'banner_meta' => 'required|string|min:2',
        ]);

        //dd($request->all());
        try{
            $sectionID = $request->webmaster_banner_id;
            //dd($section_id);
            $bannerSetting =  WebmasterBanner::find($sectionID);
            
            if($request->section_id==null){
                $sectionID = 0;
            }else{
                $sectionID = $request->section_id;
            }

            $banner = Banner::find($id);
            $banner->webmaster_banner_id = $request->webmaster_banner_id;
            $banner->banner_subtitle = $request->banner_subtitle;
            $banner->banner_title = $request->banner_title;
            $banner->section_id = $sectionID;
            $banner->title_class = $request->title_class;
            $banner->data_delay = $request->data_delay;
            $banner->data_class = $request->data_class;
            $banner->page_content = $request->page_content;
            $banner->banner_description = $request->banner_description;
            $banner->banner_meta = $request->banner_meta;
            $banner->banner_meta_description = $request->banner_meta_description;
            $banner->banner_abstract = $request->banner_abstract;

            if ($request->file('image_upload')) {
                $image_banner = $request->file('image_upload');
    
                $file_banner = time(). rand(1111, 9999) . '.' .$image_banner->getClientOriginalExtension();
    
                if($sectionID==0){
                    $save_Path = public_path('images/main-slider/'.$file_banner);
                }else{
                    $save_Path = public_path('images/content/'.$file_banner);
                }
                
                if ($banner->banner_image != "") {
                    if($sectionID==0){
                        File::delete(public_path('images/main-slider/' . $banner->banner_image));
                    }else{
                        File::delete(public_path('images/content/' . $banner->banner_image));
                    }
                }
                //Image::make($image->getRealPath())->resize(300, 236)->save($save_Path);
                Image::make($image_banner->getRealPath())
                        ->resize($bannerSetting->width, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save($save_Path);
                
                $banner->banner_image = $file_banner;
            } else {
                $file_banner = "";
            }
            
            $banner->save();
            
            $notification = array(
                'message' => 'Image data successfull to update',
                'alert-type' => 'info'
            ); 

            return redirect(route('admin.images'))->with($notification);
        } catch(\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function delete($id)
    {
        try{
            $banner = Banner::find($id);
            $banner->delete();

            $notification = array(
                'message' => 'Image successfull to delete',
                'alert-type' => 'warning'
            ); 

            return redirect(route('admin.images'))->with($notification);
            

        } catch(\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
