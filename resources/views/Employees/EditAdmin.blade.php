<!-- Page Wrapper Start -->
<div class="flapt-page-wrapper">
  <!-- Sidebar -->
  <div class="flapt-sidemenu-wrapper">
    <!-- @extends('layouts.sidebar') -->
    @include('layouts.sidebar')
  </div>

  <!-- Page Content -->
  <div class="flapt-page-content">
    @include('layouts.topbar')

    @if(session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
      <div class="toast align-items-center text-bg-success border-0 show" role="alert">
      <div class="d-flex">
        <div class="toast-body">
        {{ session('success') }}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
      </div>
    </div>
  @endif

    @if($errors->any())
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
      <div class="toast align-items-center text-bg-danger border-0 show" role="alert">
      <div class="d-flex">
        <div class="toast-body">
        @foreach ($errors->all() as $error)
      {{ $error }}<br>
      @endforeach
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
      </div>
    </div>
  @endif

    <!-- Main Content -->
    <div class="main-content">
      <div class="content-wraper-area">
        <div class="container-fluid">
          <div class="row g-4">
            <div class="col-12">
              <div class="card shadow-sm border-0">
                <div class="card-body py-4 px-4">
                  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                    <div class="mb-2 mb-md-0">
                      <h4 class="mb-1 text-primary fw-semibold">
                        Edit {{ $employee->user_type == 'Admin' ? 'Admin' : 'Operator' }}
                      </h4>
                      <p class="text-muted mb-0">Update the {{ $employee->user_type }} details below</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
              <div class="col-md-10">
                <div class="card shadow">
                  <div class="card-body">
                    <div class="text-center mb-4">
                      <h4 class="card-title">Edit {{ $employee->user_type }}</h4>
                    </div>

                    <form action="{{ route('add-employee.update', $employee->id) }}" method="POST"
                      enctype="multipart/form-data">
                      @csrf
                      @method('PUT')


                      <div class="row mb-3">
                        <div class="col-md-6">
                          <label for="name" class="form-label">Name*</label>
                          <input type="text" class="form-control" name="name" id="name" value="{{ $employee->name }}"
                            required>
                        </div>
                        <div class="col-md-6">
                          <label for="email" class="form-label">Email*</label>
                          <input type="email" class="form-control" name="email" id="email"
                            value="{{ $employee->email }}" required>
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number*</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $employee->phone }}"
                          required maxlength="10" pattern="\d{10}" title="Enter 10 digit number">
                      </div>

                      <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address"
                          rows="2">{{ $employee->address }}</textarea>
                      </div>

                      <!-- Password Fields in One Row -->
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <label for="password" class="form-label">New Password (Optional)</label>
                          <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col-md-6">
                          <label for="password_confirmation" class="form-label">Confirm Password</label>
                          <input type="password" name="password_confirmation" class="form-control">
                          @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
              @enderror
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="user_type" class="form-label">User Type*</label>
                        <select name="user_type" id="user_type" class="form-control" required>
                          <option value="Admin" {{ $employee->user_type === 'Admin' ? 'selected' : '' }}>Admin</option>
                          <option value="Operator" {{ $employee->user_type === 'Operator' ? 'selected' : '' }}>Operator
                          </option>
                        </select>
                      </div>

                      <!-- Upload Fields in One Row -->
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label for="adhar_image" class="form-label">Upload Adhar Image</label>
                          <input type="file" class="form-control" name="adhar_image" id="adhar_image" accept="image/*">
                          @if($employee->adhar_image)
                <img src="{{ asset('uploads/adhar/' . $employee->adhar_image) }}" alt="Adhar Image"
                class="img-thumbnail mt-2" width="120">
              @endif
                        </div>
                        <div class="col-md-6">
                          <label for="pan_image" class="form-label">Upload Pan Card</label>
                          <input type="file" class="form-control" name="pan_image" id="pan_image" accept="image/*">
                          @if($employee->pan_image)
                <img src="{{ asset('uploads/pan/' . $employee->pan_image) }}" alt="Pan Image"
                class="img-thumbnail mt-2" width="120">
              @endif
                        </div>
                      </div>

                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>

                    </form>
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

<!-- Auto-hide toast -->
<script>
  setTimeout(() => {
    document.querySelectorAll('.toast').forEach(toast => {
      toast.classList.remove('show');
    });
  }, 4000);
</script>