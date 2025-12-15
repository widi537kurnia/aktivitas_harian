<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class WriterController extends Controller
{
    public function dashboard_user(){
        $data = Aktivitas::get();
        return view('writer.dashboard_user', compact('data'));
    }

    public function tambah_data_aktivitas() {
        $data = User::get();
        return view('writer.index', compact('data'));
    }

    public function edit_user(Request $request, $id) {
        // Ambil data aktivitas berdasarkan ID
        $data = Aktivitas::findOrFail($id);  // Gantilah dengan findOrFail untuk menghindari kesalahan jika ID tidak ada
        return view('writer.edit_user', compact('data'));
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
    return redirect()->route('writer.tambah-aktivitas')->with('success', 'Data aktivitas berhasil diganti.');
    }

    public function delete_data(Request $request,$id)
    {
        $data = Aktivitas::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect()->route('writer.dashboard_user');
    }
}
    // Redirect ke halaman dashboard_user dengan pesan sukses
