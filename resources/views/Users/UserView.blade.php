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

    <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
    <link rel="stylesheet" href="style.css">
    <!-- Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body card-breadcrumb">
                                        <div class="page-title-box d-flex align-items-center justify-content-between">
                                            <h4 class="mb-0">User Profile</h4>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-sm-flex align-items-top profile-user-header main-profile-cover">
                                            <div>
                                                @if ($user->avatar)
                                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="user"
                                                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%; margin-left:75px ;">
                                                @else
                                                    <img src="{{ asset('img/default-user.jpg') }}" alt="user"
                                                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                                                @endif
                                            </div>


                                        </div>
                                        <div class="pt-4 pb-4 border-bottom ">


                                            <div class="personal-info-area">
                                                <p class="mb-2 text-dark">Personal Info:</p>
                                                <ul class="list-group personal-data">
                                                    <li class="list-group-item">
                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <div class="me-2"> Name : </div> <span
                                                                class="text-muted">{{ $user->name }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <div class="me-2"> Email : </div> <span
                                                                class="text-muted">{{ $user->email }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <div class="me-2"> Phone : </div> <span
                                                                class="text-muted">{{ $user->phone_number }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <div class="me-2"> Status : </div> <span
                                                                class="text-muted">{{ $user->verification_status }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <div class="me-2"> Address : </div> <span
                                                                class="text-muted">{{ $user->address }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <div class="me-2">Pan Card :</div>
                                                            @if($user->pan_card_image)
                                                                <img src="{{ asset('storage/' . $user->pan_card_image) }}"
                                                                    alt="Pan Card" style="max-width: 100px; height: auto;">
                                                            @else
                                                                <span class="text-muted">Not uploaded</span>
                                                            @endif
                                                        </div>
                                                    </li>

                                                    <li class="list-group-item">
                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <div class="me-2">Aadhar Card :</div>
                                                            @if($user->aadhaar_image)
                                                                <img src="{{ asset('storage/' . $user->aadhaar_image) }}"
                                                                    alt="Aadhar Card"
                                                                    style="max-width: 100px; height: auto;">

                                                            @else
                                                                <span class="text-muted">Not uploaded</span>
                                                            @endif
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div
                                            class="d-md-flex align-items-center justify-content-between profile-body-header">
                                            <ul class="nav nav-tabs justify-content-start profile-body-tabs" id="myTab"
                                                role="tablist">
                                                <li class="nav-item" role="presentation"> <button
                                                        class="nav-link active" id="activity-tab" data-bs-toggle="tab"
                                                        data-bs-target="#activity-tab-pane" type="button" role="tab"
                                                        aria-controls="activity-tab-pane"
                                                        aria-selected="true">Task</button>
                                                </li>
                                                <li class="nav-item" role="presentation"> <button class="nav-link"
                                                        id="posts-tab" data-bs-toggle="tab"
                                                        data-bs-target="#posts-tab-pane" type="button" role="tab"
                                                        aria-controls="posts-tab-pane" aria-selected="false"
                                                        tabindex="-1">Previous Task</button>
                                                </li>
                                                <li class="nav-item" role="presentation"> <button class="nav-link"
                                                        id="followers-tab" data-bs-toggle="tab"
                                                        data-bs-target="#followers-tab-pane" type="button" role="tab"
                                                        aria-controls="followers-tab-pane" aria-selected="false"
                                                        tabindex="-1">Friends</button>
                                                </li>
                                                <li class="nav-item" role="presentation"> <button class="nav-link"
                                                        id="gallery-tab" data-bs-toggle="tab"
                                                        data-bs-target="#gallery-tab-pane" type="button" role="tab"
                                                        aria-controls="gallery-tab-pane" aria-selected="false"
                                                        tabindex="-1">Gallery</button>
                                                </li>
                                            </ul>

                                            <div>
                                                <p class="mb-1 font-13 title-badges">Profile 70% completed - <a href="#"
                                                        class="text-primary">Finish now</a></p>
                                                <div class="progress h-6 progress-xs progress-animate">
                                                    <div class="progress-bar  bg-success" role="progressbar"
                                                        aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 70%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade active show" id="activity-tab-pane"
                                                role="tabpanel" aria-labelledby="activity-tab" tabindex="0">
                                                <div>
                                                    <div>
                                                        <!-- Task Input Form -->
                                                        <form id="taskForm" action="{{ route('tasks.store') }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="user_id" value="{{ $user->id }}">

                                                            <div class="mb-3">
                                                                <textarea class="form-control" name="task"
                                                                    placeholder="Enter Task" rows="3"
                                                                    required></textarea>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="service_id" class="form-label">Select
                                                                    Company</label>
                                                                <select class="form-select" name="service_id"
                                                                    id="service_id" required>
                                                                    <option selected disabled value="">Select Company
                                                                    </option>
                                                                    @foreach($services as $service)
                                                                        <option value="{{ $service->id }}">
                                                                            {{ $service->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="text-end">
                                                                <button class="btn btn-primary"
                                                                    type="submit">Submit</button>
                                                            </div>
                                                        </form>


                                                        <h5 class="mb-4">Tasks</h5>
                                                        <ol id="tasksList" class="activity-checkout mb-0 px-4 mt-3">
                                                            @foreach($tasks as $task)
                                                                <li class="checkout-item" data-task-id="{{ $task->id }}">
                                                                    <div class="avatar checkout-icon p-1">
                                                                        <div class="pro-avatar-title rounded-circle">
                                                                            <i class="bx bxs-pencil text-white"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-item-list">
                                                                        <div>
                                                                            <h4>{{ $task->task_id }}</h4>
                                                                            <p class="text-muted text-truncate mb-2">
                                                                                {{ $task->created_at->format('Y-m-d') }}
                                                                            </p>
                                                                            <div class="mb-3">
                                                                                <p>{{ $task->service->name ?? 'No Company' }}
                                                                                </p>
                                                                            </div>
                                                                            <p class="mb-1">{{ $task->task }}</p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                        <!-- Existing Tasks List -->

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="tab-pane fade p-0 border-0" id="posts-tab-pane" role="tabpanel"
                                                aria-labelledby="posts-tab" tabindex="0">
                                                <div class="single-project-card- mb-25">
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <h4>Active</h4>
                                                        </div>

                                                        <div class="table-responsive" id="taskTableContainer">
                                                            @include('users.partials.task-table', ['allTasks' => $allTasks])
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade p-0 border-0" id="followers-tab-pane"
                                                role="tabpanel" aria-labelledby="followers-tab" tabindex="0">
                                                <div class="row">
                                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="card mb-25">
                                                            <div class="card-body">
                                                                <div class="text-center">
                                                                    <div class="friend-single-img">
                                                                        <img src="img/bg-img/per-3.jpg" alt="">
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <p class="mb-0">Ajoy Dash</p>
                                                                        <p class="mb-2">ajoy526@gmail.com</p>
                                                                        <span class="badge text-bg-primary">Team
                                                                            Member</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <div class="btn-list"> <button
                                                                        class="btn btn-sm btn-danger m-1">Block</button>
                                                                    <button
                                                                        class="btn btn-sm btn-primary m-1">Unfollow</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="card mb-25">
                                                            <div class="card-body">
                                                                <div class="text-center">
                                                                    <div class="friend-single-img">
                                                                        <img src="img/bg-img/per-3.jpg" alt="">
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <p class="mb-0">Bishwajit Dash</p>
                                                                        <p class="mb-2">ajoy526@gmail.com</p>
                                                                        <span class="badge text-bg-primary">Team
                                                                            Member</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <div class="btn-list"> <button
                                                                        class="btn btn-sm btn-danger m-1">Block</button>
                                                                    <button
                                                                        class="btn btn-sm btn-primary m-1">Unfollow</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="card mb-25">
                                                            <div class="card-body">
                                                                <div class="text-center">
                                                                    <div class="friend-single-img">
                                                                        <img src="img/bg-img/person_1.jpg" alt="">
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <p class="mb-0">Nazrul Islam</p>
                                                                        <p class="mb-2">ajoy526@gmail.com</p>
                                                                        <span class="badge text-bg-primary">Team
                                                                            Member</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <div class="btn-list"> <button
                                                                        class="btn btn-sm btn-danger m-1">Block</button>
                                                                    <button
                                                                        class="btn btn-sm btn-primary m-1">Unfollow</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="card mb-25">
                                                            <div class="card-body">
                                                                <div class="text-center">
                                                                    <div class="friend-single-img">
                                                                        <img src="img/bg-img/per-2.jpg" alt="">
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <p class="mb-0">Ajoy Dash</p>
                                                                        <p class="mb-2">ajoy526@gmail.com</p>
                                                                        <span class="badge text-bg-primary">Team
                                                                            Member</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <div class="btn-list"> <button
                                                                        class="btn btn-sm btn-danger m-1">Block</button>
                                                                    <button
                                                                        class="btn btn-sm btn-primary m-1">Unfollow</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="card mb-25">
                                                            <div class="card-body">
                                                                <div class="text-center">
                                                                    <div class="friend-single-img">
                                                                        <img src="img/bg-img/person_1.jpg" alt="">
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <p class="mb-0">Ajoy Dash</p>
                                                                        <p class="mb-2">ajoy526@gmail.com</p>
                                                                        <span class="badge text-bg-primary">Team
                                                                            Member</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <div class="btn-list"> <button
                                                                        class="btn btn-sm btn-danger m-1">Block</button>
                                                                    <button
                                                                        class="btn btn-sm btn-primary m-1">Unfollow</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="card mb-25">
                                                            <div class="card-body">
                                                                <div class="text-center">
                                                                    <div class="friend-single-img">
                                                                        <img src="img/bg-img/per-2.jpg" alt="">
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <p class="mb-0">Ajoy Dash</p>
                                                                        <p class="mb-2">ajoy526@gmail.com</p>
                                                                        <span class="badge text-bg-primary">Team
                                                                            Member</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <div class="btn-list"> <button
                                                                        class="btn btn-sm btn-danger m-1">Block</button>
                                                                    <button
                                                                        class="btn btn-sm btn-primary m-1">Unfollow</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade p-0 border-0" id="gallery-tab-pane"
                                                role="tabpanel" aria-labelledby="gallery-tab" tabindex="0">
                                                <div class="row">
                                                    <!-- Single Card -->
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="#" class="profile-gallery-card">
                                                            <img src="img/bg-img/bg-1.jpg" alt="image">
                                                        </a>
                                                    </div>

                                                    <!-- Single Card -->
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="#" class="profile-gallery-card">
                                                            <img src="img/bg-img/bg-2.jpg" alt="image">
                                                        </a>
                                                    </div>

                                                    <!-- Single Card -->
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="#" class="profile-gallery-card">
                                                            <img src="img/bg-img/bg-1.jpg" alt="image">
                                                        </a>
                                                    </div>

                                                    <!-- Single Card -->
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="#" class="profile-gallery-card">
                                                            <img src="img/bg-img/bg-2.jpg" alt="image">
                                                        </a>
                                                    </div>

                                                    <!-- Single Card -->
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="#" class="profile-gallery-card">
                                                            <img src="img/bg-img/bg-1.jpg" alt="image">
                                                        </a>
                                                    </div>

                                                    <!-- Single Card -->
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="#" class="profile-gallery-card">
                                                            <img src="img/bg-img/bg-2.jpg" alt="image">
                                                        </a>
                                                    </div>

                                                    <!-- Single Card -->
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="#" class="profile-gallery-card">
                                                            <img src="img/bg-img/bg-1.jpg" alt="image">
                                                        </a>
                                                    </div>

                                                    <!-- Single Card -->
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="#" class="profile-gallery-card">
                                                            <img src="img/bg-img/bg-2.jpg" alt="image">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- Footer Area -->

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

    <script>
        document.getElementById('taskForm').addEventListener('submit', function (e) {
            e.preventDefault();

            let form = e.target;
            let formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json',
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) throw response;
                    return response.json();
                })
                .then(data => {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "green",
                    }).showToast();

                    form.reset();

                    // Add new task to the top of the list
                    const tasksList = document.getElementById('tasksList');

                    // Create new <li> element with the task data
                    const li = document.createElement('li');
                    li.classList.add('checkout-item');
                    li.setAttribute('data-task-id', data.task.id);

                    li.innerHTML = `
            <div class="avatar checkout-icon p-1">
                <div class="pro-avatar-title rounded-circle">
                    <i class="bx bxs-pencil text-white"></i>
                </div>
            </div>
            <div class="profile-item-list">
                <div>
                 <h4 class="mb-1">${data.task.task_id}</h4>
                <p class="text-muted text-truncate mb-2">${new Date(data.task.created_at).toISOString().slice(0, 10)}</p>
                <div class="mb-3">
                <p>${data.task.service ? data.task.service.name : 'No Company'}</p>
                </div>
                <p class="mb-1">${data.task.task}</p>
                </div>
            </div>
        `;

                    // Insert new task at the top
                    tasksList.insertBefore(li, tasksList.firstChild);

                    // Keep only top 3 tasks in the list
                    while (tasksList.children.length > 3) {
                        tasksList.removeChild(tasksList.lastChild);
                    }
                })
                .catch(async error => {
                    let errMsg = 'Something went wrong!';
                    try {
                        if (error.status === 422) {
                            let errorJson = await error.json();
                            errMsg = Object.values(errorJson.errors).flat().join(', ');
                        } else {
                            let errorText = await error.text();
                            errMsg = errorText || errMsg;
                        }
                    } catch (e) {
                        console.error('Error parsing error response:', e);
                    }
                    Toastify({
                        text: errMsg,
                        duration: 5000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "red",
                    }).showToast();
                });
        });


        document.body.addEventListener("click", function (e) {
            if (e.target.closest('.pagination a')) {
                e.preventDefault();
                let url = e.target.getAttribute('href');

                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById("taskTableContainer").innerHTML = html;
                        window.history.pushState({}, '', url);
                    })
                    .catch(error => {
                        console.error("Pagination load error:", error);
                    });
            }
        });
    </script>
</body>

</html>