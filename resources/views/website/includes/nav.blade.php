<!-- Nav-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand mr-2" href="/">
    <img src="/images/logo.png" width="200" height="60" class="d-inline-block align-top" alt="MyFavouriteAppliances.wow">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <form class="form-inline my-2 mr-sm-2">
      <input class="form-control mr-sm-0 search-input" type="search" placeholder="Search For Products" aria-label="Search">
      <button class="btn btn-outline-danger my-2 my-sm-0 btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
    
    <div class="navbar-nav right-nav-items">
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle btn-with-icon" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-th ml-4"></i><br>
           Categories
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/products/small-appliances">Small Appliances</a>
            <a class="dropdown-item" href="/products/dishwashers">Dishwashers</a>
          </div>
        </li>
      @if (Route::has('login'))
            @auth
                <a href="{{ url('wishlist') }}" class="btn btn-default btn-with-icon"><i class="fa fa-heart"></i><br>Wishlist</a>               
                <a href="{{ route('logout') }}" class="btn btn-default btn-with-icon"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             <i class="fa fa-sign-out"></i><br>
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                                   
            @else
                <a href="{{ route('login') }}"  class="btn btn-default  btn-with-icon"><i class="fa fa-user-circle"></i> <br>Login/Register</a>
                <a href="" class="btn btn-default btn-with-icon"><i class="fa fa-shopping-cart"></i> <br>Your Cart</a>
            @endauth
      @endif
    </div>
  </div>
</nav> <!--End Nav-->
