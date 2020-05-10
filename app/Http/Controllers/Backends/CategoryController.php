<?php

namespace App\Http\Controllers\Backends;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorys;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        // set the model
    }

    public function index(Request $request, $id)
    {
        $save_state = '';
        $title = "Categori Lists";
        $section = new Categorys;
        if($request->ajax()){
            $banners = Categorys::select(\DB::raw('banners.id,banners.banner_title,banners.banner_description,banners.banner_image,banners.status,webmaster_banners.banner_name'))
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
        $pages = new Section();
        $postMenus = MenuItems::where('link','!=','#')->get();
        return view('admin.pages.index',compact('title','save_state','pages','postMenus'));
    }

    public function store(Request $request)
    {

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
}
