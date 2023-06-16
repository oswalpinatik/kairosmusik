<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories     = Category::all();
        $category_count     = Category::count();
        return view('backend.categories', ['categories' => $categories, 'category_count'=> $category_count]);
    }

}
