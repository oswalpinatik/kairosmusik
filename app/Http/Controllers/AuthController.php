<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        return view('backend.login');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function daftar(){
        return view('backend.daftar');
    }

    public function daftar_user(Request $request){
        
        $validate = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|min:5',
            'phone' => 'required|',
            'password' => 'required',
            'images' => 'required|mimes:jpg,png,jpeg,jfif',
            'alamat' => 'required',
            'musik' => 'required',
            'layani' => 'required',

        ]);

        $data = new User;

        $filename = '';
        $filename   = time(). '.' . request()->images->getClientOriginalExtension();
        request()->images->move(public_path('images'), $filename);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->password = $request->password;
        $data->images = $filename;
        $data->alamat = $request->alamat;
        $data->musik = $request->musik;
        $data->layani = $request->layani;

        $data->save();
        // if (User::create($data)) {
            return redirect()->route('login')->with('register_success', 'Anda Berhasil mendaftar Silahkan menunggu persetujuan Admin untuk login');
        // }
        // return redirect()->route('daftar')->with('register_failed', 'Pendaftaran Akun Gagal !!!');
       
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status != 'active' ) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')->with('failed', 'Akun anda belum aktif silahkan menghubungi Admin');
            }

            $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }
            if (Auth::user()->role_id == 2 ) {
                return redirect('profile');
            }
        }

        return redirect()->route('login')->with('invalid_login', 'username atau password salah');
    }
}
