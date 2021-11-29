@extends('backend.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center col-lg-8 mx-auto">
        <div class="col-md-6">
            <h1 class="h3">Edit Brand</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{ route('brand.index') }}" class="btn btn-primary">
                <span>Return Back</span>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Brand Information</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('brand.update', $brand_info->id) }}" method="POST" enctype="multipart/form-data">
                	@method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Brand Name</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Brand Name" id="name" name="name" class="form-control" required value="{{$brand_info->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">logo <small>(120x80)</small></label>
                        <div class="col-md-9">
                            <div class="custom-file">
                              <input type="file" name="logo" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @if ($brand_info->logo)
                                <img src="{{asset('images/brand')}}/{{$brand_info->logo}}" width="50px">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Meta Title</label>
                        <div class="col-md-9">
                            <input type="text" value="{{$brand_info->meta_title}}" class="form-control" name="meta_title" placeholder="Meta Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Meta Description</label>
                        <div class="col-md-9">
                            <textarea name="meta_description" rows="5" class="form-control">{{$brand_info->meta_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endsection