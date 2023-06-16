<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lagu;
use App\Models\Role;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Polyfill\Intl\Idn\Idn;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $user_count = User::count();
        $lagu_count = Lagu::count();
        $category_count   = Category::count();
        $user       = User::all();
        return view('backend.dashboard', ['user_count'=>$user_count, 'lagu_count'=>$lagu_count, 'category_count'=>$category_count, 'user'=>$user]);
    }

    public function users()
    {
        $user = User::all();
        return view('backend.users', ['user'=> $user]);
    }

    public function users_edit($id)
    {
        $user      = User::where('id', $id)->first();
        return view('backend.users-edit', ['user' => $user]);
    }

    public function user_update(Request $request, User $user)
    {

        $validate = $request->validate([
            'name' => 'required|max:255',
            'email' => '',
            'phone' => 'required',
            'password' => 'required',
            'images' => 'required|mimes:jpg,png,jpeg,jfif',
            'alamat' => 'required',
            'musik' => 'required',
            'layani' => 'required',
            'status' => 'required'
        ]);

        $data = new User;

        $filename = '';
        $filename = $request->hidden_product_images;

        if ($request->images != '') {
            $filename   = time(). '.' .request()->images->getClientOriginalExtension();
            request()->images->move(public_path('images'), $filename);
            Storage::delete('public/images'.$user->images);
        }

        $data = User::find($request->hidden_id);
        

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->password = $request->password;
        $data->images = $filename;
        $data->alamat = $request->alamat;
        $data->musik = $request->musik;
        $data->layani = $request->layani;
        $data->status = $request->status;

        if ($data->save()) {
            return redirect()->route('users')->with('user_update', 'Data berhasil di update');
        }
        return redirect()->route('users_edit')->with('user_update', 'Update Data Gagal !!!');
    }

    public function user_delete(Request $request, User $user)
    {
        User::destroy($user->id);
    }

    public function profile_admin()
    {
        $user = User::all();
        return view('backend.dashboard-profile-admin', ['user'=> $user]);
    }

    
}
