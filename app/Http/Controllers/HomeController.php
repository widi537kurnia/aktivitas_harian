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

    // function admin
    public function dashboard_admin(){
        return view ('admin.dashboard_admin');
    }

    public function main_admin(){
        return view ('admin.main_admin');
    }

    public function jumlah_sekolah(){
        return view ('admin.jumlah_sekolah');
    }
    public function jumlah_anak_magang(){
        return view ('admin.jumlah_anak_magang');
    }
    public function jumlah_admin(){

        $data = User::get();

        return view('admin.jumlah_admin', compact('data'));
    }

    public function create_sekolah() {

        $data = User::get();

        return view('admin.add.create_sekolah', compact('data'));
    }
    public function create_anak_magang() {

        $data = User::get();

        return view('admin.add.create_anak_magang', compact('data'));
    }
    public function create_admin() {

        $data = User::get();

        return view('admin.add.create_admin', compact('data'));
    }

    public function store_admin(Request $request) {

        $validator = Validator::make($request->all(),[
            'email'    => 'required|email',
            'name'     => 'required',
            'divisi'   => 'required',
            'password' => 'nullable',

        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email']     = $request->email;
        $data['name']      = $request->name;
        $data['divisi']    = $request->divisi;

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        } else {
            // Berikan nilai default atau abaikan pengubahan password jika tidak diinput
            $user = User::find(Auth::id());
            $data['password'] = $user->password;  // Gunakan password lama
        }

        User::create($data);

        return redirect()->route('admin.jumlah_admin');
    }




    public function index() {

        $data = User::get();

        return view('admin.index', compact('data'));
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

    public function store(Request $request) {

        $validator = Validator::make($request->all(),[
            'photo'    => 'required|mimes:png,jpg,jpeg|max:2048',
            'email'    => 'required|email',
            'nama'     => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $photo      = $request->file('photo');
        $filename   = date('Y-m-d').$photo->getClientOriginalName();
        $path       = 'photo-user/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($photo));

        $data['email']     = $request->email;
        $data['name']      = $request->nama;
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

    public function update_user(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'email'      => 'required|email',
            'nama'       => 'required',
            'password'   => 'nullable',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email']     = $request->email;
        $data['name']      = $request->nama;

        if($request->password){
            $data['password']  = Hash::make($request->password);

        }

        User::whereId($id)->update($data);

        return redirect()->route('writer.dashboard_user');
    }

    public function delete_user(Request $request,$id){
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('writer.dashboard_user');
    }
    
}

