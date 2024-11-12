<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //

    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request){
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ]);

        // Cek apakah ada pengguna yang cocok
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Cek role user setelah login
            $user = Auth::user();

            // Redirect berdasarkan role user
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard_admin');
            } else if ($user->role == 'writer') {
                return redirect()->route('writer.dashboard_user');
            }
        }


        // Jika gagal login
        return redirect()->route('login')->with('failed', 'Email atau Password Salah');

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil logout!');
    }

    public function register(){
        return view('auth.register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'nama'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6',
            'role'      => 'required|in:admin,writer',
        ]);

        $data['name']     = $request->nama;
        $data['email']    = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role']     = $request->role;

        User::create($data);

        $login = [
            'email'    =>$request->email,
            'password' =>$request->password,
        ];

        if(Auth::attempt($login)){
            return redirect()->route('login');
        }else{
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }


}
