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
                            @foreach ($all_products as $product)
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
                    <div class="our-product-section">
                        <div class="product-top-section">
                            <div class="product-content">
                                <div class="common-title">
                                    {{$product->name}}
                                </div>
                                    <p>{!! $product->specification !!}</p>
                                <h3>Product Description</h3>
                                <p> {!! $product->description !!}</p>
                            </div>
                            <div class="product-img" style="min-width: 200px;">
                                <img class="img-thumbnail" src="{{asset('images/product')}}/{{$product->photos}}" alt="">
                            </div>
                        </div>
                        {{-- <div class="product-bottom-section mt-md-4">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-recipe-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-recipe" type="button" role="tab"
                                            aria-controls="nav-recipe"
                                            aria-selected="true">Recipe & Quantity
                                    </button>
                                    <button class="nav-link" id="nav-cooking-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-cooking" type="button" role="tab"
                                            aria-controls="nav-cooking" aria-selected="false">Steps of Cooking
                                    </button>
                                    <button class="nav-link" id="nav-nutritional-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-nutritional" type="button" role="tab"
                                            aria-controls="nav-nutritional" aria-selected="false">Nutritional Fact
                                    </button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-recipe" role="tabpanel"
                                     aria-labelledby="nav-recipe-tab">
                                    <p>Chicken meat- 1 kg Chopped onions- 1 Cup (250 ml) Edible Oil- 10 tablespoons or
                                        150
                                        ml Salt- as required RADHUNI Chicken Masala- 01 pack or 20 gm</p>
                                </div>
                                <div class="tab-pane fade" id="nav-cooking" role="tabpanel"
                                     aria-labelledby="nav-cooking-tab">
                                    <p>
                                        Cut and wash meat properly. Heat Oil in a vessel and fry chopped onions until
                                        brown
                                        color. Add Radhuni Chicken Masala, required quantity salt and � cup (250ml sized
                                        cup) water in the fried onion and saut� for a while on medium flame. When the
                                        oil
                                        comes up add meat in it. Saute again 10-15 minutes. Then add required quantity
                                        of
                                        water and cook it properly. When the meat gets boiled and thickens gravy formed,
                                        remove from heat and serve hot.
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="nav-nutritional" role="tabpanel"
                                     aria-labelledby="nav-nutritional-tab">
                                    <h4 class="name">
                                        Nutrition Facts of Chicken Masala
                                    </h4>
                                    <p>Pack Size 20 g</p>
                                    <div class="fact">
                                        <h4>Nutrition Facts </h4>
                                        <p>Serving Size 10 g (0.35 oz.)</p>
                                        <p>Servings Per Container 2</p>
                                    </div>
                                    <h4>Amount Per Serving</h4>
                                    <table class="table-responsive">
                                        <tr>
                                            <td>Calories 45</td>
                                            <td>Calories from Fat 10% Daily Value*</td>
                                        </tr>
                                        <tr>
                                            <td>Total Fat 1 g</td>
                                            <td>2%</td>
                                        </tr>
                                        <tr>
                                            <td>Saturated fat 0 g</td>
                                            <td>0%</td>
                                        </tr>
                                        <tr>
                                            <td>Trans fat 0 g</td>
                                            <td>0%</td>
                                        </tr>
                                        <tr>
                                            <td>Cholesterol 0 mg</td>
                                            <td>0%</td>
                                        </tr>
                                        <tr>
                                            <td>Sodium 50 mg</td>
                                            <td>0%</td>
                                        </tr>
                                        <tr>
                                            <td>Total Carbohydrate 7 g</td>
                                            <td>2%</td>
                                        </tr>
                                        <tr>
                                            <td>Protein 1g</td>
                                            <td>2%</td>
                                        </tr>
                                        <tr>
                                            <td>Vitamin A 0%</td>
                                            <td>Calcium 2%</td>
                                        </tr>
                                        <tr>
                                            <td>Vitamin C 0%</td>
                                            <td>Iron 4%</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">*Percent Daily Values are based on a 2,000 calorie diet.
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection