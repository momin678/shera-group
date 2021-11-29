<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $brands = Brand::orderBy('id', 'asc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $brands = $brands->where('name', 'like', '%'.$sort_search.'%');
        }
        $brands = $brands->paginate(15);
        return view('backend.products.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->name = $request->name;
        if($request->hasFile('logo')){
            $logo = $request->logo;
            $name = rand(1000, 9999).time().'.'.$logo->extension();
            $filePath = public_path('/images/brand');
            $img = Image::make($logo->path());
            $img->resize(120, 80, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$name);
            $brand->logo = $name;
        }
        $brand->meta_title = $request->meta_title;
        $brand->meta_description = $request->meta_description;
        $brand->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        $brand->save();
        flash('Brand has been inserted successfully')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $brand_info = Brand::find($brand->id);
        return view('backend.products.brand.edit', compact('brand_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $brand_info = Brand::find($brand->id);
        $brand_info->name = $request->name;
        if($request->hasFile('logo')){
            $logo = $request->logo;
            $name = rand(1000,9999).time().'.'.$logo->extension();
            $filePath = public_path('/images/brand');
            $img = Image::make($logo->path());
            $img->resize(120, 80, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$name);
            $brand_info->logo = $name;
            if($brand->logo){
                $image = public_path('images/brand').'/'.$brand->logo;
                if(file_exists($image)){
                   unlink($image); 
                }
            }
        }
        $brand_info->meta_title = $request->meta_title;
        $brand_info->meta_description = $request->meta_description;
        $brand_info->save();
        flash('brand has been update successfully')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
    public function brand_delete(Request $request){
        $brand_info = Brand::find($request->brand_id);
        $products = Product::where('brand_id', $brand_info->id)->get();
        foreach ($products as $product) {
            $product->brand_id = null;
            $product->save();
        }
        if($brand_info->logo){
            $logo_image = public_path('images/brand').'/'.$brand_info->logo;
            if(file_exists($logo_image)){
                unlink($logo_image);
            }
        }
        Brand::delete_brand($brand_info->id);
        flash('Brand has been delete successfully')->success();
        return redirect()->route('brand.index');
    }
    public function updateActive(Request $request){
        $brand = Brand::findOrFail($request->id);
        $brand->status = $request->status;
        if($brand->save()){
            return 1;
        }
        return 0;
    }
}
