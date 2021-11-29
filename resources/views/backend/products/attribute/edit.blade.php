@extends('backend.layouts.app')
@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center col-lg-8 mx-auto">
        <div class="col-md-6">
            <h1 class="h3">Edit Attribute</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{ route('attributes.index') }}" class="btn btn-primary">
                <span>Return Back</span>
            </a>
        </div>
    </div>
</div>
<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-body p-0">
          <form class="p-4" action="{{ route('attributes.update', $attribute->id) }}" method="POST">
              <input name="_method" type="hidden" value="PATCH">
              @csrf
              <div class="form-group row">
                  <label class="col-sm-3 col-from-label" for="name">Name <i class="las la-language text-danger" title="Translatable"></i></label>
                  <div class="col-sm-9">
                      <input type="text" placeholder="Name" id="name" name="name" class="form-control" required value="{{$attribute->name}}">
                  </div>
              </div>
              <div class="form-group mb-0 text-right">
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
