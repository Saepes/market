<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showCategory() {
       $categories = Category::orderBy('created_at')->get();
        return view('home.categories', ['categories' => $categories]);
    }

    public function showCategoryAlias($alias) {
        $id = Category::where('alias', $alias)->pluck('id')->first();
        $name = Category::where('alias', $alias)->pluck('name')->first();
        $products = Category::find($id)->product()->paginate(30);
        return view('home.category', ['products' => $products, 'name' => $name]);
    }

}
