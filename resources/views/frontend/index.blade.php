@extends('frontend.layouts.app')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="left-content">
                        <!--widget video-->
                        <div class="widget-video widget">
                            <div class="title">
                                <h4 class="d-flex align-items-center"><span><i class="fas fa-sort-down"></i></span>About Shera Group</h4>
                            </div>
                            <div class="about-video text">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    @if(json_decode(get_setting('about_image')))
                                        <img class="w-100" src="{{asset('images/logo')}}/{{json_decode(get_setting('about_image'))}}"/>
                                    @endif
                                </button>
                            </div>
                        </div>
                        <!--widget facebook pages-->
                        <div class="widget-facebook widget">
                            <div class="title">
                                <h4  class="d-flex align-items-center"><span><i class="fas fa-sort-down"></i></span>Facebook Pages</h4>
                            </div>
                            <div class="text">
                                @if ((get_setting('facebook_pages') != null))
                                    @foreach(json_decode(get_setting('facebook_pages')) as $facebook_page)
                                        <div class="d-flex">
                                            <iframe src="{{$facebook_page}}" width="245" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!--widget Follow -->
                        <div class="widget-follow widget">
                            <div class="title">
                                <h4 class="d-flex align-items-center"><span><i class="fas fa-sort-down"></i></span>Follow Us</h4>
                            </div>
                            <div class="text">
                                <a href="{{json_decode(get_setting('youtub_link'))}}"><i class="fab fa-facebook-square"></i></a>
                                <a href="{{json_decode(get_setting('linkedin_link'))}}"><i class="fab fa-linkedin"></i></a>
                                <a href="{{json_decode(get_setting('facebook_link'))}}"><i class="fab fa-youtube-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 order-first order-md-last">
                    <div class="right-content">
                        <div class="main-slider">
                            <div id="mainSlider" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    @foreach($sliders as $key => $slider)
                                    <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="{{$key}}"
                                            class="{{ $key == 0 ? ' active' : '' }}" aria-current="true" aria-label="Slide {{$key+1}}"></button>
                                    @endforeach
                                </div>
                                <div class="carousel-inner">
                                    @foreach($sliders as $key => $slider)
                                        <div class="carousel-item {{ $key == 0 ? ' active' : '' }} " data-bs-interval="2000">
                                            <a href="#">
                                                <img src="{{asset('images/home_slider')}}/{{$slider->slider_image}}" class="d-block w-100" alt="...">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                        data-bs-target="#mainSlider" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                        data-bs-target="#mainSlider" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="marquee-wrapper">
                            <div class="marquee-block">
                                <div class="marquee-inner to-left">
                                    <span>
                                        @if ((get_setting('top10_product') != null))
                                            @foreach(json_decode(get_setting('top10_product')) as $product)
                                            @php
                                                $product = \App\Models\Product::find($product);
                                            @endphp
                                            <a href="{{route('product.show', $product->id)}}" class="marquee-item">
                                                <img src="{{asset('images/product')}}/{{$product->photos}}" alt="">
                                            </a>
                                            @endforeach
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="brand-wrapper d-flex justify-content-around mt-md-4">
                            @foreach ($categories as $category)
                                <a href="{{route('sub-category-list', $category->id)}}" class="brand-item">
                                    <img class="img-fluid" src="{{asset('images/category')}}/{{$category->banner}}" alt="">
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="staticBackdropLabel">About Shera Group</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            @if(json_decode(get_setting('about_video')))
                                <iframe class="embed-responsive-item w-100" src="https://www.youtube.com/embed/{{ (json_decode(get_setting('about_video')))}}" allowfullscreen></iframe>
                              @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </main>
@endsection