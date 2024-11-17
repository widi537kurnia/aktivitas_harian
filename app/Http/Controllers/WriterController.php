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

    public function hapus_data(){
        $data = Aktivitas::get();

        if ($data) {
            $data->delete();
        }
        return redirect()->route('writer.dashboard_user');
    }
}
