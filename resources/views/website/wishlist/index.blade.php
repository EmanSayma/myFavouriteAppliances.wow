@extends('website.layouts.master')
@section('title', 'My Wishlist')

@section('content')
<section id="product-page">
   	       @include('website.includes.slider')
      <div class="container">
      	<div class="row">
	      	 <nav aria-label="breadcrumb">
			   <ol class="breadcrumb">
			     <li class="breadcrumb-item"><a href="/">Home</a></li>
			     <li class="breadcrumb-item active" aria-current="page">My Wishlist</li>
			   </ol>
			</nav>
	    </div>
	    <div class="row">
	    		<h5>My Wishlist products</h5>
	    </div>
	    <hr>
	    <div class="product-list">
	    	@foreach($wishlists as $wishlist)
		    <div class="row product-list-item">
		    	<div class="col-md-3">
		    		<img src="/storage/cover_images/{{ $wishlist->cover_image }}"  style="width:80%" />
		    	</div>
		    	<div class="col-md-3">
		    		<h3 class="brand">{{ $wishlist->brand }}</h3>
		    		<h5>{{ $wishlist->name }}</h5>
		    		<p>{!! $wishlist->features !!}</p>
		    	</div>
		    	<div class="col-md-3">
		    		<h3>€ {{ $wishlist->price }}</h3>
		    		<a href="#" class="btn btn-success btn-block btn-lg btn-buy">
		    		  <span>Buy Now</span>
					  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</a>
					<a href="#" class="btn btn-primary btn-block btn-lg">
		    		  <span>Share this product</span>
					  <i class="fa fa-share" aria-hidden="true"></i>
					</a>
					<a href="/products/{{ $wishlist->cat_slug }}/{{ $wishlist->slug }}">Learn More</a>
		    	</div>
		    </div>
		    @endforeach
	    </div>
	    <hr>
	    
	  </div>  	
	</div>
</section>

@endsection
