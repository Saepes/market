<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function showIndex() {
        $products = Product::orderBy('created_at')->take(8)->get();
        $categories = Category::orderByDesc('id')->take(3)->get();
        return view('home/index', ['products' => $products, 'categories' => $categories]);
    }

}
