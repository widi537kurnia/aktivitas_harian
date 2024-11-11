<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function dashboard(){
        $data = Auth::user();

        return view ('dashboard', compact('data'));
    }

    public function index() {

        $data = User::get();

        return view('index', compact('data'));
    }

    public function create(){
        return view('create');
    }

    public function profile(){
        $data = Auth::user();

        return view('auth.profile', compact('data'));
    }
    public function edit_profile(){
        $data = Auth::user();

        return view('auth.edit_profile',compact('data'));
    }

    public function update_profile(Request $request) {
        $validator = Validator::make($request->all(),[
            'photo'         => 'required|mimes:png,jpg,jpeg|max:2048',
            'email'         => 'required|email',
            'name'          => 'required',
            'password'      => 'nullable',
            'bio'           => 'required',
            'about'         => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $photo                  = $request->file('photo');
        $filename               = date('Y-m-d').$photo->getClientOriginalName();
        $path                   = 'photo-user/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($photo));

        $data['email']      = $request->email;
        $data['name']       = $request->name;
        $data['bio']        = $request->bio;
        $data['about']      = $request->about;
        $data['image']      = $filename;

        if($request->password){
            $data['password']  = Hash::make($request->password);

        }
        $id = Auth::id();
        User::whereId($id)->update($data);
        return redirect()->route('admin.profile');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(),[
            'photo' => 'required|mimes:png,jpg,jpeg|max:2048',
            'email' => 'required|email',
            'nama'  => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $photo      = $request->file('photo');
        $filename   = date('Y-m-d').$photo->getClientOriginalName();
        $path       = 'photo-user/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($photo));

        $data['email']     = $request->email;
        $data['name']      = $request->name;
        $data['password']  = Hash::make($request->password);
        $data['image']     = $filename;

        User::create($data);

        return redirect()->route('admin.index');
    }

    public function edit(Request $request,$id){
        $data = User::find($id);

        return view('edit',compact('data'));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'photo'     => 'required|mimes:png,jpg,jpeg|max:2048',
            'email'      => 'required|email',
            'nama'       => 'required',
            'password'   => 'nullable',
        ]);
        $photo                  = $request->file('photo');
        $filename               = date('Y-m-d').$photo->getClientOriginalName();
        $path                   = 'photo-user/'.$filename;

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email']     = $request->email;
        $data['name']      = $request->nama;
        $data['image']     = $filename;


        if($request->password){
            $data['password']  = Hash::make($request->password);

        }
        User::whereId($id)->update($data);
        return redirect()->route('admin.index');
    }

    public function delete(Request $request,$id){
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.index');
    }
}
