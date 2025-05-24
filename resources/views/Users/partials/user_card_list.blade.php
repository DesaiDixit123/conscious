<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title -->
    <title>Conscious App</title>
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Plugins File -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="scene">
            <div class="cube-wrapper">
                <div class="cube">
                    <div class="cube-faces">
                        <div class="cube-face shadow"></div>
                        <div class="cube-face bottom"></div>
                        <div class="cube-face top"></div>
                        <div class="cube-face left"></div>
                        <div class="cube-face right"></div>
                        <div class="cube-face back"></div>
                        <div class="cube-face front"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Preloader -->


    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="flapt-page-wrapper">
        <!-- Sidemenu Area -->
        <div class="flapt-sidemenu-wrapper">
            <!-- Logo -->


            <!-- Side Nav -->
            @include('layouts.sidebar')
        </div>
        <!-- Side Nav End -->

        <!-- Page Content -->
        <div class="flapt-page-content">
            <!-- Top Header Area -->
            @include('layouts.topbar')
            <!-- Main Content Area -->
            <div class="main-content">
                <div class="content-wraper-area">
                    <!-- Contact area Start -->
                    <div class="container-fluid">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="card ">
                                    <div class="card-body card-breadcrumb">
                                        <div class="page-title-box d-flex align-items-center justify-content-between">
                                            <h4 class="mb-0">User List</h4>
                                     
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  Single Cobntact Area -->
                      @foreach ($users as $user)
    <div class="col-sm-6 col-xl-3">
        <a href="{{ route('users.show', $user->id) }}" style="text-decoration: none; color: inherit;">
            <div class="card">
                <div class="card-body">
                    <div class="single-conatct--area text-center">
                        <div class="single-contact-area">
                            <div>
                                @if ($user->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="user"
                                        class="border-radius-50 mb-3"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('img/default-user.jpg') }}" alt="user"
                                        class="border-radius-50 mb-3"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                @endif
                            </div>
                            <h5 class="mb-1">{{ $user->name }}</h5>
                            <p class="mb-10 font-12 text-primary">{{ $user->email }}</p>
                            <div class="contact-address mt-15">
                                <p class="mb-2 font-15"><strong>Phone:</strong> {{ $user->phone_number }}</p>
                                <p class="mb-2 font-15"><strong>Status:</strong>
                                    <span class="badge {{ $user->verification_status == 'Verified' ? 'bg-success' : 'bg-warning' }}">
                                        {{ $user->verification_status }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endforeach



                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Must needed plugins to the run this Template -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/default-assets/setting.js"></script>
    <script src="js/default-assets/scrool-bar.js"></script>
    <script src="js/todo-list.js"></script>

    <!-- Active JS -->
    <script src="js/default-assets/active.js"></script>

</body>

</html>