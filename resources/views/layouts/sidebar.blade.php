<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Conscious</title>
  <link rel="icon" href="img/core-img/favicon.ico">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="style.css">

  <style>
    .treeview > a {
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

    .treeview.active > .treeview-menu {
      display: block;
    }

    .treeview.active > a .fa-angle-right {
      transform: rotate(90deg);
      transition: transform 0.3s ease;
    }
  </style>
</head>

<body>

  <!-- Logo -->
  <div class="flapt-logo">
    <a href="/dashboard" class="logo-dark">
      <img class="desktop-logo" src="img/core-img/logo.png" alt="Desktop Logo" />
      <img class="small-logo" src="img/core-img/small-logo-light.png" alt="Mobile Logo" />
    </a>
  </div>

  <!-- Sidebar Navigation -->
  <div class="flapt-sidenav" id="flaptSideNav">
    <div class="side-menu-area">
      <nav>
        <ul class="sidebar-menu">

          {{-- ADMIN dropdown --}}
          @if(session('admin_logged_in'))
          <li class="treeview">
            <a href="#">
              <span><i class="bx bx-user-circle"></i> Employees</span>
              <i class="fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="/add-employee">Add Employee</a></li>
              <li><a href="/employees">Employee List</a></li>
            </ul>
          </li>
          @endif

          {{-- EMPLOYEE dropdown --}}
          @if(session('employee_logged_in'))
          <li class="treeview active">
            <a href="#">
              <span><i class="bx bx-user"></i> Users</span>
              <i class="fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="/users">User List</a></li>
            </ul>
          </li>
          @endif

        </ul>
      </nav>
    </div>
  </div>

  <!-- JS -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- Dropdown Toggle Logic -->
  <script>
    $(document).ready(function () {
      // Handle dropdown toggle
      $('.treeview > a').on('click', function (e) {
        e.preventDefault();

        const parent = $(this).parent();

        // Close all other dropdowns
        $('.treeview').not(parent).removeClass('active').find('.treeview-menu').slideUp();

        // Toggle clicked dropdown
        parent.toggleClass('active');
        parent.find('.treeview-menu').slideToggle();
      });

      // Keep active dropdown open on page load
      $('.treeview.active .treeview-menu').show();
    });
  </script>
</body>
</html>
