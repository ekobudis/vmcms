<?php

namespace App\Http\Controllers\Backends;

use Mail;
use Hash;
use Image;
use App\Helpers\Helper;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\UserInvitation;
use App\Models\Permission;
use App\Models\Webmaster;
use App\Models\WebmasterBanner;
use App\Models\WebmasterDocument;
use App\Models\WebmasterHour;
use App\Models\WebmasterSection;
use App\Models\WebmasterSocial;
use Harimayco\Menu\Models\MenuItems;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class WebmasterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        // set the model
    }

    public function changeEnv($data = array()){
        if(count($data) > 0){

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);;

            // Loop through given data
            foreach((array)$data as $key => $value){

                // Loop through .env-data
                foreach($env as $env_key => $env_value){

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if($entry[0] == $key){
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);

            return true;
        } else {
            return false;
        }
    }

    public function getMenu(Request $request)
    {
        $title = "Menu Setting";
        $save_state = 'add';
            
        return view('admin.webmasters.menus.index',compact('title','save_state'));
    }

    public function getWebmaster(Request $request)
    {
        if(Webmaster::count()!=0){
            $this->edit(1);
        }else{
            $title = "Site Setting";
            $setting = new Webmaster;
            $save_state = 'add';
            
            return view('admin.webmasters.index',compact('title','setting','save_state'));
        }
    }

    public function edit($id)
    {
        $setting = Webmaster::findOrFail(1);
        $title = "Site Setting";
        $save_state = 'edit';
        return view('admin.webmasters.index',compact('title','setting','save_state'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'website' => 'required|string|min:2',
            'email' => 'required',
        ]);

        try{
            //dd($request->all());
            $webs = new Webmaster();
            $webs->id = 1;
            $webs->name = $request->name;
            $webs->description = $request->description;
            $webs->email = $request->email;
            $webs->website = $request->website;
            $webs->phone_no = $request->phone_no;
            $webs->mobile_no = $request->mobile_no;
            $webs->address = $request->address;
            $webs->city = $request->city;
            $webs->state = $request->state;
            $webs->country = $request->country;
            $webs->postal_code = $request->postal_code;
            $webs->latitude = $request->latitude;
            $webs->longitude = $request->longitude;
            $webs->save();
            
            $notification = array(
                'message' => 'Webmaster data successfull to saved',
                'alert-type' => 'info'
            ); 

            return redirect()->back()->with($notification);
        } catch(\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'website' => 'required|string|min:2',
            'email' => 'required',
        ]);

        try{
            //dd($request->all());
            $webs = Webmaster::find($id);
            $webs->name = $request->name;
            $webs->description = $request->description;
            $webs->email = $request->email;
            $webs->website = $request->website;
            $webs->phone_no = $request->phone_no;
            $webs->mobile_no = $request->mobile_no;
            $webs->address = $request->address;
            $webs->city = $request->city;
            $webs->state = $request->state;
            $webs->country = $request->country;
            $webs->postal_code = $request->postal_code;
            $webs->latitude = $request->latitude;
            $webs->longitude = $request->longitude;
            $webs->save();
            
            $notification = array(
                'message' => 'Webmaster data successfull to update',
                'alert-type' => 'info'
            ); 

            return redirect()->back()->with($notification);
        } catch(\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    
    //Banner
    public function getBanner(Request $request, $webmaster_id)
    {
        if($request->ajax()){
            $bannerSetting = WebmasterBanner::where('webmaster_id',$webmaster_id)->get();
            if(!empty($bannerSetting))
            {
                return DataTables::of($bannerSetting)
                        ->addColumn('gabungan', function ($banners) {
                            $uri_edit = url()->current();
                            return '<a href="#modalForm" data-href="'.$uri_edit.'/'.$banners->id.'" data-toggle="modal" class="text-blue-700 text-semibold">'.$banners->banner_name .'</a>';
                        })
                        ->addColumn('size',function($banners){
                            return '<div class="text-center">
                                        <span class="badge badge-info">'.$banners->width.' x '.$banners->height.'</span>
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
                        ->rawColumns(['gabungan','size','status','action'])
                        ->make(true);
            }
        }
        
    }

    public function storeBanner(Request $request, $webmaster_id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $banners = new WebmasterBanner;
            $title = 'New Banner';
            return view('admin.webmasters.banners.form',compact('setting','banners','title'));
        }else {
            $rules = [
                'banner_name' => 'required',
                'banner_type' => 'required',
                'destination_folder' => 'required',
                'width' => 'required',
                'height' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
                ]);
            
            $rows = WebmasterBanner::all();
            if(!empty($rows)){
                $rowNo = $rows->count() + 1; 
            }else{
                $rowNo = 1;
            }
            $banner = new WebmasterBanner();
            $banner->row_no = $rowNo;
            $banner->banner_name = $request->banner_name;
            $banner->banner_type = $request->banner_type;
            $banner->destination_folder = $request->destination_folder;
            $banner->width = $request->width;
            $banner->height = $request->height;
            $banner->webmaster_id = $webmaster_id;
            $banner->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/settings/'.$webmaster_id)
            ]);
        }
    }

    public function updateBanner(Request $request, $webmaster_id, $id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $banners = WebmasterBanner::find($id);
            $title = 'Edit Banner';
            return view('admin.webmasters.banners.form',compact('setting','banners','title'));
        }else {
            $rules = [
                'banner_name' => 'required',
                'banner_type' => 'required',
                'destination_folder' => 'required',
                'width' => 'required',
                'height' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
                ]);
            
            $banner = WebmasterBanner::find($id);
            $banner->banner_name = $request->banner_name;
            $banner->banner_type = $request->banner_type;
            $banner->destination_folder = $request->destination_folder;
            $banner->width = $request->width;
            $banner->height = $request->height;
            $banner->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/settings/'.$webmaster_id)
            ]);
        }
    }

    //Site Page Setting
    public function getPageSection(Request $request, $webmaster_id)
    {
        
        if($request->ajax()){
            $pageSetting = WebmasterSection::select(\DB::raw('webmaster_sections.id,webmaster_sections.menu_item_id,webmaster_sections.row_no,webmaster_sections.section_description,webmaster_sections.section_type,webmaster_sections.section_category,webmaster_sections.icon_name,admin_menu_items.label'))
                            ->join('admin_menu_items','admin_menu_items.id','=','webmaster_sections.menu_item_id')
                            ->where('webmaster_id',$webmaster_id)
                            ->get();
            if(!empty($pageSetting))
            {
                return DataTables::of($pageSetting)
                        ->addColumn('gabungan', function ($page) {
                            $uri_edit = url()->current();
                            return '<div class="media-left">
                                        <div class="media-body">
                                            <a href="#modalForm" data-href="'.$uri_edit.'/'.$page->id.'" data-toggle="modal" class="text-blue-700 text-semibold">'.$page->menuItem->label .'</a>
                                        </div>
                                        <div class="text-muted text-size-small"><span class="text-semibold">'.$page->section_description.'</span>
                                        </div>
                                    </div>';
                        })
                        ->addColumn('sectionType',function($page){
                            $type = Helper::getSiteSectionType();
                            foreach($type as $x => $tipe){
                                if($page->section_type == $x){
                                    $tipeName = $tipe;
                                }
                            }
                            return '<div class="text-center">
                                        <span class="badge badge-info">'.$tipeName.'</span>
                                    </div>';
                        })
                        ->addColumn('sectionCategory',function($page){
                            $category = Helper::getSiteCategoryType();
                            foreach($category as $y => $cat){
                                if($page->section_type == $y){
                                    $catName = $cat;
                                }
                            }
                            return '<div class="text-center">
                                        <span class="badge badge-info">'.$catName.'</span>
                                    </div>';
                        })
                        ->addColumn('status',function($page){
                            if($page->status == 0){
                                return '<div class="text-center">
                                            <span class="badge badge-info"> Actived </span>
                                        </div>';
                            }else{
                                return '<div class="text-center">
                                            <span class="badge badge-danger"> Suspend </span>
                                        </div>';
                            }
                        })
                        ->addColumn('action', function ($page) {
                            return '<div class="text-center">
                                        <a href="#" onclick="showDeleteData('.$page->id.');" data-id='.$page->id.' data-token="{{csrf_token()}}" data-toggle="tooltip" title="Delete Record"> <i class="fas fa-trash"></i></a>
                                    </div>';
                        })
                        ->rawColumns(['gabungan','sectionType','sectionCategory','status','action'])
                        ->make(true);
            }
        }
        
    }

    public function storePageSection(Request $request, $webmaster_id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $section = new WebmasterSection;
            $title = 'New Page Section';
            return view('admin.webmasters.sections.form-new',compact('setting','section','title'));
        }else {
            $rules = [
                'menu_item_id' => 'required',
                'section_type' => 'required',
                'section_category' => 'required',
            ];

            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
                ]);
            
            $rows = WebmasterSection::all();
            if(!empty($rows)){
                $rowNo = $rows->count() + 1; 
            }else{
                $rowNo = 1;
            }
            $section = new WebmasterSection();
            $section->row_no = $rowNo;
            $section->menu_item_id = $request->menu_item_id;
            $section->section_description = $request->section_description;
            $section->section_type = $request->section_type;
            $section->section_category = $request->section_category;
            $section->icon_name = $request->icon_name;
            $section->webmaster_id = $webmaster_id;
            $section->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/settings/'.$webmaster_id)
            ]);
        }
    }

    public function updatePageSection(Request $request, $webmaster_id, $id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $section = WebmasterSection::find($id);
            $title = 'Edit Page Section';
            return view('admin.webmasters.sections.form-new',compact('setting','section','title'));
        }else {
            $rules = [
                'menu_item_id' => 'required',
                'section_type' => 'required',
                'section_category' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
                ]);
            
            $section = WebmasterSection::find($id);
            $section->menu_item_id = $request->menu_item_id;
            $section->section_description = $request->section_description;
            $section->section_type = $request->section_type;
            $section->section_category = $request->section_category;
            $section->icon_name = $request->icon_name;
            $section->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/settings/'.$webmaster_id)
            ]);
        }
    }

    //Site Work Hour Setting
    public function getWorkHour(Request $request, $webmaster_id)
    {
        if($request->ajax()){
            $workSetting = WebmasterHour::where('webmaster_id',$webmaster_id)->get();
            if(!empty($workSetting))
            {
                return DataTables::of($workSetting)
                        ->addColumn('gabungan', function ($workHour) {
                            $uri_edit = url()->current();
                            return '<div class="media-left">
                                        <div class="media-body">
                                            <a href="#modalForm" data-href="'.$uri_edit.'/'.$workHour->id.'" data-toggle="modal" class="text-blue-700 text-semibold">'.$workHour->hour_name .'</a>
                                        </div>
                                        <div class="text-muted text-size-small"><span class="text-semibold">'.$workHour->hour_desc.'</span>
                                        </div>
                                    </div>';
                        })
                        ->addColumn('status',function($workHour){
                            if($workHour->status == 0){
                                return '<div class="text-center">
                                            <span class="badge badge-info"> Actived </span>
                                        </div>';
                            }else{
                                return '<div class="text-center">
                                            <span class="badge badge-danger"> Suspend </span>
                                        </div>';
                            }
                        })
                        ->addColumn('action', function ($workHour) {
                            return '<div class="text-center">
                                        <a href="#" onclick="showDeleteData('.$workHour->id.');" data-id='.$workHour->id.' data-token="{{csrf_token()}}" data-toggle="tooltip" title="Delete Record"> <i class="fas fa-trash"></i></a>
                                    </div>';
                        })
                        ->rawColumns(['gabungan','status','action'])
                        ->make(true);
            }
        }
        
    }

    public function storeWorkHour(Request $request, $webmaster_id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $workHour = new WebmasterHour;
            $title = 'New Work Hour';
            return view('admin.webmasters.hours.form',compact('setting','workHour','title'));
        }else {
            $rules = [
                'hour_name' => 'required',
                'hour_desc' => 'required',
            ];

            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
                ]);
            
            $workHour = new WebmasterHour();
            $workHour->hour_name = $request->hour_name;
            $workHour->hour_desc = $request->hour_desc;
            $workHour->webmaster_id = $webmaster_id;
            $workHour->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/settings/'.$webmaster_id)
            ]);
        }
    }

    public function updateWorkHour(Request $request, $webmaster_id, $id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $workHour = WebmasterHour::find($id);
            $title = 'Edit Work Hour';
            return view('admin.webmasters.hours.form',compact('setting','workHour','title'));
        }else {
            $rules = [
                'hour_name' => 'required',
                'hour_desc' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
                ]);
            
            $workHour = WebmasterHour::find($id);
            $workHour->hour_name = $request->hour_name;
            $workHour->hour_desc = $request->hour_desc;
            $workHour->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/settings/'.$webmaster_id)
            ]);
        }
    }

    //Site Social Setting
    public function getSocial(Request $request, $webmaster_id)
    {
        if($request->ajax()){
            $sosmedSetting = WebmasterSocial::where('webmaster_id',$webmaster_id)->get();
            if(!empty($sosmedSetting))
            {
                return DataTables::of($sosmedSetting)
                        ->addColumn('gabungan', function ($sosmeds) {
                            $uri_edit = url()->current();
                            return '<div class="media-left">
                                        <div class="media-body">
                                            <a href="#modalForm" data-href="'.$uri_edit.'/'.$sosmeds->id.'" data-toggle="modal" class="text-blue-700 text-semibold">'.$sosmeds->social_name .'</a>
                                        </div>
                                        <div class="text-muted text-size-small"><span class="text-semibold">'.$sosmeds->social_codename.'</span>
                                        </div>
                                    </div>';
                        })
                        ->addColumn('status',function($sosmeds){
                            if($sosmeds->status == 0){
                                return '<div class="text-center">
                                            <span class="badge badge-info"> Actived </span>
                                        </div>';
                            }else{
                                return '<div class="text-center">
                                            <span class="badge badge-danger"> Suspend </span>
                                        </div>';
                            }
                        })
                        ->addColumn('action', function ($sosmeds) {
                            return '<div class="text-center">
                                        <a href="#" onclick="showDeleteData('.$sosmeds->id.');" data-id='.$sosmeds->id.' data-token="{{csrf_token()}}" data-toggle="tooltip" title="Delete Record"> <i class="fas fa-trash"></i></a>
                                    </div>';
                        })
                        ->rawColumns(['gabungan','status','action'])
                        ->make(true);
            }
        }
        
    }

    public function storeSocial(Request $request, $webmaster_id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $social = new WebmasterSocial;
            $title = 'New Social Media Account';
            return view('admin.webmasters.socials.form',compact('setting','social','title'));
        }else {
            $rules = [
                'social_name' => 'required',
                'social_codename' => 'required',
            ];

            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
                ]);
            
            $sosMed = new WebmasterSocial();
            $sosMed->social_name = $request->social_name;
            $sosMed->social_uuid = $request->social_uuid;
            $sosMed->social_codename = $request->social_codename;
            $sosMed->webmaster_id = $webmaster_id;
            $sosMed->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/settings/'.$webmaster_id)
            ]);
        }
    }

    public function updateSocial(Request $request, $webmaster_id, $id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $social = WebmasterSocial::find($id);
            $title = 'Edit Social Media Account';
            return view('admin.webmasters.socials.form',compact('setting','social','title'));
        }else {
            $rules = [
                'social_name' => 'required',
                'social_codename' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
                ]);
            
            $sosMed = WebmasterSocial::find($id);
            $sosMed->social_name = $request->social_name;
            $sosMed->social_uuid = $request->social_uuid;
            $sosMed->social_codename = $request->social_codename;
            $sosMed->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/settings/'.$webmaster_id)
            ]);
        }
    }

    //Site Document Download Setting
    public function getDocument(Request $request, $webmaster_id)
    {
        if($request->ajax()){
            $docSetting = WebmasterDocument::where('webmaster_id',$webmaster_id)->get();
            if(!empty($docSetting))
            {
                return DataTables::of($docSetting)
                        ->addColumn('gabungan', function ($doc) {
                            $uri_edit = url()->current();
                            $docTypes = Helper::getDocumentType();
                            foreach($docTypes as $x => $tipe){
                                if($doc->document_id == $x){
                                    $docName = $tipe;
                                }
                            }
                            return '<div class="media-left">
                                        <div class="media-body">
                                            <a href="#modalForm" data-href="'.$uri_edit.'/'.$doc->id.'" data-toggle="modal" class="text-blue-700 text-semibold">'.$doc->description .'</a>
                                        </div>
                                        <div class="text-muted text-size-small"><span class="text-semibold">'.$docName.'</span>
                                        </div>
                                    </div>';
                        })
                        ->addColumn('status',function($doc){
                            if($doc->status == 0){
                                return '<div class="text-center">
                                            <span class="badge badge-info"> Actived </span>
                                        </div>';
                            }else{
                                return '<div class="text-center">
                                            <span class="badge badge-danger"> Suspend </span>
                                        </div>';
                            }
                        })
                        ->addColumn('action', function ($doc) {
                            return '<div class="text-center">
                                        <a href="#" onclick="showDeleteData('.$doc->id.');" data-id='.$doc->id.' data-token="{{csrf_token()}}" data-toggle="tooltip" title="Delete Record"> <i class="fas fa-trash"></i></a>
                                    </div>';
                        })
                        ->rawColumns(['gabungan','status','action'])
                        ->make(true);
            }
        }
        
    }

    public function storeDocument(Request $request, $webmaster_id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $document = new WebmasterDocument;
            $title = 'New Social Media Account';
            return view('admin.webmasters.documents.form',compact('setting','document','title'));
        }else {
            $rules = [
                'document_id' => 'required',
                'description' => 'required',
                'document_filename'  => 'required|mimes:pdf|max:10240',
            ];

            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
                ]);
            
            $file_name = $request->file('document_filename')->getClientOriginalName();
        
            if( $request->file('document_filename') ){
                $files = $request->file('document_filename');
                $destinationPath = base_path().'/public/documents/'; 
                $docName = str_replace(" ","",$request->description);
                $profilefile = lcfirst($docName) . date('YmdHis'). "." . $files->getClientOriginalExtension();
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $files->move($destinationPath, $profilefile);

            }else{
                $profilefile = "";
            }

            $doc = new WebmasterDocument();
            $doc->document_id = $request->document_id;
            $doc->description = $request->description;
            $doc->document_filename = $profilefile;
            $doc->webmaster_id = $webmaster_id;
            $doc->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/settings/'.$webmaster_id)
            ]);
        }
    }

    public function updateDocument(Request $request, $webmaster_id, $id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $document = WebmasterDocument::find($id);
            $title = 'Edit Social Media Account';
            return view('admin.webmasters.documents.form',compact('setting','document','title'));
        }else {
            $rules = [
                'document_id' => 'required',
                'description' => 'required',
                'document_filename'  => 'required|mimes:pdf|max:10240',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
                ]);

            $docs = WebmasterDocument::findOrFail($id);
    
            if( $request->file('document_filename') ){
                $files = $request->file('document_filename');
                $destinationPath = base_path().'/public/documents/';
                $docName = str_replace(" ","",$request->description);
                $profilefile = lcfirst($docName) . date('YmdHis'). "." . $files->getClientOriginalExtension();
                
                if ($docs->document_filename != "") {
                    File::delete(public_path('documents/' . $docs->document_filename));
                }

                $files->move($destinationPath, $profilefile);
            }else{
                $profilefile = "";
            }
            
            $doc = WebmasterDocument::find($id);
            $doc->document_id = $request->document_id;
            $doc->description = $request->description;
            $doc->document_filename = $profilefile;
            $doc->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/settings/'.$webmaster_id)
            ]);
        }
    }

    //User Setting
    public function getUser(Request $request)
    {
        $title = "User & Permission";
        $users = new User;
        $setting = Webmaster::find(1);
        
        if($request->ajax()){
            $users = User::with('akses')->get();
            return DataTables::of($users)
                    ->addColumn('gabungan', function ($user) {
                        $uri_edit = url()->current();
                        return '<div class="media-left">
                                    <div class="media-body">
                                        <a href="#modalForm" data-href="'.$uri_edit.'/'.$user->id.'" data-toggle="modal" class="text-blue-700 text-semibold">'.$user->name .' - '.$user->email.'</a>
                                    </div>
                                    <div class="text-muted text-size-small"><span class="text-semibold">'.$user->akses->name.'</span>
                                    </div>
                                </div>';
                    })
                    ->addColumn('menuAccess',function($user){
                        $pageAccess = MenuItems::select('label')->whereIn('id',[$user->akses->data])->get(); //->map(function($item) {
                            /*return array_values((array)$item);
                        });*/
                        $add = $user->akses->add == 1 ? '<i class="fas fa-check-circle"></i> Add &nbsp;' : '';
                        $edit = $user->akses->edit == 1 ? '<i class="fas fa-check-circle"></i> Edit &nbsp;' : '';
                        $del = $user->akses->delete == 1 ? '<i class="fas fa-check-circle"></i> Delete &nbsp;' : '';

                        $banner = $user->akses->banner_status == 1 ? 'Ad. Banners ,&nbsp;' : '';
                        $userPerm = $user->akses->setting_status == 1 ? 'User ,&nbsp;' : '';
                        $webmaster = $user->akses->webmaster_status == 1 ? 'Webmaster &nbsp;' : '';
                        
                        return '<small>'.$add.''.$edit.''.$del.'<br>'.$banner.''.$userPerm.''.$webmaster.'<br></small>';             
                    })
                    ->addColumn('status',function($user){
                        if($user->status == 0){
                            return '<div class="text-center">
                                        <span class="badge badge-info"> Actived </span>
                                    </div>';
                        }else{
                            return '<div class="text-center">
                                        <span class="badge badge-danger"> Suspend </span>
                                    </div>';
                        }
                    })
                    ->addColumn('action', function ($user) {
                        return '<div class="text-center">
                                    <a href="#" onclick="showDeleteData('.$user->id.');" data-id='.$user->id.' data-token="{{csrf_token()}}" data-toggle="tooltip" title="Delete Record"> <i class="fas fa-trash"></i></a>
                                </div>';
                    })
                    ->rawColumns(['gabungan','menuAccess','status','action'])
                    ->make(true);
        }
        $save_state = '';

        //dd($title);
        return view('admin.webmasters.users.index',compact('title','users','save_state','setting'));
    }

    public function storeUser(Request $request, $webmaster_id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $user = new User;
            $title = 'New User';
            return view('admin.webmasters.users.form',compact('setting','user','title'));
        }else {
            $rules = [
                'username' => 'required',
                'email'  => 'required', 'string', 'email', 'max:40', 'unique:users',
            ];

            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
                ]);
            
            do {
                //generate a random string using Laravel's str_random helper
                $token = str_random();
            } //check if the token already exists and if it does, try again
            while (User::where('remember_token', $token)->first());
            
            $strPassword = str_random(8);
            $usr = new User();
            $usr->name = $request->name;
            $usr->username = $request->username;
            $usr->email = $request->email;
            $usr->password = $strPassword;
            $usr->remember_token = $token;
            $usr->permission_id = $request->permission_id;
            $usr->save();
            
            $mailSubject = 'Invitation to join with '. auth()->user()->name;
            //$uri_app = 'https://doper.tonscoindo.com/';
            $uri_app = env('APP_URL');

            $details = [
                'url_invitation' => $uri_app.'/'.'invitation/'.$token,
                'usr_password' => $strPassword,
                'user' => auth()->user()->name,
            ];

            //Send Mail Invitation
            Mail::to($request->email)->send(new UserInvitation($details, $mailSubject));
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/settings/user')
            ]);
        }
    }

    public function updateUser(Request $request, $webmaster_id, $id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $user = new User;
            $title = 'Edit User';
            return view('admin.webmasters.users.form',compact('setting','user','title'));
        }else {
            $rules = [
                'username' => 'required',
                'email'  => 'unique',
            ];

            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
                ]);

            $permiss = User::find($id);
            $permiss->name = $request->name;
            $permiss->username = $request->username;
            $permiss->email = $request->email;
            $permiss->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/settings/user')
            ]);
        }
    }

    public function destroyUser($id)
    {

    }

    public function storePermission(Request $request, $webmaster_id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $permission = new Permission;
            $pageAccess = MenuItems::where('link','!=','#')->get();
            $title = 'New Permission';
            return view('admin.webmasters.users.permission',compact('setting','permission','title','pageAccess'));
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
            
            if($request->banner_status == 'on'){
                $banner_status = 1;
            }else{
                $banner_status = 0;
            }
    
            if($request->setting_status == 'on'){
                $setting_status = 1;
            }else{
                $setting_status = 0;
            }
    
            if($request->webmaster_status == 'on'){
                $webmaster_status = 1;
            }else{
                $webmaster_status = 0;
            }
    
            $data_sections_values = "";
            if ($request->data != "") {
                foreach ($request->data as $key => $val) {
                    $data_sections_values = $val . "," . $data_sections_values;
                }
                $data_sections_values = substr($data_sections_values, 0, -1);
            }
        
            $permiss = new Permission();
            $permiss->name = $request->name;
            $permiss->add = $request->add;
            $permiss->edit = $request->edit;
            $permiss->delete = $request->delete;
            $permiss->banner_status = $banner_status;
            $permiss->setting_status = $setting_status;
            $permiss->webmaster_status = $webmaster_status;
            $permiss->data = $data_sections_values;
            $permiss->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/settings/user')
            ]);
        }
    }

    public function updatePermission(Request $request, $webmaster_id, $id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $permission = Permission::find($id);
            $pageAccess = MenuItems::where('link','!=','#')->get();
            $title = 'Edit Permission';
            return view('admin.webmasters.users.permission',compact('setting','permission','title','pageAccess'));
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
            
            if($request->banner_status == 'on'){
                $banner_status = 1;
            }else{
                $banner_status = 0;
            }
    
            if($request->setting_status == 'on'){
                $setting_status = 1;
            }else{
                $setting_status = 0;
            }
    
            if($request->webmaster_status == 'on'){
                $webmaster_status = 1;
            }else{
                $webmaster_status = 0;
            }
    
            $data_sections_values = "";
            if ($request->data != "") {
                foreach ($request->data as $key => $val) {
                    $data_sections_values = $val . "," . $data_sections_values;
                }
                $data_sections_values = substr($data_sections_values, 0, -1);
            }
        
            $permiss = Permission::find($id);
            $permiss->name = $request->name;
            $permiss->add = $request->add;
            $permiss->edit = $request->edit;
            $permiss->delete = $request->delete;
            $permiss->banner_status = $banner_status;
            $permiss->setting_status = $setting_status;
            $permiss->webmaster_status = $webmaster_status;
            $permiss->data = $data_sections_values;
            $permiss->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/settings/user')
            ]);
        }
    }

    public function destroyPermission($id)
    {

    }
}
