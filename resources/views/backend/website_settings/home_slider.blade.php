@extends('backend.layouts.app')
@section('content')

<div class="row">
	<div class="col-xl-10 mx-auto">
		<h6 class="fw-600">Home Page Settings</h6>
		<p class="alert alert-info">
			We have limited banner height to maintain UI. We had to crop from both left & right side in view for different devices to make it responsive. 
			Before designing banner keep these points in mind
		</p>
		{{-- Home Slider --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">Home Slider</h6>
			</div>
			<div class="card-body">
				<form method="post" action="{{route('business_settings.home-slider-update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
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
                        @else
                        <div class="form-group hdtuto control-group lst increment col-md-6" >
                            <level>Slider URl</level> <small class="bg-warning p-1">For URL but it optional</small>
                            <input type="text" name="url[]" class="myfrm form-control" placeholder="https://example.com">
                        </div>
                        <div class="form-group hdtuto control-group lst increment col-md-6">
                            <level>Slider Image</level> <small class="bg-danger p-1">Image must be input</small>
                          <input type="file" name="slider_image[]" class="myfrm form-control" required>
                        </div>
                        @endif
                        
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

