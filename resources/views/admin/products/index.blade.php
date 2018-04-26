@extends('admin.admin-layouts.master')

@section('content')

<div class="row">
	<div class="col-md-8"><h3>Products</h3></div>
	<div class="col-md-4">
		<button type="button" name="add" id="add_product" class="btn btn-primary pull-right">Create New Product</button>
	</div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Latest Products</h4>
        </div>
        <div class="card-content table-responsive">
            <table class="table" id="products_table">
                <thead class="text-primary">
                    <th><a id="bulk_delete" name="bulk_delete" class="btn btn-danger btn-simple btn-xs" href="#" rel="tooltip" title="Delete Multiple Products"><i class="material-icons">close</i></a></th>
                    <th>Product Name</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>

        @include('admin.products.products_model')
    </div>
</div>
</div>

@endsection

@section('scripts')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="/js/libraries/sweetalert.min.js"></script>
<script src="/js/libraries/validator.js"></script>
<script src="/js/libraries/bootstrap-filestyle.min.js"></script>
<script type="text/javascript" src="/js/functions/ajax-products.js"></script>
@endsection