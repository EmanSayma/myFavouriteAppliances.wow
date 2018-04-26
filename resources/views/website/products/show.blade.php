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
			     <li class="breadcrumb-item"><a href="/products/{{ $category->name }}">{{ $product->category->name }}</a></li>
			     <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
			   </ol>
			</nav>
	    </div>
	    <div class="row">
	    	<div class="col-md-8">
	    		<h3>{{ $product->name }}</h3>
	    		<div class="row">
	    			<div class="col-md-8 offset-md-2">
						<img id="zoom_01" src="/storage/cover_images/{{ $product->cover_image }}" data-zoom-image="/storage/cover_images/{{ $product->cover_image }}" style="width:100%" />
					</div>
				</div>
	    	</div>
	    	<div class="col-md-4 product-details">
	    		<h1>€ {{ $product->price }}</h1>
	    		<a href="#" class="btn btn-success btn-block btn-lg btn-buy">
	    		  <span><strong>Buy Now</strong></span>
				  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
				</a>
	    		<h2 class="stock"><i class="fa fa-check-circle"></i><strong>In Stock</strong></h2>
	    		<h3 class="brand">{{ $product->brand }}</h3>
	    		<h3 class="features-h">Key Features : </h3>
				<p >{!! $product->features !!}</p>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-md-8">
	    		<nav>
				  <div class="nav nav-tabs" id="nav-tab" role="tablist">
				    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-info-circle"></i>Overview</a>
				    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-star"></i>Reviews</a>
				  </div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
				  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				  	<h5>Overview</h5>
				  	<p>
				  		{!! $product->overview !!}
				  	</p>
				  </div>
				  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                     <div class="row">
                     	<br>
                     	<div class="col-md-8">
                     		<h5>Reviews</h5>
                     	</div>
                     	<div class="col-md-4">
                     		<button class="btn btn-success ">Write a Review</button>
                     	</div>
                     </div>
				  </div>
				</div>
	    	</div>
	    </div>
      </div>
  </section>
@endsection

@section('scripts')
<script src="/js/libraries/jquery.elevateZoom-3.0.8.min.js"></script>
<script type="text/javascript">
    $("#zoom_01").elevateZoom({
  zoomType				: "lens",
  lensShape : "round",
  lensSize    : 200

   });
 
</script>
@endsection