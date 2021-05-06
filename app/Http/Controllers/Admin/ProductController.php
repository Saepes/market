<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all('id', 'name');
        $lastArticle = Product::latest('id')->value('article');
        return view('admin.product.create', ['lastArticle' => $lastArticle, 'categories' => $categories]);
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
            'category_id' => 'required|integer',
            'desc' => 'required|min:10|max:4096',
            'price' => 'required|min:1|max:15|integer',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $options = ['image' => $request->file('image')];
        if(!$filename = $this->addToFileStorage($options)) {
            return false;
        }

        $lastArticle = Product::latest('id')->value('article') + 1;

        $new_product = new Product();
        $new_product->article = $lastArticle;
        $new_product->name = $request->name;
        $new_product->description = $request->desc;
        $new_product->price = $request->price;
        $new_product->img = $filename;
        $new_product->categories_id = $request->category_id;
        $new_product->save();


        return redirect()->back()->with('Success', 'Товар добавлен');
    }


    private function addToFileStorage($options) {
        $file = $options['image'];

        $image = \Image::make($file);
        $extensionImg = $file->extension();
        $filename = md5(microtime() . rand(0, 9999)) .'.'. $extensionImg;
        $path = 'product_img/' . $filename ;

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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $img = Storage::disk('disk_image')->url('img/product_img/'.$product->img);
        return view('admin.product.show', ['product' => $product, 'img' => $img]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all('id', 'name');
        $img = Storage::disk('disk_image')->url('img/product_img/'. $product->img);
        return (view('admin.product.edit', ['product' => $product, 'categories' => $categories, 'img' => $img]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|min:3|max:128',
            'category_id' => 'required|integer',
            'desc' => 'required|min:10|max:4096',
            'price' => 'required|min:1|max:15|integer',
        ]);

        $file = $request->file('image');

        $product -> name = $request->name;
        $product -> description = $request->desc;
        $product -> price = $request->price;
        $product -> categories_id = $request->category_id;

        if($file) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $path = 'product_img/'. $product->img;

            if(Storage::disk('disk_image')->delete($path)) {
                $options = ['image' => $file];
                $filename = $this->addToFileStorage($options);
                $product->img = $filename;
            }
        }

        $product->save();
        return redirect()->back()->with('Success', 'Товар успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $path = 'product_img/'. $product->img;
        if(Storage::disk('disk_image')->delete($path)) {
            $product->delete();
        }
        return redirect()->back()->with('Success', 'Товар успешно удален');
    }
}
