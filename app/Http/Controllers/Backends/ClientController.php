<?php

namespace App\Http\Controllers\Backends;

use File;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Webmaster;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        // set the model
    }

    public function index(Request $request)
    {
        $save_state = '';
        $title = "Client Lists";
        $setting = Webmaster::find(1);
        $banner = new Client;
        if($request->ajax()){
            $clients = Client::select(\DB::raw('clients.id,clients.name,clients.address,clients.phone_no,clients.city,clients.website,clients.logo'))
                        ->get();

            if(!empty($clients)){
                return DataTables::of($clients)
                    ->addColumn('gabungan', function ($client) {
                        $uri_edit = url()->current();
                        $sett = Webmaster::find(1);
                        return '<div class="media-left">
                                    <div class="media-body">
                                        <a href="#modalForm" data-href="'.$uri_edit.'/'.$sett->id.'/client/'.$client->id.'/update" data-toggle="modal" class="text-blue-700 text-semibold">'.$client->name .'</a>
                                    </div>
                                    <div class="text-muted text-size-small"><span class="text-semibold">'.ucfirst(preg_replace('/[A-Z]/', ' $0', $client->address)).'</span>
                                    </div>
                                </div>';
                    })
                    ->addColumn('preview',function($client){
                        if($client->logo != ''){
                            $imgView = asset('images/clients/'.$client->logo);
                            return '<div class="text-center">
                                        <img src="'.$imgView.'" width="130px" height="85px">
                                    </div>';
                        }else{
                            return '<div class="text-center">
                                        
                                    </div>';
                        }
                    })
                    ->addColumn('status',function($client){
                        if($client->status == 0){
                            return '<div class="text-center">
                                        <span class="badge badge-info"> Actived </span>
                                    </div>';
                        }else{
                            return '<div class="text-center">
                                        <span class="badge badge-danger"> Suspend </span>
                                    </div>';
                        }
                    })
                    ->addColumn('action', function ($client) {
                        return '<div class="text-center">
                                    <a href="#" onclick="showDeleteData('.$client->id.');" data-id='.$client->id.' data-token="{{csrf_token()}}" data-toggle="tooltip" title="Delete Record"> <i class="fas fa-trash"></i></a>
                                </div>';
                    })
                    ->rawColumns(['gabungan','preview','status','action'])
                    ->make(true);
            }
        }

        return view('admin.clients.index',compact('title','save_state','banner','setting'));
    }

    public function storeClient(Request $request, $webmaster_id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $client = new Client;
            $title = 'New Client';
            return view('admin.clients.form',compact('setting','client','title'));
        }else {
            $rules = [
                'name' => 'required',
                'address' => 'required',
                'phone_no' => 'required|string|min:2',
                'image_upload' => 'required|mimes:png|max:5120',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                    ]);

            if ($request->file('image_upload')) {
                $image_logo = $request->file('image_upload');
    
                $file_logo = time(). rand(1111, 9999) . '.' .$image_logo->getClientOriginalExtension();
    
                $save_Path = public_path('images/clients/'.$file_logo);
    
                //Image::make($image->getRealPath())->resize(300, 236)->save($save_Path);
                Image::make($image_logo->getRealPath())
                        ->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save($save_Path);
            } else {
                $file_logo = "";
            }

            do {
                //generate a random string using Laravel's str_random helper
                $token = str_random();
            } //check if the token already exists and if it does, try again
            while (Client::where('remember_token', $token)->first());
            
            $strPassword = str_random(8);

            $client = new Client();
            $client->name = $request->name;
            $client->address = $request->address;
            $client->email = $request->email;
            $client->phone_no = $request->phone_no;
            $client->city = $request->city;
            $client->website = $request->website;
            $client->logo = $file_logo;
            $client->password = $strPassword;
            $client->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/clients/')
            ]);
        }
    }

    public function updateClient(Request $request, $webmaster_id, $id)
    {
        if ($request->isMethod('get')){
           
            $setting = Webmaster::find($webmaster_id);
            $client = Client::find($id);
            $title = 'Edit Client';
            return view('admin.clients.form',compact('setting','client','title'));
        }else {
            $rules = [
                'name' => 'required',
                'address' => 'required',
                'phone_no' => 'required|string|min:2',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                    ]);

            $client = Client::find($id);
            $client->name = $request->name;
            $client->address = $request->address;
            $client->email = $request->email;
            $client->phone_no = $request->phone_no;
            $client->city = $request->city;
            $client->website = $request->website;
            if ($request->file('image_upload')) {
                $image_logo = $request->file('image_upload');
    
                $file_logo = time(). rand(1111, 9999) . '.' .$image_logo->getClientOriginalExtension();
    
                $save_Path = public_path('images/clients/'.$file_logo);
    
                //Image::make($image->getRealPath())->resize(300, 236)->save($save_Path);
                Image::make($image_logo->getRealPath())
                        ->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save($save_Path);
                $client->logo = $file_logo;
            } else {
                $file_logo = "";
            }

            $client->save();
            
            return response()->json([
                'fail' => false,
                'redirect_url' => url('admin/clients')
            ]);
        }
    }

    public function delete($id)
    {
        try{
            $banner = Client::find($id);
            $banner->delete();

            $notification = array(
                'message' => 'Client successfull to delete',
                'alert-type' => 'warning'
            ); 

            return redirect(route('admin.clients'))->with($notification);
            

        } catch(\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
