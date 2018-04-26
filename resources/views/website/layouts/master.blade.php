<!doctype html>
<html lang="en">
  <head>
      @include('website.includes.header')
  </head>
   <body>
    
    <div id="app">
      @include('website.includes.nav')

        @yield('content')
     </div>
        @include('website.includes.footer')



  </body>
</html>
