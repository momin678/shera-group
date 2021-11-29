@extends('backend.layouts.app')
@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3">Website Left-sidebar</h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-10 mx-auto">
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">About Shera-group</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.sideTopLogo') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
                        <label class="col-md-3 col-from-label">Video URL</label>
                        <div class="col-md-8">
                            <input type="hidden" name="types[]" value="about_video">
    	                    <input type="text" name="about_video" class="form-control" placeholder="About sheragrout video link" value="https://www.youtube.com/watch?v={{json_decode(get_setting('about_video'))}}">
                        </div>
                    </div>
					<div class="form-group row">
	                    <label class="col-md-3 col-from-label">Video Thumabl</label>
						<div class="col-md-8">
						    <div>
						      <input type="hidden" name="types[]" value="about_image">
                              <input type="file" name="about_image" onchange="previewFile(this)" class="form-control" value="">
                              @if(json_decode(get_setting('about_image')))
                                <img height="150px" src="{{asset('images/logo')}}/{{json_decode(get_setting('about_image'))}}"/>
                              @endif
                            </div>
						</div>
	                </div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">Update</button>
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
				<h6 class="mb-0">Shera-group Follow-us</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
                        <label class="col-md-3 col-from-label">Youtub Link</label>
                        <div class="col-md-8">
                            <input type="hidden" name="types[]" value="youtub_link">
    	                    <input type="text" name="youtub_link" class="form-control" placeholder="https://www.youtube.com" value="{{json_decode(get_setting('youtub_link'))}}">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-md-3 col-from-label">Linkedin Link</label>
                        <div class="col-md-8">
                            <input type="hidden" name="types[]" value="linkedin_link">
    	                    <input type="text" name="linkedin_link" class="form-control" placeholder="https://www.linkedin.com" value="{{json_decode(get_setting('linkedin_link'))}}">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-md-3 col-from-label">Facebook Link</label>
                        <div class="col-md-8">
                            <input type="hidden" name="types[]" value="facebook_link">
    	                    <input type="text" name="facebook_link" class="form-control" placeholder="https://www.facebook.com" value="{{json_decode(get_setting('facebook_link'))}}">
                        </div>
                    </div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
    <script>
        function previewFile(input) {
          var preview = input.nextElementSibling;
          var file = input.files[0];
          var reader = new FileReader();
        
          reader.onloadend = function() {
            preview.src = reader.result;
          }
        
          if (file) {
            reader.readAsDataURL(file);
          } else {
            preview.src = "";
          }
        }
    </script>
@endsection