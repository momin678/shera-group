@extends('backend.layouts.app')
@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
		<h1 class="h3">All Attributes</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-7">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">Attributes</h5>
			</div>
			<div class="card-body">
				<table class="table aiz-table mb-0">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th class="text-right">Options</th>
						</tr>
					</thead>
					<tbody>
						@foreach($attributes as $key => $attribute)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$attribute->name}}</td>
								<td class="text-right">
									<a class="btn btn-info btn-sm" href="{{route('attributes.edit',$attribute->id)}}">
                                        <i class="fas fa-pencil-alt"> </i>
                                      </a>
                                      <a href="#" 
                                        data-id={{$attribute->id}}
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
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">Add New Attribute</h5>
			</div>
			<div class="card-body">
                <form action="{{ route('attributes.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" placeholder="Name" id="name" name="name" class="form-control" required>
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
                <form action="{{ route('admin.attribute-delete') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <input id="id" type="hidden" name="attribute_id" value="">
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
<script>
    $(document).on('click','.delete',function(){
            let id = $(this).attr('data-id');
            $('#id').val(id);
    });
</script>
@endsection 