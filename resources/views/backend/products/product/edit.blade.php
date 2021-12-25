@extends('backend.layouts.app')
@section('content')
<div class="text-left mt-2 mb-3">
    <h5 class="mb-0 h6">Add New Product</h5>
</div>
<div class="">
    <form class="form form-horizontal mar-top" action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data" id="choice_form">
        @method('PUT')
        <div class="row gutters-5">
            <div class="col-lg-8">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Product Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Product Name <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="Product Name" required>
                            </div>
                        </div>
                        <div class="form-group row" id="category">
                            <label class="col-md-3 col-from-label">Category <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <select class="select2 form-control" data-live-search="true"
                                data-selected-text-format="count" name="category_id" required>
                                    <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected': ''}}>{{$category->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">Brand</label>
                            <div class="col-md-8">
                                <select class="select2 form-control" name="brand_id" id="brand_id" data-live-search="true">
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{$brand->id == $product->brand_id ? 'selected': ''}}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Tags <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" value="{{$product->tags}}" class="form-control metaKeywords" name="tags" placeholder="Type and hit enter to add a tag" required>
                                <small class="text-muted">This is used for search. Input those words by which cutomer can find this product.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Product Images</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">Gallery Images <small>(600x600)</small></label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="photos">
                                <img src="{{asset('images/product')}}/{{ $product->photos }}" style="max-width: 60px; padding: 5px; border: 1px solid black;">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Product Specification</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">                            
                            <textarea class="textEditor" name="specification">{{$product->specification}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Product Description</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <textarea class="textEditor" name="description">{{$product->description}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">SEO Meta Tags</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Meta Title</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="{{$product->meta_title}}" name="meta_title" placeholder="Meta Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Description</label>
                            <div class="col-md-8">
                                <textarea name="meta_description" rows="8" class="form-control">{{$product->meta_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">Meta Image</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" multiple name="meta_img[]">
                                @foreach (json_decode($product->meta_img) as $photos)
                                <img src="{{asset('images/product')}}/{{ $photos }}" style="max-width: 60px; padding: 5px; border: 1px solid black;">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="Second group">
                        <button type="submit" class="btn btn-success">Save & Publish</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('js')


<script type="text/javascript">
    $(function() {
        $('.metaKeywords').tagsInput({
            'autocomplete': {
                source: [

                ]
            }
        });
    });
</script>
<script>
    tinymce.init({
      selector: '.textEditor',
      height: 200,
      plugins: 'advlist lists link code preview searchreplace wordcount media table emoticons image imagetools',
      toolbar: 'undo redo bold italic styleselect underline alignleft aligncenter alignright bullist numlist image table',
    });
</script>
@endsection
