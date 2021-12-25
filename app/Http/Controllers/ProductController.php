<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use Illuminate\Support\Str;
use Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $products = Product::orderBy('created_at', 'desc');
        if ($request->search != null){
            $products = $products->where('name', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }
        $products = $products->paginate(15);
        return view('backend.products.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNotIn('level', [0])->get();
        return view('backend.products.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->tags = $request->tags;
        $product->specification = $request->specification;
        $product->description = $request->description;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $photos = $request->file('photos');
        if($photos !== null){
            $photosName = rand(100, 9999).time().'.'. $photos->extension();
            $filePath = public_path('/images/product');
            $img = Image::make($photos->path());
            $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$photosName);
            $images = $photosName;
        }
        $product->photos = $images;
        if($request->file('meta_img')){
            $photos = $request->file('meta_img');
            if($photos !== null){
                $photosName = rand(100, 9999).time().'.'. $photos->extension();
                $filePath = public_path('/images/product');
                $img = Image::make($photos->path());
                $img->resize(300, 300, function ($const) {
                    $const->aspectRatio();
                })->save($filePath.'/'.$photosName);
                $images = $photosName;
            }
            $product->meta_img = json_encode($images);
        }else{
            $product->meta_img = json_encode($images);
        }
        $product->slug = Str::slug($request->name, '-').'-'.Str::random(5);
        $product->save();
        flash('Product has been inserted successfully')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // dd($product);
        $category_info = Category::find($product->category_id);
        $sub_category = Category::where('parent_id', $category_info->parent_id)->get();
        $categories = Category::where('level', 0)->orderBy('id', 'DESC')->take(5)->get();
        $all_products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('frontend.our-product', compact('product', 'categories', 'all_products', 'sub_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // dd($product);
        $categories = Category::whereNotIn('level', [0])->get();
        $brands = Brand::all();
        return view('backend.products.product.edit', compact('product', 'categories', 'brands'));
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
        // dd($request);
        $product = Product::find($product->id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->tags = $request->tags;
        $product->specification = $request->specification;
        $product->description = $request->description;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        if($request->file('photos')){
            $photo = $request->file('photos');
            if($photo !== null){
                $photosName = rand(100, 9999).time().'.'. $photo->extension();
                $filePath = public_path('/images/product');
                $img = Image::make($photo->path());
                $img->resize(300, 300, function ($const) {
                    $const->aspectRatio();
                })->save($filePath.'/'.$photosName);
                $images = $photosName;
            }
            $product->photos = $images;
        }
        if($request->file('meta_img')){
            $photo = $request->file('meta_img');
            if($photo !== null){
                $photosName = rand(100, 9999).time().'.'. $photo->extension();
                $filePath = public_path('/images/product');
                $img = Image::make($photo->path());
                $img->resize(300, 300, function ($const) {
                    $const->aspectRatio();
                })->save($filePath.'/'.$photosName);
                $images = $photosName;
            }
            $product->meta_img = $images;
        }else{
            if($request->file('photos')){
                $product->meta_img = $images;
            }
        }
        $product->slug = Str::slug($request->name, '-').'-'.Str::random(5);
        $product->save();
        flash('Product has been update successfully')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function product_delete(Request $request){
        $product_info = Product::find($request->product_id);
        // dd($product_info->photos);
        foreach(json_decode($product_info->photos) as $photo){
            if($photo){
                $image = public_path('images/product').'/'.$photo;
                if(file_exists($image)){
                    unlink($image);
                }
            }
        }
        foreach(json_decode($product_info->meta_img) as $photo){
            if($photo){
                $image = public_path('images/product').'/'.$photo;
                if(file_exists($image)){
                    unlink($image);
                }
            }
        }
        Product::product_delete($product_info->id);
        flash('Product has been delete successfully')->success();
        return redirect()->route('product.index');
    }
    public function updateActive(Request $request){
        $product = Product::findOrFail($request->id);
        $product->status = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }
    public function product_list($id){
        $category_info = Category::find($id);
        $categories = Category::where('level', 0)->orderBy('id', 'DESC')->take(5)->get();
        $products = Product::where('category_id', $id)->get();
        $all_products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        $sub_category = Category::where('parent_id', $category_info->parent_id)->get();
        return view('frontend.our-brands-product', compact('products', 'categories', 'all_products', 'sub_category'));
    }

}
