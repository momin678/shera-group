@extends('backend.layouts.app')
@section('content')

<div class="row">
	<div class="col-xl-10 mx-auto">
		<h6 class="fw-600">Home Page Settings</h6>
		{{-- Home Slider --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">Home Slider</h6>
			</div>
			<div class="card-body">
				<form method="post" action="{{route('business_settings.home-slider-update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @isset($sliders)
                            @if(count($sliders)>0)
                                @foreach($sliders as $slider)
                                    <div class="form-group hdtuto control-group lst increment col-md-5" >
                                        <input type="text" name="url[]" class="myfrm form-control" placeholder="https://example.com" value="{{$slider->url}}">
                                    </div>
                                    <div class="form-group hdtuto control-group lst increment col-md-5">
                                    <input type="file" name="slider_image[]" class="myfrm form-control" src="{{ asset('images/home_slider')}}/{{$slider->slider_image}}">
                                    <img src="{{ asset('images/home_slider')}}/{{$slider->slider_image}}" height="50">
                                    </div>
                                    <div class="form-group hdtuto control-group lst increment col-md-2">
                                    <a href="{{route('business_settings.home-slider-delete', $slider->id)}}" class="btn btn-danger">Remove</a>
                                    </div>
                                @endforeach
                            @endif
                        @endisset
                        
                    <div id="newInput"></div>
                    </div>
                    <div class="form-group-btn"> 
                        <button class="btn btn-light float-right mt-2" type="button" id="addRow">Add</button>
                        <button type="submit" class="btn btn-success mt-2">Submit</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-10 mx-auto">
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">Top 10 Product</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
                    <div class="form-group">
                        <label>Top-product</label>
                        <input type="hidden" name="types[]" value="top10_product">
                        <select class="select2bs4" multiple="multiple" data-placeholder="Select a product"
                                style="width: 100%;" name="top10_product[]">
                        @foreach (\App\Models\Product::where('status', 1)->get() as $product)
                        <option value="{{$product->id}}"  @if(in_array($product->id, json_decode(get_setting('top10_product')))) selected @endif>{{$product->name}}</option>
                        @endforeach
                        </select>
                      </div>
					<div class="form-group-btn">
						<button type="submit" class="btn btn-success mt-2">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        var html = '';
        html += '<div class="clone hide removeInputRow" id="removeInputRow">'
            html += '<div class="form-group hdtuto control-group lst increment col-md-6" >'
            html +=     '<level>Slider URl</level> <small class="bg-warning p-1">For URL but it optional</small>'
            html +=     '<input type="text" name="url[]" class="myfrm form-control" placeholder="https://example.com">'
            html += '</div>'
            html += '<div class="form-group hdtuto control-group lst increment col-md-6">'
            html += '    <level>Slider Image</level> <small class="bg-danger p-1">Image must be input</small>'
            html += '  <input type="file" name="slider_image[]" class="myfrm form-control" required>'
            html += '</div>'
        html += '</div>'
        $("#addRow").click(function(){
            var lsthmtl = $(html).html();
            $("#newInput").after(lsthmtl);
        });
    });
</script>
@endsection

