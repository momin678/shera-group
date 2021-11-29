@extends('backend.layouts.app')
@section('content')
<style>
    .warrenty_period{
        display:none;
    }
</style>
<div class="text-left mt-2 mb-3">
    <h5 class="mb-0 h6">Add New Product</h5>
</div>
<div class="">
    <form class="form form-horizontal mar-top" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
        <div class="row gutters-5">
            <div class="col-lg-8">
                @csrf
                <input type="hidden" name="added_by" value="admin">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Product Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Product Name <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" placeholder="Product Name" onchange="update_sku()" required>
                            </div>
                        </div>
                        <div class="form-group row" id="category">
                            <label class="col-md-3 col-from-label">Category <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <select class="select2 form-control" data-live-search="true"
                                data-selected-text-format="count" name="category_id" required>
                                    <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">Brand</label>
                            <div class="col-md-8">
                                <select class="select2 form-control" name="brand_id" id="brand_id" data-live-search="true">
                                    <option value="">Select Brand</option>
                                    @foreach (\App\Models\Brand::all() as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Unit</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="unit" placeholder="Unit (e.g. KG, Pc etc)" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Minimum Qty <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="number" lang="en" class="form-control" name="min_qty" value="1" min="1" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Tags <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control metaKeywords" name="tags[]" placeholder="Type and hit enter to add a tag" required>
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
                                <div class="input-group" data-toggle="" data-type="image" data-multiple="true">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control file-amount">Choose File</div>
                                    <input type="hidden" name="photos" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                                <small class="text-muted">These images are visible in product details page gallery. Use 600x600 sizes images.</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">Thumbnail Image <small>(300x300)</small></label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control file-amount">Choose File</div>
                                    <input type="hidden" name="thumbnail_img" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                                <small class="text-muted">This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Product Videos</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Video Provider</label>
                            <div class="col-md-8">
                                <select class="form-control " name="video_provider" id="video_provider">
                                    <option value="youtube">Youtube</option>
                                    <option value="dailymotion">Dailymotion</option>
                                    <option value="vimeo">Vimeo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Video Link</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="video_link" placeholder="Video Link">
                                <small class="text-muted">{{("Use proper link without extra parameter. Don't use short share link/embeded iframe code.")}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Product Variation</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <input type="text" class="form-control" value="Colors" disabled>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control select2" data-live-search="true" data-selected-text-format="count" name="colors[]" id="colors" multiple disabled>
                                    @foreach (\App\Models\Color::orderBy('name', 'asc')->get() as $key => $color)
                                    <option  value="{{ $color->code }}" data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:{{ $color->code }}'></span><span>{{ $color->name }}</span></span>"></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <label class="mb-0">
                                    <input value="1" type="checkbox" name="colors_active">
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <input type="text" class="form-control" value="Attributes" disabled>
                            </div>
                            <div class="col-md-8">
                                <select name="choice_attributes[]" id="choice_attributes" class="form-control select2" data-selected-text-format="count" data-live-search="true" multiple data-placeholder="Choose Attributes">
                                    @foreach (\App\Models\Attribute::all() as $key => $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <p>Choose the attributes of this product and then input values of each attribute</p>
                            <br>
                        </div>

                        <div class="customer_choice_options" id="customer_choice_options">

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Product price + stock</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Unit price <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="number" lang="en" min="0" value="" step="0.01" placeholder="Unit price" name="unit_price" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Discount <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="number" lang="en" min="0" value="0" step="0.01" placeholder="Discount" name="discount" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control " name="discount_type">
                                    <option value="amount">Flat</option>
                                    <option value="percent">Percent</option>
                                </select>
                            </div>
                        </div>
                        
                        <div id="show-hide-div">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">Quantity <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="number" lang="en" min="0" value="" step="1" placeholder="Quantity" name="current_stock" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">
                                    SKU
                                </label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="SKU" name="sku" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="sku_combination" id="sku_combination">

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Product Specification</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">                            
                            <textarea class="textEditor" name="specification"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Product Description</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <textarea class="textEditor" name="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">PDF Specification</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">PDF Specification</label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="" data-type="document">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control file-amount">Choose File</div>
                                    <input type="hidden" name="pdf" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
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
                                <input type="text" class="form-control" name="meta_title" placeholder="Meta Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Description</label>
                            <div class="col-md-8">
                                <textarea name="meta_description" rows="8" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">Meta Image</label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control file-amount">Choose File</div>
                                    <input type="hidden" name="meta_img" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Available Area</h5>
                </div>
                <div class="card-body">
                    <select class="select2 form-control" name="available_area[]" id="available_area" data-live-search="true"
                                data-selected-text-format="count" multiple>
                        <option value="">Select Type</option>
                        @foreach(\App\Models\Upazila::all() as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
					</select>
                </div>
            </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Low Stock Quantity Warning</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">
                                Quantity
                            </label>
                            <input type="number" name="low_stock_quantity" value="1" min="0" step="1" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            Stock Visibility State
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">Show Stock Quantity</label>
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <input type="radio" name="stock_visibility_state" value="quantity" checked>
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">Show Stock With Text Only</label>
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <input type="radio" name="stock_visibility_state" value="text">
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">Hide Stock</label>
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <input type="radio" name="stock_visibility_state" value="hide">
                                    <span></span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Cash On Delivery</h5>
                    </div>
                    <div class="card-body">
                        @if (get_setting('cash_payment') == '1')
                            <div class="form-group row">
                                <label class="col-md-6 col-from-label">Status</label>
                                <div class="col-md-6">
                                    <label class="mb-0">
                                        <input type="checkbox" name="cash_on_delivery" value="1" checked="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        @else
                            <p>
                                Cash On Delivery option is disabled. Activate this feature from here
                                <a href="{{route('activation.index')}}" class=" ">
                                    <span class="">Cash Payment Activation</span>
                                </a>
                            </p>
                        @endif
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Featured</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">Status</label>
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <input type="checkbox" name="featured" value="1">
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Todays Deal</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">Status</label>
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <input type="checkbox" name="todays_deal" value="1">
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Flash Deal</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">
                                Add To Flash
                            </label>
                            <select class="form-control " name="flash_deal_id" id="flash_deal">
                                <option value="">Choose Flash Title</option>
                                @foreach(\App\Models\FlashDeal::where("status", 1)->get() as $flash_deal)
                                    <option value="{{ $flash_deal->id}}">
                                        {{ $flash_deal->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">
                                Discount
                            </label>
                            <input type="number" name="flash_discount" value="0" min="0" step="1" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">
                                Discount Type
                            </label>
                            <select class="form-control " name="flash_discount_type" id="flash_discount_type">
                                <option value="">Choose Discount Type</option>
                                <option value="amount">Flat</option>
                                <option value="percent">Percent</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Estimate Shipping Time</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">Shipping Days <span class="text-danger">*</span> </label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="est_shipping_days" min="1" step="1" placeholder="Shipping Days" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">Days</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">VAT & Tax</h5>
                    </div>
                    <div class="card-body">
                        @foreach(\App\Models\Tax::where('tax_status', 1)->get() as $tax)
                        <label for="name">
                            {{$tax->name}}
                            <input type="hidden" value="{{$tax->id}}" name="tax_id[]">
                        </label>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="number" lang="en" min="0" value="0" step="0.01" placeholder="Tax" name="tax[]" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control " name="tax_type[]">
                                    <option value="amount">Flat</option>
                                    <option value="percent">Percent</option>
                                </select>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Warranty Type <span class="text-danger">*</span> </h5>
                    </div>
                    <div class="card-body">
                        <select class="form-control" name="warrenty_type" id="warrenty_type" data-live-search="true" required>
                            <option value="">Select Type</option>
                            @foreach ($warrentyType as $warrenty_T)
                                <option value="{{ $warrenty_T->name }}">{{ $warrenty_T->name }} Warranty</option>
                            @endforeach
						</select>
                    </div>
                </div>
                <div class="card warrenty_period">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Warranty Period <span class="text-danger">*</span> </h5>
                    </div>
                    <div class="card-body">
                        <select class="form-control" name="warrenty_period" id="warrenty_period" data-live-search="true">
                            <option value="">Select Type</option>
                            @foreach ($warrentyPeriod as $warrenty_P)
                                <option value="{{ $warrenty_P->name }}">{{ $warrenty_P->name }}</option>
                            @endforeach
						</select>
                    </div>
                </div>

            </div>
            <div class="col-12">
                <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type="submit" name="button" value="draft" class="btn btn-warning">Save As Draft</button>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="Third group">
                        <button type="submit" name="button" value="unpublish" class="btn btn-primary">Save & Unpublish</button>
                    </div>
                    <div class="btn-group" role="group" aria-label="Second group">
                        <button type="submit" name="button" value="publish" class="btn btn-success">Save & Publish</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('js')
<script type="text/javascript">
    $("[name=shipping_type]").on("change", function (){
        $(".product_wise_shipping_div").hide();
        $(".flat_rate_shipping_div").hide();
        if($(this).val() == 'product_wise'){
            $(".product_wise_shipping_div").show();
        }
        if($(this).val() == 'flat_rate'){
            $(".flat_rate_shipping_div").show();
        }

    });

    function add_more_customer_choice_option(i, name){
        $('#customer_choice_options').append('<div class="form-group row"><div class="col-md-3"><input type="hidden" name="choice_no[]" value="'+i+'"><input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="Choice Title" readonly></div><div class="col-md-8"><input type="text" class="form-control " name="choice_options_'+i+'[]" placeholder="Enter choice values" data-on-change="update_sku"></div></div>');

        SRM.plugins.tagify();
    }

    $('input[name="colors_active"]').on('change', function() {
        if(!$('input[name="colors_active"]').is(':checked')) {
            $('#colors').prop('disabled', true);
            SRM.plugins.bootstrapSelect('refresh');
        }
        else {
            $('#colors').prop('disabled', false);
            SRM.plugins.bootstrapSelect('refresh');
        }
        update_sku();
    });

    $('#colors').on('change', function() {
        update_sku();
    });

    $('input[name="unit_price"]').on('keyup', function() {
        update_sku();
    });

    $('input[name="name"]').on('keyup', function() {
        update_sku();
    });

    function delete_row(em){
        $(em).closest('.form-group row').remove();
        update_sku();
    }

    function delete_variant(em){
        $(em).closest('.variant').remove();
    }

    function update_sku(){
        $.ajax({
           type:"POST",
           url:'{{ route('sku_combination.products')}}',
           data:$('#choice_form').serialize(),
           success: function(data) {
                $('#sku_combination').html(data);
                SRM.uploader.previewGenerate();
                SRM.plugins.fooTable();
                if (data.length > 1) {
                   $('#show-hide-div').hide();
                }
                else {
                    $('#show-hide-div').show();
                }
           }
       });
    }

    $('#choice_attributes').on('change', function() {
        $('#customer_choice_options').html(null);
        $.each($("#choice_attributes option:selected"), function(){
            add_more_customer_choice_option($(this).val(), $(this).text());
        });
        
        update_sku();
    });

</script>
<script>
    $("#warrenty_type").change(function(){
        var id = $( "#warrenty_type option:selected" ).val();
        if(id != 'No'){
            $(".warrenty_period").show();
            // alert(id)
        }else{
            $(".warrenty_period").hide();
            // alert(id)
        }
    })
</script>

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
