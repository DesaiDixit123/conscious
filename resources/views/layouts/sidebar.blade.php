<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Conscious</title>
  <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('style.css') }}">



  <style>
    .treeview>a {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 15px;
      color: #333;
      cursor: pointer;
    }

    .treeview-menu {
      display: none;
      list-style: none;
      padding-left: 20px;
    }

    .treeview.active>.treeview-menu {
      display: block;
    }

    .treeview.active>a .fa-angle-right {
      transform: rotate(90deg);
      transition: transform 0.3s ease;
    }
  </style>
</head>

<body>

  <!-- Logo -->
  <div class="flapt-logo">
    <a href="/" class="logo-dark">
      <h4 style="color: #000">Conscious App</h4>
      <!--<img class="desktop-logo" src="img/core-img/logo.png" alt="Desktop Logo" />
	  <img class="small-logo" src="img/core-img/small-logo-light.png" alt="Mobile Logo" />-->
    </a>
  </div>

  <!-- Sidebar Navigation -->
  <div class="flapt-sidenav" id="flaptSideNav">
    <div class="side-menu-area">
      <nav>
        <ul class="sidebar-menu">
          <!-- <li class="menu-header-title">Main</li> -->
          <li><a href="{{ route('dashboard') }}"><i class="bx bx-home-heart"></i> Dashboard</a></li>
          {{-- ADMIN dropdown --}}
          @if(session('admin_logged_in'))
        <li class="treeview ">
        <a href="#">
          <i class="bx bx-user-circle me-2"></i>
          <span>Dashboard Users</span>
          <i class="fa fa-angle-right toggle-arrow"></i> {{-- Add toggle-arrow class --}}
        </a>
        <ul class="treeview-menu">
          <li><a href="/add-employee">Add Admins</a></li>
          <li><a href="/admin-list">Admins List</a></li>
          <li><a href="/operator-list">Operactors List</a></li>
        </ul>
        </li>
        <li class="treeview ">
        <a href="#">
          <i class="bx bx-user-circle me-2"></i>
          <span>Users</span>
          <i class="fa fa-angle-right toggle-arrow"></i> {{-- Add toggle-arrow class --}}
        </a>
        <ul class="treeview-menu">
          <li><a href="/add-user">Add User</a></li>
          <li><a href="/users-lists">User List</a></li>
      
        </ul>
        </li>
        <li><a href="/services1"> <i class="bx bx-cog"></i> Services</a></li>

      @endif

          {{-- EMPLOYEE dropdown --}}
          @if(session('employee_logged_in'))


            <li class="treeview ">
        <a href="#">
          <i class="bx bx-user-circle me-2"></i>
          <span>Users</span>
          <i class="fa fa-angle-right toggle-arrow"></i> {{-- Add toggle-arrow class --}}
        </a>
        <ul class="treeview-menu">
          <li><a href="/users-list">User List</a></li>
        
        </ul>
        </li>
       
      @endif

        </ul>
      </nav>
    </div>
  </div>

  <!-- JS -->
  <script src="{{ asset('js/jquery.min.js') }}"> </script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"> </script>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Treeview Toggle Script -->
  <script>
    $(document).ready(function () {
      $('.treeview > a').click(function (e) {
        e.preventDefault();
        var $menu = $(this).next('.treeview-menu');
        var $arrow = $(this).find('.toggle-arrow');

        // Close all other menus and reset arrows
        $('.treeview-menu').not($menu).slideUp();
        $('.toggle-arrow').not($arrow).removeClass('fa-angle-down').addClass('fa-angle-right');

        // Toggle current
        $menu.slideToggle();

        // Toggle arrow icon
        $arrow.toggleClass('fa-angle-right fa-angle-down');
      });
    });
  </script>

</body>

</html>