<div class="left_col scroll-view">
    <div class="navbar nav_title " style="border: 0; background-color:teal">
      <a href="index.html" class="site_title"> 
        <img src="{{ asset('template/images/a.png') }}" width="auto" height="30" alt="..." class="img-circle ">
        
        <span class="" style="color:rgb(36, 128, 0)">SIMONPRO</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="{{ asset('template/images/d.jpg') }}" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>M. Aan Saputro</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="/home">Dashboard</a></li>
              <li><a href="{{route('dashboard.produk')}}">Dashboard Produk</a></li>
            </ul>
          </li>
          <li><a href="{{ route('user') }}"><i class='fa fa-laptop'></i></i> Data Pengguna</a>
          </li>
          <li><a href="{{ route('pabrik') }}"><i class="fa fa-edit"></i> Data Pabrik</a>
          </li>
          <li><a href="{{ route('produk') }}"><i class="fa fa-laptop"></i> Data Produk</a>
          </li>
          <li><a href="{{ route('produkvarian') }}"><i class="fa fa-laptop"></i> Produk Varian</a>
          </li>
          <li><a href="{{ route('dataprodukharian') }}"><i class="fa fa-laptop"></i> Data Produk Harian</a>
          </li>
          <ul class="nav side-menu">
           <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
          <li><a href="{{ route('rekapdataproduk') }}"><i class="fa fa-laptop"></i> Rekap Data Produk</a>
          </li>
          <li><a href="{{ route('rekapdataprodukvarian') }}"><i class="fa fa-laptop"></i> Rekap Data Produk Varian</a>
          </li>
         
          
          
          
        </ul>
      </div>
      

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="/">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>