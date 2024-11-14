<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
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
        return view('admin.index');
    }

    public function aktivitas(Request $request)
{
    // Validasi data input
    $validator = Validator::make($request->all(), [
        'tanggal'       => 'required|date',
        'shift'         => 'required',
        'mulai_kerja'   => 'required',
        'selesai_kerja' => 'required',
        'aktivitas'     => 'required|string',
        'photo'         => 'required|mimes:png,jpg,jpeg|max:2048'
    ]);

    // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
    if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator);

    }

    // Simpan foto ke storage
    $photo = $request->file('photo');
    $filename = date('Y-m-d') . $photo->getClientOriginalName();
    $path = 'photo-user/' . $filename;
    Storage::disk('public')->put($path, file_get_contents($photo));

    // Siapkan data untuk disimpan di database
    $data['tanggal']        = $request->tanggal; // perbaikan di sini
    $data['shift']          = $request->shift;
    $data['mulai_kerja']    = $request->mulai_kerja;
    $data['selesai_kerja']  = $request->selesai_kerja;
    $data['aktivitas']      = $request->aktivitas;
    $data['photo']          = $filename;

    // Simpan data ke tabel Aktivitas
    Aktivitas::create($data);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('admin.tambah-aktivitas')->with('success', 'Data aktivitas berhasil ditambahkan.');
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
        return redirect()->route('writer.profile');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(),[
            'photo'    => 'required|mimes:png,jpg,jpeg|max:2048',
            'email'    => 'required|email',
            'nama'     => 'required',

    public function sekolah(Request $request) { //name functionnya di ganti sekolah karna untuk membedakan

        $validator = Validator::make($request->all(),[
            'photo'     => 'required|mimes:png,jpg,jpeg|max:2048',
            'email'     => 'required|email',
            'nama'      => 'required',
            'password'  => 'required',

        ]);
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
}
