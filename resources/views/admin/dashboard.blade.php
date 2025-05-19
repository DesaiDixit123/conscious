<!doctype html>
<html lang="en">


<!-- Mirrored from demo.riktheme.com/flohan/side-menu/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Mar 2025 19:16:08 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Title -->
  <title>conscious</title>
  <!-- Favicon -->
  <link rel="icon" href="img/core-img/favicon.ico">
  <!-- Plugins File -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
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
  
      <!-- Page Content -->
      <div class="flapt-page-content">
        <!-- Top Header Area -->
      @include('layouts.topbar') 

      <!-- Main Content Area -->
      <div class="main-content">
        <div class="content-wraper-area">
          <div class="dashboard-area">
            <div class="container-fluid">
              <div class="row g-4">
                <!-- Card Widget -->
                <div class="col-lg-4 col-xxl-3">
                  <div class="card mb-25">
                    <div class="card-body">
                      <div class="d-flex flex-wrap justify-content-between mb-3">
                        <h6 class="card-title">Pageviews</h6>
                        <p class="mb-0">
                          <small>Last 7 days</small>
                        </p>
                      </div>
                      <div class="widget-content">
                        <div id="pageViews"></div>
                      </div>
                    </div>
                  </div>

                  <div class="card mb-25">
                    <div class="card-body">
                      <div class="d-flex flex-wrap justify-content-between mb-3">
                        <h6 class="card-title">Revenue</h6>
                        <p class="mb-0">
                          <small>Last 7 days</small>
                        </p>
                      </div>
                      <div class="widget-content">
                        <div id="revenueBar"></div>
                      </div>
                    </div>
                  </div>

                  <!-- Widget Content -->
                  <div class="card widget-new-content">
                    <div class="card-body">
                      <div class="widget-stats d-flex justify-content-between mb-3">
                        <div class="widget-content-text">
                          <h6 class="mb-0">Profits</h6>
                          <p class="mb-0">Customer Value</p>
                        </div>
                        <h6 class="mb-0 text-success">$472.63</h6>
                      </div>

                      <span class="progress-description mb-1 d-block">25% Up</span>
                      <div class="progress h-5">
                        <div class="progress-bar w-25 bg-success" role="progressbar" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Chart -->
                <div class="col-lg-8 col-xxl-9">
                  <div class="card mb-25">
                    <div class="card-body">
                      <div class="card-title">
                        <h4>Active Users
                        </h4>
                      </div>
                      <div class="chart-area">
                        <div id="apexChartD"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Todo -->
                <div class="col-md-6 col-lg-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title">
                        <h4 class=" mb-1">Task To do</h4>
                        <p>Task assigned to me</p>
                      </div>

                      <div class="quick-setting-tab">
                        <div class="widgets-todo-list-area">
                          <form id="form-todo-list">
                            <ul id="flaptToDo-list" class="todo-list">
                              <li>
                                <label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                    value="test" /><span></span></label>Go to Market
                                <i class="todo-item-delete ti-close"></i>
                              </li>

                              <li>
                                <label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                    value="hello" /><span></span></label>Meeting with AD
                                <i class="todo-item-delete ti-close"></i>
                              </li>

                              <li>
                                <label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                    value="hello" /><span></span></label>Check Mail
                                <i class="todo-item-delete ti-close"></i>
                              </li>

                              <li>
                                <label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                    value="hello" /><span></span></label>Work for Theme
                                <i class="todo-item-delete ti-close"></i>
                              </li>

                              <li>
                                <label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                    value="hello" /><span></span></label>Create a Plugin
                                <i class="todo-item-delete ti-close"></i>
                              </li>

                              <li>
                                <label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                    value="hello" /><span></span></label>Fixed Template Issues
                                <i class="todo-item-delete ti-close"></i>
                              </li>
                            </ul>
                          </form>

                          <form id="form-add-todo" class="form-add-todo">
                            <input type="text" id="new-todo-item" class="new-todo-item" name="todo"
                              placeholder="Add New" />
                            <input type="submit" id="add-todo-item" class="add-todo-item" value="+" />
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title">
                        <h4 class="mb-1">Upcoming Analytics</h4>
                        <p class="mb-0">Updated 37 minutes ago
                        </p>
                      </div>
                      <div class="transaction-area" id="listCard1">
                        <div class="d-flex flex-row list-group-item  justify-content-between">
                          <div class="media d-flex justify-content-center align-items-center">
                            <div class="icon-section bg-success-soft">
                              <i class="fa fa-file-code-o"></i>
                            </div>
                            <div class="media-body">
                              <h6 class="mb-1">New Users</h6>
                              <p class="mb-0 font-12">6 June 24 10:25 AM</p>
                            </div>
                          </div>

                          <div class="amount txt-gray-5">
                            <p class="mb-0 text-dark font-13">57,000</p>
                          </div>
                        </div>

                        <div class="d-flex flex-row list-group-item  justify-content-between">
                          <div class="media d-flex justify-content-center align-items-center">
                            <div class="icon-section text-bg-danger-soft">
                              <i class="fa fa-newspaper-o"></i>
                            </div>
                            <div class="media-body">
                              <h6 class="mb-1">Page Views</h6>
                              <p class="mb-0 font-12">9 July 24 03:43 Pm</p>
                            </div>
                          </div>

                          <div class="amount txt-gray-5">
                            <p class="mb-0 text-dark font-13">7,496</p>
                          </div>
                        </div>

                        <div class="d-flex flex-row list-group-item  justify-content-between">
                          <div class="media d-flex justify-content-center align-items-center">
                            <div class="icon-section bg-success-soft">
                              <i class="fa fa-clone"></i>
                            </div>
                            <div class="media-body">
                              <h6 class="mb-1">Latest reviews</h6>
                              <p class="mb-0 font-12">6 April 24 02:34 PM</p>
                            </div>
                          </div>

                          <div class="amount txt-gray-5">
                            <p class="mb-0 text-dark font-13">47,381</p>
                          </div>
                        </div>

                        <div class="d-flex flex-row list-group-item  justify-content-between">
                          <div class="media d-flex justify-content-center align-items-center">
                            <div class="icon-section text-bg-danger-soft">
                              <i class="icon-wallet"></i>
                            </div>
                            <div class="media-body">
                              <h6 class="mb-1">Click Through</h6>
                              <p class="mb-0 font-12">22 January 24 07:21 AM</p>
                            </div>
                          </div>

                          <div class="amount txt-gray-5">
                            <p class="mb-0 text-dark font-13">46,894</p>
                          </div>
                        </div>
                        <div class="d-flex flex-row list-group-item  justify-content-between">
                          <div class="media d-flex justify-content-center align-items-center">
                            <div class="icon-section text-bg-danger-soft">
                              <i class="fa fa-newspaper-o"></i>
                            </div>
                            <div class="media-body">
                              <h6 class="mb-1">Paying vs non paying</h6>
                              <p class="mb-0 font-12">9 July 24 03:43 Pm</p>
                            </div>
                          </div>

                          <div class="amount txt-gray-5">
                            <p class="mb-0 text-dark font-13">79,496</p>
                          </div>
                        </div>

                        <div class="d-flex flex-row list-group-item  justify-content-between">
                          <div class="media d-flex justify-content-center align-items-center">
                            <div class="icon-section bg-success-soft">
                              <i class="fa fa-clone"></i>
                            </div>
                            <div class="media-body">
                              <h6 class="mb-1">Top coupons</h6>
                              <p class="mb-0 font-12">6 April 24 02:34 PM</p>
                            </div>
                          </div>

                          <div class="amount txt-gray-5">
                            <p class="mb-0 text-dark font-13">47,381</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title">
                        <h4 class="mb-1">Source Visits
                        </h4>
                        <p>Total 58.2k Visitors</p>
                      </div>
                      <div class="source-area" id="listCard">
                        <!-- Single Card -->
                        <div class="source-list-card d-flex flex-row  align-items-center justify-content-between">
                          <div class="source-list d-flex justify-content-center align-items-center">
                            <div class="source-icon-section">
                              <i class='bx bx-mouse-alt'></i>
                            </div>
                            <div class="source-media-body">
                              <h6 class="mb-1">Social Network</h6>
                              <p class="mb-0">Social Channels</p>
                            </div>
                          </div>

                          <div class="user-total-per">
                            <p class="mb-0">57,0000</p>
                            <span class="text-success">+3.2%</span>
                          </div>
                        </div>

                        <!-- Single Card -->
                        <div class="source-list-card d-flex flex-row  align-items-center justify-content-between">
                          <div class="source-list d-flex justify-content-center align-items-center">
                            <div class="source-icon-section">
                              <i class='bx bx-message-dots'></i>
                            </div>
                            <div class="source-media-body">
                              <h6 class="mb-1">
                                Email Newsletter</h6>
                              <p class="mb-0">Newsletter</p>
                            </div>
                          </div>

                          <div class="user-total-per">
                            <p class="mb-0">23,0000</p>
                            <span class="text-danger">-3.2%</span>
                          </div>
                        </div>

                        <!-- Single Card -->
                        <div class="source-list-card d-flex flex-row  align-items-center justify-content-between">
                          <div class="source-list d-flex justify-content-center align-items-center">
                            <div class="source-icon-section">
                              <i class='bx bx-notepad'></i>
                            </div>
                            <div class="source-media-body">
                              <h6 class="mb-1">Direct Source</h6>
                              <p class="mb-0">Social Channels</p>
                            </div>
                          </div>

                          <div class="user-total-per">
                            <p class="mb-0">57,0000</p>
                            <span class="text-success">+3.2%</span>
                          </div>
                        </div>

                        <!-- Single Card -->
                        <div class="source-list-card d-flex flex-row  align-items-center justify-content-between">
                          <div class="source-list d-flex justify-content-center align-items-center">
                            <div class="source-icon-section">
                              <i class='bx bx-mouse-alt'></i>
                            </div>
                            <div class="source-media-body">
                              <h6 class="mb-1">Social Network</h6>
                              <p class="mb-0">Social Channels</p>
                            </div>
                          </div>

                          <div class="user-total-per">
                            <p class="mb-0">57,0000</p>
                            <span class="text-success">+3.2%</span>
                          </div>
                        </div>

                        <!-- Single Card -->
                        <div class="source-list-card d-flex flex-row  align-items-center justify-content-between">
                          <div class="source-list d-flex justify-content-center align-items-center">
                            <div class="source-icon-section">
                              <i class='bx bx-memory-card'></i>
                            </div>
                            <div class="source-media-body">
                              <h6 class="mb-1">
                                Other News</h6>
                              <p class="mb-0">Newsletter</p>
                            </div>
                          </div>

                          <div class="user-total-per">
                            <p class="mb-0">23,0000</p>
                            <span class="text-danger">-3.2%</span>
                          </div>
                        </div>


                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="mb-30 d-flex align-items-center justify-content-between">
                        <h6 class="mb-0">Transaction Summary</h6>
                        <div class="dashboard-dropdown">
                          <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dashboardDropdown53"
                              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="ti-more"></i></button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dashboardDropdown53">
                              <a class="dropdown-item" href="#"><i class="ti-pencil-alt"></i>
                                Edit</a>
                              <a class="dropdown-item" href="#"><i class="ti-settings"></i>
                                Settings</a>
                              <a class="dropdown-item" href="#"><i class="ti-eraser"></i>
                                Remove</a>
                              <a class="dropdown-item" href="#"><i class='bx bx-trash'></i> Delete</a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="table-responsive text-nowrap rounded-3">
                        <table class="table table-hover mb-0">
                          <thead class="bg-info-subtle">
                            <tr>
                              <th>Number</th>
                              <th>Code</th>
                              <th>Date</th>
                              <th>Budget</th>
                              <th>Status</th>
                              <th class="text-right">Ratings</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>#367</td>
                              <td>8965482</td>
                              <td>Nov 14, 2025</td>
                              <td>$7523</td>
                              <td><a href="#!" class="badge text-bg-success badge-pill">Active</a>
                              </td>
                              <td class="text-right"><a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                              </td>
                            </tr>
                            <tr>
                              <td>#366</td>
                              <td>2366482</td>
                              <td>Nov 13, 2025</td>
                              <td>$2334</td>
                              <td><a href="#!" class="badge text-bg-danger badge-pill">Not
                                  Active</a></td>
                              <td class="text-right"><a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                              </td>
                            </tr>
                            <tr>
                              <td>#856</td>
                              <td>8832638</td>
                              <td>Oct 14, 2025</td>
                              <td>$2346</td>
                              <td><a href="#!" class="badge text-bg-success badge-pill">Active</a>
                              </td>
                              <td class="text-right"><a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                              </td>
                            </tr>
                            <tr>
                              <td>#326</td>
                              <td>9632638</td>
                              <td>Dec 17, 2025</td>
                              <td>$1346</td>
                              <td><a href="#!" class="badge text-bg-danger badge-pill">Not
                                  Active</a></td>
                              <td class="text-right"><a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                              </td>
                            </tr>
                            <tr>
                              <td>#589</td>
                              <td>3332538</td>
                              <td>July 14, 2025</td>
                              <td>$3246</td>
                              <td><a href="#!" class="badge text-bg-success badge-pill">Active</a>
                              </td>
                              <td class="text-right"><a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Footer Area -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Footer Area -->
              <footer class="footer-area d-sm-flex justify-content-center align-items-center justify-content-between">
                <!-- Copywrite Text -->
                <div class="copywrite-text">
                  <p class="font-13">Developed by &copy; <a href="#">Frajin</a></p>
                </div>
                <div class="fotter-icon text-center">
                  <p class="mb-0 font-13">2025 &copy; FlohanAdmin</p>
                </div>
              </footer>
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

  <!-- These plugins only need for the run this page -->
  <script src="js/apexcharts.min.js"></script>
  <script src="js/dashboard-custom-sass.js"></script>

</body>


<!-- Mirrored from demo.riktheme.com/flohan/side-menu/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Mar 2025 19:16:08 GMT -->
</html>