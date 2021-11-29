@extends('backend.layouts.app')
@section('content')

<div class="text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h3">All products</h1>
        </div>
        @if($type != 'Seller')
        <div class="col text-right">
            <a href="{{ route('product.create') }}" class="btn btn-circle btn-info">
                <span>Add New Product</span>
            </a>
        </div>
        @endif
    </div>
</div>
<div class="card">
    <form class="" id="sort_products" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col text-center text-md-left">
                <h5 class="mb-md-0 h6">All Product</h5>
            </div>
            @if($type == 'Seller')
            <div class="col-md-2 ml-auto">
                <select class="form-control form-control-sm  mb-2 mb-md-0" id="user_id" name="user_id" onchange="sort_products()">
                    <option value="">All Sellers</option>
                    @foreach (App\Models\Seller::all() as $key => $seller)
                        @if ($seller->user != null && $seller->user->shop != null)
                            <option value="{{ $seller->user->id }}" @if ($seller->user->id == $seller_id) selected @endif>{{ $seller->user->shop->name }} ({{ $seller->user->name }})</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @endif
            @if($type == 'All')
            <div class="col-md-2 ml-auto">
                <select class="form-control form-control-sm  mb-2 mb-md-0" id="user_id" name="user_id" onchange="sort_products()">
                    <option value="">All Sellers</option>
                        @foreach (App\Models\User::where('user_type', '=', 'admin')->orWhere('user_type', '=', 'seller')->get() as $key => $seller)
                            <option value="{{ $seller->id }}" @if ($seller->id == $seller_id) selected @endif>{{ $seller->name }}</option>
                        @endforeach
                </select>
            </div>
            @endif
            <div class="col-md-2 ml-auto">
                <select class="form-control form-control-sm  mb-2 mb-md-0" name="type" id="type" onchange="sort_products()">
                    <option value="">Sort By</option>
                    <option value="rating,desc" @isset($col_name , $query) @if($col_name == 'rating' && $query == 'desc') selected @endif @endisset>Rating (High > Low)</option>
                    <option value="rating,asc" @isset($col_name , $query) @if($col_name == 'rating' && $query == 'asc') selected @endif @endisset>Rating (Low > High)</option>
                    <option value="num_of_sale,desc"@isset($col_name , $query) @if($col_name == 'num_of_sale' && $query == 'desc') selected @endif @endisset>Num of Sale (High > Low)</option>
                    <option value="num_of_sale,asc"@isset($col_name , $query) @if($col_name == 'num_of_sale' && $query == 'asc') selected @endif @endisset>Num of Sale (Low > High)</option>
                    <option value="unit_price,desc"@isset($col_name , $query) @if($col_name == 'unit_price' && $query == 'desc') selected @endif @endisset>Base Price (High > Low)</option>
                    <option value="unit_price,asc"@isset($col_name , $query) @if($col_name == 'unit_price' && $query == 'asc') selected @endif @endisset>Base Price (Low > High)</option>
                </select>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-0">
                    <input type="text" class="form-control form-control-sm" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="Type & Press Enter">
                </div>
            </div>
        </div>
    </form>
    <div class="card-body">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th >#</th>
                    <th width="30%">Name</th>
                    @if($type == 'Seller' || $type == 'All')
                        <th >Added By</th>
                    @endif
                    <th >Info</th>
                    <th >Total Stock</th>
                    <th >Todays Deal</th>
                    <th >Published</th>
                    <th >Featured</th>
                    <th  class="text-right">Options</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection