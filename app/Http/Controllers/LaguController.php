<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lagu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaguController extends Controller
{
    public function lagu_index()
    {
        $lagu     = Lagu::all();
        $category = Category::all();
        return view('backend.lagu', ['lagu' =>$lagu, 'category'=>$category]);
    }

    public function lagu_add()
    {
        $category   = Category::all();
        return view('backend.lagu-add', ['category'=>$category]);
    }

    public function lagu_store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'images' => 'required',
            'deskripsi' => 'required'

        ]);
        $data = new Lagu();

        $filename = time(). '.' .request()->images->getClientOriginalExtension();
        request()->images->move(public_path('images/lagu/'), $filename);

        $data->name = $request->name;
        $data->images = $filename;
        $data->deskripsi = $request->deskripsi; 
        if ( $data->save()) {
            $data->categories()->sync($request->category);
            return redirect()->route('lagu')->with('lagu_add', 'Lagu berhasil di tambahkan');
        }
        return redirect()->route('lagu-add')->with('lagu_add', 'Lagu Gagal di tambahkan');

        

    }

    public function lagu_delete($id)
    {
        $lagu = Lagu::findOrFail($id);
        $image_path = public_path()."/images/";
        $image      = $image_path. $lagu->images;
        if (file_exists($image)) {
            @unlink($image);
        }

        $lagu->delete();
        return redirect()->route('lagu')->with('lagu_delete', 'Lagu berhasil di Hapus');
    }

    public function lagu_edit($id)
    {
        $lagu       = Lagu::where('id', $id)->first();
        return view('backend.lagu-edit', ['lagu'=>$lagu]);
    }

    public function lagu_update(Request $request, Lagu $lagu)
    {
        $validate = $request->validate([
            'name' => 'required',
            'images' => 'required',
            'deskripsi' => 'required'

        ]);
        
        $data = new Lagu;

        $filename = '';
        $filename = $request->hidden_images_id;

        if ($request->images != '') {
            $filename = time(). '.' .request()->images->getClientOriginalExtension();
            request()->images->move(public_path('images/lagu/'), $filename);
            Storage::delete('images/lagu'.$lagu->images);
        }

        $data = Lagu::find($request->lagu_id);

        $data->name = $request->name;
        $data->images = $filename;
        $data->deskripsi = $request->deskripsi; 
        
        if ( $data->save()) {
            return redirect()->route('lagu')->with('lagu_update', 'Lagu berhasil di ubah');
        }
        return redirect()->route('lagu-add')->with('lagu_update', 'Lagu Gagal di ubah');
    }

}
