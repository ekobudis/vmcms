<?php

namespace App\Http\Controllers\Backends;

use File;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Webmaster;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CareerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        // set the model
    }

    public function index(Request $request)
    {
        $save_state = '';
        $title = "Career Lists";
        $setting = Webmaster::find(1);
        $banner = new Career;
        if($request->ajax()){
            $careers = Career::select(\DB::raw('id,position,job_desc,status'))
                        ->get();

            if(!empty($careers)){
                return DataTables::of($careers)
                    ->addColumn('gabungan', function ($openRec) {
                        $uri_edit = url()->current();
                        $sett = Webmaster::find(1);
                        return '<div class="media-left">
                                    <div class="media-body">
                                        <a href="#modalForm" data-href="'.$uri_edit.'/'.$sett->id.'/recruitments/'.$openRec->id.'/update" data-toggle="modal" class="text-blue-700 text-semibold">'.$openRec->position .'</a>
                                    </div>
                                </div>';
                    })
                    ->addColumn('postDate',function($openRec){
                        return Carbon::parse($openRec->created_at)->format('d M y');
                    })
                    ->addColumn('status',function($openRec){
                        if($openRec->status == 0){
                            return '<div class="text-center">
                                        <span class="badge badge-info"> Open </span>
                                    </div>';
                        }else{
                            return '<div class="text-center">
                                        <span class="badge badge-danger"> Closed </span>
                                    </div>';
                        }
                    })
                    ->addColumn('action', function ($openRec) {
                        return '<div class="text-center">
                                    <a href="#" onclick="showDeleteData('.$openRec->id.');" data-id='.$openRec->id.' data-token="{{csrf_token()}}" data-toggle="tooltip" title="Delete Record"> <i class="fas fa-trash"></i></a>
                                </div>';
                    })
                    ->rawColumns(['gabungan','postDate','status','action'])
                    ->make(true);
            }
        }

        return view('admin.careers.index',compact('title','save_state','banner','setting'));
    }

    public function storeClient(Request $request, $webmaster_id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $career = new Career;
            $title = 'New Open Recruitment';
            return view('admin.careers.form',compact('setting','career','title'));
        }else {
            $rules = [
                'position' => 'required',
                'job_desc' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                    ]);

            $client = new Career();
            $client->position = $request->position;
            $client->job_desc = $request->job_desc;
            $client->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/careers/')
            ]);
        }
    }

    public function updateClient(Request $request, $webmaster_id, $id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $career = Career::find($id);
            $title = 'Edit Open Recruitment';
            return view('admin.careers.form',compact('setting','career','title'));
        }else {
            $rules = [
                'position' => 'required',
                'job_desc' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                    ]);

            $client = Career::find($id);
            $client->position = $request->position;
            $client->job_desc = $request->job_desc;
            $client->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/careers')
            ]);
        }
    }

    public function delete($id)
    {
        try{
            $banner = Career::find($id);
            $banner->delete();

            $notification = array(
                'message' => 'Career successfull to delete',
                'alert-type' => 'warning'
            ); 

            return redirect(route('admin.careers'))->with($notification);
            

        } catch(\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
