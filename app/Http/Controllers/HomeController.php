<?php

namespace App\Http\Controllers;

use App\Models\anak_magang;
use App\Models\Sekolah;
use App\Models\Sekolahs;
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

    public function jumlah_sekolah() {

        $data = User::get();

        return view('admin.jumlah_sekolah', compact('data'));
    }
    public function jumlah_anak_magang(){
        return view ('admin.jumlah_anak_magang');
    }
    public function jumlah_admin(){
        return view ('admin.jumlah_admin');
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
            'photo'    => 'required|mimes:png,jpg,jpeg|max:2048',
            'email'    => 'required|email',
            'nama'     => 'required',
          
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
            'photo'      => 'required|mimes:png,jpg,jpeg|max:2048',
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
        $data['image']     =  null;//$filename;

        $data['image']     = $filename;



        if($request->password){
            $data['password']  = Hash::make($request->password);

        };

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

    public function store_sekolah(Request $request) {

        $validator = Validator::make($request->all(),[
            'sekolah'          => 'required|string',
            'jumlah_anak'      => 'required|int',
            'divisi'           => 'required',

        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['sekolah']           = $request->sekolah;
        $data['jumlah_anak']       = $request->jumlah_anak;
        $data['divisi']            = $request->divisi;

        //if ($request->password) {
        //    $data['password'] = Hash::make($request->password);
        //} else {
            // Berikan nilai default atau abaikan pengubahan password jika tidak diinput
        //    $user = Sekolah::find(Auth::id());
        //    $data['password'] = $user->password;  // Gunakan password lama
        //}

        Sekolah::create($data);

        return redirect()->route('admin.jumlah_sekolah');
    }

    public function store_anak_magang(Request $request) {

        $validator = Validator::make($request->all(),[
            'nama_anak_magang' => 'required|string|max:255',
            'nama_sekolah'     => 'required|string|max:255',
            'divisi'           => 'required|string|max:255',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nama_anak_magang']           = $request->nama_anak_magang;
        $data['nama_sekolah']               = $request->nama_sekolah;
        $data['divisi']                     = $request->divisi;

        anak_magang::create($data);

        return redirect()->route('admin.create_anak_magang')->with('success', 'Data anak magang berhasil ditambahkan.');
    }
}
