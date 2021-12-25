@extends('backend.layouts.app')
@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col">
            <h1 class="h3">Website Header</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Header Setting</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('business_settings.sideTopLogo') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Website Name</label>
                        <div class="col-md-8">
                            <input type="hidden" name="types[]" value="website_name">
                            <input type="text" name="website_name" class="form-control" placeholder="Website Name"
                                value="{{ json_decode(get_setting('website_name')) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Header Left Log</label>
                        <div class="col-md-8">
                            <div>
                                <input type="hidden" name="types[]" value="en_logo">
                                <input type="file" name="en_logo" onchange="previewFile(this)" class="form-control"
                                    value="{{ json_decode(get_setting('en_logo')) }}">
                                @if (json_decode(get_setting('en_logo')))
                                    <img height="100px"
                                        src="{{ asset('images/logo') }}/{{ json_decode(get_setting('en_logo')) }}" />
                                @else
                                    <img height="100px" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Header right Logo</label>
                        <div class="col-md-8">
                            <div>
                                <input type="hidden" name="types[]" value="bn_logo">
                                <input type="file" name="bn_logo" onchange="previewFile(this)" class="form-control"
                                    value="{{ get_setting('bn_logo') }}">
                                @if (json_decode(get_setting('bn_logo')))
                                    <img height="100px"
                                        src="{{ asset('images/logo') }}/{{ json_decode(get_setting('bn_logo')) }}" />
                                @else
                                    <img height="100px" />
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
