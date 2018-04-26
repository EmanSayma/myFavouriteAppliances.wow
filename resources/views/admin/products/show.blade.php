@extends('admin.admin-layouts.master')

@section('content')
  <div class="row">
         <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <input type="hidden" name="product_id" id="product_id" value="{{$id}}">
                 
                <div class="card-content">
                  <h3>Product/ <span id="category"></span></h3>
                     <h3 ><strong id="name"></strong></h3>
                </h5>
               
                <h4>Price: <strong id="price"></strong></h4>
                <h4>Brand: <strong id="brand"></strong></h4>
                <h4>Stock: <strong id="stock"></strong></h4>
                <h4>Product Image : </h4>
                 <img style="width:50%" src=""><br/><br/>
                 <h4>Key Features : </h4>
                <p id="features"></p>
                <h4>Overview : </h4>
                <p id="overview"></p>


                <hr>

                  <a href="" id="url" class="btn btn-primary pull-right">Go To Product in Website</a>
                  <a href="/admin/products" class="btn btn-default pull-right">Back To Products</a>


               </div>

           </div>
       </div>
   </div>

@endsection

@section('scripts')
 
  
<script type="text/javascript" src="/js/functions/ajax-viewProduct.js"></script>
  
@endsection   

