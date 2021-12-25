@extends('frontend.layouts.app')
@section('content')

<main>
    <div class="container">
        <div class="row custom-border">
            <div class="col-md-8 offset-md-2">
                <div class="brand-wrapper d-flex justify-content-around mt-md-3">
                    @foreach ($categories as $category)
                        <div class="brand-item">
                            <a href="{{route('sub-category-list', $category->id)}}"><img src="{{asset('images/category')}}/{{$category->banner}}" alt=""></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="left-content">
                    <form action="" class="my-3">
                        <select class="product-search form-control">
                            @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="Search" class="form-control common-button mt-2">
                    </form>

                    <div class="accordion accordion-flush our-brands-product" id="accordionProductGroup">
                        @foreach ($sub_category as $category)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne{{$category->id}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne{{$category->id}}" aria-expanded="false"
                                            aria-controls="flush-collapseOne{{$category->id}}">
                                            {{$category->name}}
                                    </button>
                                </h2>
                                <div id="flush-collapseOne{{$category->id}}" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne{{$category->id}}" data-bs-parent="#accordionProductGroup">
                                    <div class="accordion-body">
                                        <div class="brand-name-group">
                                            @php
                                                $products = \App\Models\Product::where('category_id', $category->id)->get();
                                            @endphp
                                            @foreach ($products as $product)
                                                <a href="{{route('product.show', $product->id)}}" class="brand-name">{{$product->name}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <div class="col-md-9">
                <div class="right-content">
                    <div class="our-brands-section">
                        <div class="row row row-cols-2 row-cols-sm-3 row-cols-lg-4">
                            @foreach ($products as $product)
                                <div class="col">
                                    <a href="{{route('product.show', $product->id)}}" class="product-item">
                                        <div class="img">
                                            <img class="img-fluid" src="{{asset('images/product')}}/{{$product->photos}}"  style="max-height: 120px;">
                                        </div>
                                        <h4 style="max-height: 20px;">{{$product->name}}</h4>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection