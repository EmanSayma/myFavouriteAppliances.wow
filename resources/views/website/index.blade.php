@extends('website.layouts.master')
@section('title',' Home Page')

@section('content')
 <!--header-->
        <header id="showcase">
           <h1>Welcome To <span style="color:#dc3545;">My Favourite Appliances.wow</span></h1>
           <p>Wo provide a wide collection of home small appliances and dishwashers .. browse our website to show the products </p>
        </header>          <!--End header-->

       @include('website.includes.slider')

        <!-- Section B-->
        <section id="section-b">
          <div class="container">
            <h4>Top Products in "Small Appliances"</h4>
            <div class="row col-md-offset-2">
              <div class="col-md-2 product-box">
                 <a href="">
                    <img src="/images/product1.jpg">
                    <h6>Lavazza A Modo Mio Dek Cremoso Decaf Capsules 8603</h6>
                    <span class="p-price">€4.85</span>
                 </a>                 
              </div>
              <div class="col-md-2 product-box">
                 <a href="">
                    <img src="/images/product1.jpg">
                    <h6>Lavazza A Modo Mio Dek Cremoso Decaf Capsules 8603</h6>
                    <span class="p-price">€4.85</span>
                 </a>                 
              </div>
              <div class="col-md-2 product-box">
                 <a href="">
                    <img src="/images/product1.jpg">
                    <h6>Lavazza A Modo Mio Dek Cremoso Decaf Capsules 8603</h6>
                    <span class="p-price">€4.85</span>
                 </a>                 
              </div>
              <div class="col-md-2 product-box">
                 <a href="">
                    <img src="/images/product1.jpg">
                    <h6>Lavazza A Modo Mio Dek Cremoso Decaf Capsules 8603</h6>
                    <span class="p-price">€4.85</span>
                 </a>                 
              </div>
              <div class="col-md-2 product-box">
                 <a href="">
                    <img src="/images/product1.jpg">
                    <h6>Lavazza A Modo Mio Dek Cremoso Decaf Capsules 8603</h6>
                    <span class="p-price">€4.85</span>
                 </a>                 
              </div>
              
            </div>
          </div>
        </section>
        <!--End Section B-->
        <!-- Section B-->
        <section id="section-b">
          <div class="container">
            <h4>Top Products in "Dishwashers"</h4>
            <div class="row col-md-offset-2">
              <div class="col-md-2 product-box">
                 <a href="">
                    <img src="/images/product1.jpg">
                    <h6>Lavazza A Modo Mio Dek Cremoso Decaf Capsules 8603</h6>
                    <span class="p-price">€4.85</span>
                 </a>                 
              </div>
              <div class="col-md-2 product-box">
                 <a href="">
                    <img src="/images/product1.jpg">
                    <h6>Lavazza A Modo Mio Dek Cremoso Decaf Capsules 8603</h6>
                    <span class="p-price">€4.85</span>
                 </a>                 
              </div>
              <div class="col-md-2 product-box">
                 <a href="">
                    <img src="/images/product1.jpg">
                    <h6>Lavazza A Modo Mio Dek Cremoso Decaf Capsules 8603</h6>
                    <span class="p-price">€4.85</span>
                 </a>                 
              </div>
              <div class="col-md-2 product-box">
                 <a href="">
                    <img src="/images/product1.jpg">
                    <h6>Lavazza A Modo Mio Dek Cremoso Decaf Capsules 8603</h6>
                    <span class="p-price">€4.85</span>
                 </a>                 
              </div>
              <div class="col-md-2 product-box">
                 <a href="">
                    <img src="/images/product1.jpg">
                    <h6>Lavazza A Modo Mio Dek Cremoso Decaf Capsules 8603</h6>
                    <span class="p-price">€4.85</span>
                 </a>                 
              </div>
              
            </div>
          </div>
        </section>
        <!--End Section B-->

        <!--Section C-->
        <section id="section-c">
          <div class="container">
            <div class="row">
              <div class="col-md-8 offset-md-2">
                 <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Taking The Hassle Out Of Buying Appliances
                          </button>
                        </h5>
                      </div>
                      <hr  class="card-header-line">  
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body"> No one likes buying home appliances, there, we said it! I mean, be honest, the only time you think about them is when you're renovating, or when that old machine packs it in. Then there's the added stress of buying one that's reliable, yet won't break the bank. We get it, buying an appliance is no fun!
                        </div>
                      </div>
                    </div>          
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            That's where we come in!
                          </button>
                        </h5>
                      </div>
                      <hr  class="card-header-line">  
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body"> You see, we’re online only, and this means no expensive storefronts or long queues to manage.  And that can only mean one thing...you guessed it: we only focus on you, our customer.  Our dedicated customer support team is available to give you the best advice out there.  They can be reached on 01-5312270 and operate Mon-Fri 8.00am–5.00pm and Saturday 8.30am–5:00pm. You can also reach our dedicated support team here </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Lowest Prices Guaranteed
                          </button>
                        </h5>
                      </div>
                      <hr  class="card-header-line">  
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                          With our Price Match Promise, you only pay the lowest price.  And if that wasn't enough, we'll also remove your old appliance, for free!  For extra peace of mind, we'll give you a 14-day 'cooling off' period on all our appliances.
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            The appliance store that delivers
                          </button>
                        </h5>
                      </div>
                      <hr  class="card-header-line">  
                      <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                          Our mission is to get your appliances direct to you as fast and convenient as possible. We’ll deliver your large electrical appliances faster than anyone in Ireland, FACT!  We're the only large appliance retailer that lets you choose your day of delivery. And for all weekday orders, we'll deliver to you next day. For all small appliances, we use the trusted services of An Post.
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>          
        </section>
         <!--End Section C-->
@endsection