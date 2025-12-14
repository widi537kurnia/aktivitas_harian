<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WriterController extends Controller
{

    public function dashboard_user(){
        $data = Aktivitas::get();

        return view('writer.dashboard_user', compact('data'));
    }

    public function delete_data(Request $request,$id){
        $data = Aktivitas::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect()->route('writer.dashboard_user');
    }
    public function cari_aktivitas(Request $request)
    {
        $search = $request->input('search');

        $data = Aktivitas::where('shift', 'like', "%$search%")
            ->orWhere('aktivitas', 'like', "%$search%")
            ->paginate(10);

        return view('writer.dashboard_user', compact('data'));
    }

    public function index() {
        return view('writer.index');
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

    public function store_edit_user(Request $request, $id)
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
        Aktivitas::whereId($id)->update($data);
    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('writer.tambah-aktivitas')->with('success', 'Data aktivitas berhasil di-edit.');
    }

    public function edit_user(Request $request, $id){
        $data = Aktivitas::find($id);

        return view('writer.edit', compact('data'));
    }

}
