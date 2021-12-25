@extends('backend.layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
			<h1 class="h3">All Brands</h1>
	</div>
</div>

<div class="row">
	<div class="col-md-7">
		<div class="card">
		    <div class="card-header row gutters-5">
				<div class="col text-center text-md-left">
					<h5 class="mb-md-0 h6">Brands</h5>
				</div>
				<div class="col-md-4">
					<form class="" id="sort_brands" action="" method="GET">
						<div class="input-group input-group-sm">
					  		<input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="Type name & Press Enter Button">
						</div>
					</form>
				</div>
		    </div>
		    <div class="card-body">
		        <table class="table aiz-table mb-0">
		            <thead>
		                <tr>
		                    <th>#</th>
		                    <th>Name</th>
		                    <th>Logo</th>
                            <th>Active</th>
		                    <th class="text-right">Options</th>
		                </tr>
		            </thead>
		            <tbody>
		                @foreach($brands as $key => $brand)
		                    <tr>
		                        <td>{{ ($key+1) + ($brands->currentPage() - 1)*$brands->perPage() }}</td>
		                        <td>{{ $brand->name }}</td>
								<td>
                                    @if ($brand->logo)
                                    <img alt="logo" class="table-avatar" src="{{asset('images/brand')}}/{{$brand->logo}}" width="30">
                                    @else
                                        ------
                                    @endif
		                        </td>
                                <td>
                                    <label class="mb-0">
                                        <input type="checkbox" value="{{$brand->id}}" onchange="update_active(this)" name="my-checkbox" {{$brand->status == 1 ? 'checked' : 'unchecked' }} data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                    </label>
                                </td>
		                        <td class="text-right">
		                            <a class="btn btn-info btn-sm" href="{{route('brand.edit',$brand->id)}}">
                                        <i class="fas fa-pencil-alt"> </i>
                                      </a>
                                      <a href="#" 
                                        data-id={{$brand->id}}
                                        data-toggle="modal" 
                                        data-target="#deleteModal"
                                        class="btn btn-danger btn-sm delete">
                                        <i class="fas fa-trash"></i>
                                      </a>
		                        </td>
		                    </tr>
		                @endforeach
		            </tbody>
		        </table>
		        <div class="aiz-pagination">
                	{{ $brands->appends(request()->input())->links() }}
            	</div>
		    </div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">Add New Brand</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group mb-3">
						<label for="name">Name</label>
						<input type="text" placeholder="Brand Name" name="name" class="form-control" required>
					</div>
					<div class="form-group mb-3">
						<label for="name">Logo <small>(120x80)</small></label>
						<div class="input-group" data-toggle="" data-type="image">
							<div class="custom-file">
                                <input type="file" name="logo" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
						</div>
					</div>
					<div class="form-group mb-3">
						<label for="name">Meta Title</label>
						<input type="text" class="form-control" name="meta_title" placeholder="Meta Title">
					</div>
					<div class="form-group mb-3">
						<label for="name">Meta Description</label>
						<textarea name="meta_description" rows="5" class="form-control"></textarea>
					</div>
					<div class="form-group mb-3 text-right">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div  id="deleteModal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">Delete Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <form action="{{ route('admin.brand-delete') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input id="id" type="hidden" name="brand_id" value="">
                    <p class="mt-1">Are you sure to delete this?</p>                  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js' ) }}"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script>  
function update_active(el){
    if(el.checked){
      var status = 1;
    }else{
      var status = 0;
    }
    $.post(
    '{{route("admin.brand.active")}}',
      {_token:'{{ csrf_token() }}', id:el.value, status:status},
      function(data){
        if(data == 1){
          SRM.plugins.notification('success', 'Brand updated successfully');
        }
        else{
          SRM.plugins.notification('danger', 'Something went wrong');
        }
      });
  	}
  	$("input[data-bootstrap-switch]").each(function(){
		$(this).bootstrapSwitch('state', $(this).prop('checked'));
	});
    $(document).on('click','.delete',function(){
         let id = $(this).attr('data-id');
         $('#id').val(id);
    });
</script>
@endsection
