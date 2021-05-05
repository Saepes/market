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

        $options = ['image' => $request->file('image')];
        if(!$filename = $this->addToFileStorage($options)) {
            return false;
        }

        $new_category = new Category();
        $new_category -> name = $request->name;
        $new_category -> alias = $request->alias;
        $new_category -> decs = $request->desc;
        $new_category -> preview_img = $filename;
        $new_category -> save();

        return redirect()->back()->with('Success', 'Категория добавлена');
    }

    /**
     *
     * Method adding image in Storage
     *
     */

    private function addToFileStorage($options) {
        $file = $options['image'];

        $image = \Image::make($file);
        $extensionImg = $file->extension();
        $filename = md5(microtime() . rand(0, 9999)) .'.'. $extensionImg;
        $path = 'categories_preview/' . $filename ;

        $image->resize(null, 1000, function ($constraint) {
            $constraint->aspectRatio();
        });

        if(Storage::disk('disk_image')->put($path, $image->encode($extensionImg, 100))) {
            return $filename;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $image = Storage::disk('disk_image')->url('img/categories_preview/'.$category->preview_img);
        return view('admin.category.show', ['category' => $category, 'img' => $image]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $image = Storage::disk('disk_image')->url('img/categories_preview/'.$category->preview_img);
        return view('admin.category.edit', ['category' => $category, 'img' => $image]);
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
        $request->validate([
            'name' => 'required|min:3|max:128',
            'alias' => 'required|min:3|max:128',
            'desc' => 'required|min:10|max:1024',
        ]);

        $file = $request->file('image');

        $category -> name = $request->name;
        $category -> alias = $request->alias;
        $category -> decs = $request->desc;

        if($file) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $path = 'categories_preview/'. $category->preview_img;

            if(Storage::disk('disk_image')->delete($path)) {
                $options = ['image' => $file];
                $filename = $this->addToFileStorage($options);
                $category->preview_img = $filename;
            }
        }

        $category->save();
        return redirect()->back()->with('Success', 'Категория успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $path = 'categories_preview/'. $category->preview_img;
        if(Storage::disk('disk_image')->delete($path)) {
            $category->delete();
        }
        return redirect()->back()->with('Success', 'Категория успешно удалена');
    }
}
