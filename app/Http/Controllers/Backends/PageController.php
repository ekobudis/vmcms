<?php

namespace App\Http\Controllers\Backends;

use File;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorys;
use App\Models\Page;
use App\Models\Section;
use App\Models\WebmasterBanner;
use App\Models\WebmasterSection;
use Harimayco\Menu\Models\MenuItems;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        // set the model
    }

    public function getCategoryByMenuID(Request $request)
    {
        if($request->ajax()){
            $catMenu = Section::select(\DB::raw('sections.id,sections.name,webmaster_sections.menu_item_id'))
                        ->join('webmaster_sections','webmaster_sections.id','=','sections.webmaster_section_id')
                        ->get();

            return $catMenu;
        }
    }

    public function index(Request $request)
    {
        $save_state = '';
        $title = "Post Lists";
        $banner = new Page;
        if($request->ajax()){
            $banners = Banner::select(\DB::raw('banners.id,banners.banner_title,banners.banner_description,banners.banner_image,banners.status,webmaster_banners.banner_name'))
                        ->join('webmaster_banners','webmaster_banners.id','=','banners.webmaster_banner_id')
                        ->get();

            if(!empty($banners)){
                return DataTables::of($banners)
                    ->addColumn('gabungan', function ($banners) {
                        $uri_edit = url()->current();
                        return '<div class="media-left">
                                    <div class="media-body">
                                        <a href="'.$uri_edit.'/'.$banners->id.'" class="text-blue-700 text-semibold">'.$banners->banner_title .'</a>
                                    </div>
                                    <div class="text-muted text-size-small"><span class="text-semibold">'.ucfirst(preg_replace('/[A-Z]/', ' $0', $banners->banner_name)).'</span>
                                    </div>
                                </div>';
                    })
                    ->addColumn('preview',function($banners){
                        if($banners->banner_image != ''){
                            $imgView = asset('images/'.$banners->banner_image);
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

        return view('admin.pages.index',compact('title','save_state','banner'));
    }

    public function create(Request $request)
    {
        $save_state = 'add';
        $title = "New Post";
        $pages = new Page();
        $postMenus = MenuItems::where('link','!=','#')->get();
        return view('admin.pages.index',compact('title','save_state','pages','postMenus'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'menu_item_id' => 'required',
            'title' => 'required',
            'page_content' => 'required',
            'webmaster_banner_id' => 'required',
            'page_meta' => 'required|string|min:2',
            'page_description' => 'required|string|min:2',
            'image_upload' => 'required|mimes:jpg,jpeg,png|max:5120',
        ]);

        //dd($request->all());
        try{
            $bannerSetting =  WebmasterBanner::find($request->webmaster_banner_id);
            
            if ($request->file('image_upload')) {
                $image_banner = $request->file('image_upload');
    
                $file_banner = time(). rand(1111, 9999) . '.' .$image_banner->getClientOriginalExtension();
    
                $save_Path = public_path('images/'.$bannerSetting->destination_folder.'/'.$file_banner);
    
                //Image::make($image->getRealPath())->resize(300, 236)->save($save_Path);
                Image::make($image_banner->getRealPath())
                        ->resize($bannerSetting->width, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save($save_Path);
            } else {
                $file_banner = "";
            }

            //dd($request->all());
            $page = new Page();
            $page->menu_item_id = $request->menu_item_id;
            $page->section_id = $request->section_id;
            $page->webmaster_banner_id = $request->webmaster_banner_id;
            $page->title = $request->title;
            $page->page_content = $request->page_content;
            $page->photo_filename = $file_banner;
            $page->page_meta = $request->page_meta;
            $page->page_abstract = $request->page_abstract;
            $page->save();
            
            $notification = array(
                'message' => 'Content data successfull to saved',
                'alert-type' => 'info'
            ); 

            return redirect(route('admin.pages'))->with($notification);
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

    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {

    }

    public function indexCategory(Request $request, $id)
    {
        $save_state = '';
        $title = "Category Lists";
        $category = new Categorys;
        if($request->ajax()){
            $banners = Categorys::select(\DB::raw('categorys.id,categorys.name,admin_menu_items.label,categorys.status'))
                        ->join('webmaster_sections','webmaster_sections.id','=','categorys.webmaster_section_id')
                        ->join('admin_menu_items','admin_menu_items.id','=','webmaster_sections.menu_item_id')
                        ->get();

            if(!empty($banners)){
                return DataTables::of($banners)
                    ->addColumn('gabungan', function ($banners) {
                        $uri_edit = url()->current();
                        return '<div class="media-left">
                                    <div class="media-body">
                                        <a href="#modalForm" data-href="'.$uri_edit.'/'.$banners->id.'/update" data-toggle="modal" class="text-blue-700 text-semibold">'.$banners->name .'</a>
                                    </div>
                                    <div class="text-muted text-size-small"><span class="text-semibold">'.ucfirst(preg_replace('/[A-Z]/', ' $0', $banners->label)).'</span>
                                    </div>
                                </div>';
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

        return view('admin.categorys.index',compact('title','save_state','category'));
    }

    public function storeCategory(Request $request, $page_id)
    {
        if ($request->isMethod('get')){
           
            $setting = WebmasterSection::find($page_id);
            $category = new Categorys;
            $title = 'New Category';
            return view('admin.categorys.form',compact('setting','category','title'));
        }else {
            $rules = [
                'name' => 'required',
            ];

            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
                ]);
            
            $kat = new Categorys();
            $kat->name = $request->name;
            $kat->description = $request->description;
            $kat->icon = $request->icon;
            $kat->webmaster_section_id = $page_id;
            $kat->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/pages/'.$page_id.'/category')
            ]);
        }
    }

    public function updateCategory(Request $request, $page_id, $id)
    {
        if ($request->isMethod('get')){
           
            $setting = WebmasterSection::find($page_id);
            $category = Categorys::find($id);
            $title = 'Edit Category';
            return view('admin.categorys.form',compact('setting','category','title'));
        }else {
            $rules = [
                'name' => 'required',
            ];

            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
                ]);
            
            $kat = Categorys::find($id);
            $kat->name = $request->name;
            $kat->description = $request->description;
            $kat->icon = $request->icon;
            $kat->webmaster_section_id = $page_id;
            $kat->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/pages/'.$page_id.'/category')
            ]);
        }
    }
}
