<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('admin.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:128',
            'alias' => 'required|min:3|max:128',
            'desc' => 'required|min:10|max:1024',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $image = \Image::make($request->file('image'));
        $extensionImg = $request->file('image')->extension();
        $filename = md5(microtime() . rand(0, 9999)) .'.'. $extensionImg;
        $path = storage_path('images/categories_preview/') . $filename ;

        $image->resize(null, 1000, function ($constraint) {
            $constraint->aspectRatio();
        });

        $image->save($path);

        $new_category = new Category();
        $new_category -> name = $request->name;
        $new_category -> alias = $request->alias;
        $new_category -> decs = $request->desc;
        $new_category -> preview_img = $filename;
        $new_category -> save();

        return redirect()->back()->withSuccess('Категория добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
