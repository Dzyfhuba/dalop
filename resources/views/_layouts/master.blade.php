<!DOCTYPE html>
<html lang="en">
  <head>
    @include('_includes.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          @include('_includes.sidebar')
        </div>

        <!-- top navigation -->
      @include('_includes.navbar')
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
      @include('_includes.footer')
    </div>
  </div>
  </body>
</html>
