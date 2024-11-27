<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aktivitas;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function dashboard_admin(){
        $roles = Role::withCount('users')->get();

        return view ('admin.dashboard_admin', compact('roles'));
    }


    // ADMIN - ADMIN - ADMIN - ADMIN - ADMIN
    public function jumlah_admin(){

        $data = User::where('role', 'admin')->get();
        return view('admin.jumlah_admin', compact('data'));
        $data = User::get();

        return view ('admin.jumlah_admin', compact('data'));
    }

    public function create_admin() {

        $data = User::get();

        return view('admin.add.create_admin', compact('data'));
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
    return redirect()->route('writer.tambah-aktivitas')->with('success', 'Data aktivitas berhasil ditambahkan.');
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

    // ANAK MAGANG - ANAK MAGANG - ANAK MAGANG - ANAK MAGANG - ANAK MAGANG
    public function create_anak_magang() {

        $data = User::get();

        return view('admin.add.create_anak_magang', compact('data'));
    }

    public function jumlah_anak_magang(){
        $data = User::where('role', 'anak_magang')->get();
        return view ('admin.jumlah_anak_magang', compact('data'));
    }

    public function store_anak_magang(Request $request)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'sekolah'     => 'required|string|max:255',
        'anak_magang' => 'required',
        'divisi'      => 'required',
        'password'    => 'nullable|string|min:8',
    ]);

    // Jika validasi gagal, kembalikan dengan pesan error
    if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator);
    }

    // Siapkan data untuk disimpan
    $data = [
        'name'        => $request->anak_magang,  // Memberikan nilai default
        'sekolah'     => $request->sekolah,
        'email'       => $request->anak_magang . '@gmail.com',  // Anda bisa sesuaikan emailnya
        'divisi'      => $request->divisi,
        'role'        => 'anak_magang',
        'password'    => $request->password
            ? Hash::make($request->password)
            : bcrypt('default_password'),  // Jika tidak ada password, gunakan default
    ];

    // Simpan data ke tabel 'users'
    User::create($data);

    // Redirect ke halaman jumlah anak magang dengan pesan sukses
    return redirect()->route('admin.jumlah_anak_magang')->with('success', 'Data anak magang berhasil ditambahkan.');
}


    // SEKOLAH - SEKOLAH - SEKOLAH - SEKOLAH - SEKOLAH
    public function jumlah_sekolah(){
        $data = User::where('role', 'sekolah')->get();
        return view ('admin.jumlah_sekolah', compact('data'));
    }

    public function create_sekolah() {

        $data =  User::select('sekolah', 'divisi', 'jumlah_anak')->get();
        return view('admin.add.create_sekolah', compact('data'));
    }

    public function store_sekolah(Request $request)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'sekolah'     => 'required|string|max:255',
        'jumlah_anak' => 'required|integer',
        'divisi'      => 'required|string|max:255',
        'password'    => 'nullable|string|min:8',
    ]);

    // Jika validasi gagal, kembalikan dengan pesan error
    if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator);
    }

    // Siapkan data untuk disimpan
    $data = [
        'name'        => $request->sekolah, // Kolom 'name' diisi dengan nama sekolah
        'sekolah'     => $request->sekolah,
        'email'       => $request->sekolah . '@example.com',
        'jumlah_anak' => $request->jumlah_anak,
        'divisi'      => $request->divisi,
        'role'        => 'sekolah',
        'password'    => $request->password
            ? Hash::make($request->password)
            : bcrypt('default_password'), // Jika tidak ada password, gunakan default
    ];

    // Simpan data ke tabel 'users'
    User::create($data);

    // Redirect ke halaman jumlah sekolah dengan pesan sukses
    return redirect()->route('admin.jumlah_sekolah')->with('success', 'Data sekolah berhasil ditambahkan.');
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
            'photo'         => 'nullable|mimes:png,jpg,jpeg|max:2048',  // Foto tidak wajib
            'email'         => 'required|email',
            'name'          => 'required',
            'password'      => 'nullable',
            'bio'           => 'required',
            'about'         => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // Simpan data selain foto
        $data['email']  = $request->email;
        $data['name']   = $request->name;
        $data['bio']    = $request->bio;
        $data['about']  = $request->about;

        // Periksa apakah ada foto baru
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $photo = $request->file('photo');
            $filename = date('Y-m-d') . $photo->getClientOriginalName();
            $path = 'photo-user/' . $filename;

            // Simpan foto baru
            Storage::disk('public')->put($path, file_get_contents($photo));

            // Update data foto
            $data['image'] = $filename;
        } else {
            // Jika tidak ada foto baru, gunakan foto lama
            $user = User::find(Auth::id());
            $data['image'] = $user->image;  // Menyimpan foto lama
        }

        // Periksa apakah password diubah
        if($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        // Update data pengguna
        $id = Auth::id();
        User::whereId($id)->update($data);

        return redirect()->route('writer.profile');
    }


    public function sekolah(Request $request) { //name functionnya di ganti sekolah karna untuk membedakan

        $validator = Validator::make($request->all(),[
            'photo'     => 'required|mimes:png,jpg,jpeg|max:2048',
            'email'     => 'required|email',
            'nama'      => 'required',
            'password'  => 'required',

        ]);
    }

    public function ubah_admin(Request $request, $id){
        $data = User::find($id);

        return view('admin.add.edit_admin', compact('data'));
    }

    public function edit_admin(Request $request, $id) {

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

        User::whereId($id)->update($data);
        return redirect()->route('admin.jumlah_admin');
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

    public function delete_admin(Request $request,$id){
        $data = User::find($id);

        if($data){
            $data->delete();
        }
        return redirect()->route('admin.jumlah_admin');
    }

}

