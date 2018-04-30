@extends('website.layouts.master')
@section('title', 'products')

@section('content')
<section id="product-page">
   	       @include('website.includes.slider')
      <div class="container">
      	<div class="row">
	      	 <nav aria-label="breadcrumb">
			   <ol class="breadcrumb">
			     <li class="breadcrumb-item"><a href="/">Home</a></li>
			     <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
			   </ol>
			</nav>
	    </div>
	    <div class="row">
	    	<div class="col-md-9">
	    		<h5>Found {{count($category->products) }} products</h5>
	    	</div>
	    	<div class="col-md-3">
	    		<select onchange="" class="form-control" name="arrange_method" id="arrange_method">
	    		   <option value="">Select...</option>
	    		   <option value='/products/{{ $category->cat_slug }}?field="price"&order="desc"'>Price High to Low</option>
	    		   	<option value='/products/{{ $category->cat_slug }}?field="price"&order="asc"'>Price Low to High</option>          
	    		   <option value='/products/{{ $category->cat_slug }}?field="name"&order="asc"'>Alphabetical order of Products</option>          
          
	            </select>
	    	</div>
	    </div>
	    <hr>
	@if(count($products) > 0)
	    <div>
	    <div class="product-list">
	    	@foreach($products as $product)
		    <div class="row product-list-item">
		    	<div class="col-md-3">
		    		<img src="/storage/cover_images/{{ $product->cover_image }}"  style="width:80%" />
		    	</div>
		    	<div class="col-md-3">
		    		<h3 class="brand">{{ $product->brand }}</h3>
		    		<h5>{{ $product->name }}</h5>
		    		<p>{!! $product->features !!}</p>
		    	</div>
		    	<div class="col-md-3">
		    		<h3>€ {{ $product->price }}</h3>
		    		<a href="#" class="btn btn-success btn-block btn-lg btn-buy">
		    		  <span>Buy Now</span>
					  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</a>
					<a href="/products/{{ $category->cat_slug }}/{{ $product->slug }}">Learn More</a>
		    	</div>
		    </div>
		    @endforeach
	    </div>
	    <hr>
	    <div class="row">
	       <div class="text-center">
            {{$products->links()}}
           </div>
        </div>
    </div>
    @else
		 <h1>No products found</h1>
	 @endif
        
	  </div>  	
	</div>
</section>

@endsection

@section('scripts')
<script src="/js/functions/product-arrange.js"></script>
<script src="/js/functions/ajax-wishlist.js"></script>
@endsection