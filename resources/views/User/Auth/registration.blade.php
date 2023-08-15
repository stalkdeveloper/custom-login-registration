<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User Registration</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('user/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('user/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/vertical-layout-light/style.css')}}">
    <link rel="shortcut icon" href="{{asset('user/images/favicon.png')}}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <!-- endinject -->
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                {{-- <img src="../../images/logo-dark.svg" alt="logo"> --}}
              </div>
              <h4>User Registration Here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" action="{{url('/user/registration-info')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" name="profile_img" accept="image/jpeg, image/png" class="file-upload-default"  value="{{ old('profile_img') }}">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Select a profile image"  name="profile_img" value="{{ old('profile_img') }}">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                    @error('profile_img')
                    <div class="alert alert-danger alert-dismissible fade show mb-2 mt-2" role="alert">
                        <div class="text-center">
                            {{$message}}
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror
                  </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="" placeholder="Name" name="name"  value="{{ old('name') }}">
                  @error('name')
                      <div class="alert alert-danger alert-dismissible fade show mb-2 mt-2" role="alert">
                          <div class="text-center">
                              {{$message}}
                          </div>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email"  value="{{ old('email') }}">
                    @error('email')
                      <div class="alert alert-danger alert-dismissible fade show mb-2 mt-2" role="alert">
                          <div class="text-center">
                              {{$message}}
                          </div>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="mobileNumber" placeholder="Enter a mobile number" name="mobile" onchange="validateMobileNumber()"  value="{{ old('mobile') }}">
                    @error('mobile')
                        <div class="alert alert-danger alert-dismissible fade show mb-2 mt-2" role="alert">
                            <div class="text-center">
                                {{$message}}
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="" placeholder="Enter Father Name" name="father_name"  value="{{ old('father_name') }}">
                    @error('father_name')
                        <div class="alert alert-danger alert-dismissible fade show mb-2 mt-2" role="alert">
                            <div class="text-center">
                                {{$message}}
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="" placeholder="Enter Mother Name" name="mother_name"  value="{{ old('mother_name') }}">
                    @error('mother_name')
                        <div class="alert alert-danger alert-dismissible fade show mb-2 mt-2" role="alert">
                            <div class="text-center">
                                {{$message}}
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="" placeholder="Enter Address" name="address"  value="{{ old('address') }}">
                    @error('address')
                        <div class="alert alert-danger alert-dismissible fade show mb-2 mt-2" role="alert">
                            <div class="text-center">
                                {{$message}}
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="" placeholder="Enter City Name" name="city"  value="{{ old('city') }}">
                    @error('city')
                        <div class="alert alert-danger alert-dismissible fade show mb-2 mt-2" role="alert">
                            <div class="text-center">
                                {{$message}}
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="" placeholder="Enter postal code(Pin code)" name="post_code"  value="{{ old('post_code') }}">
                    @error('post_code')
                        <div class="alert alert-danger alert-dismissible fade show mb-2 mt-2" role="alert">
                            <div class="text-center">
                                {{$message}}
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                    @error('password')
                        <div class="alert alert-danger alert-dismissible fade show mb-2 mt-2" role="alert">
                            <div class="text-center">
                                {{$message}}
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword2" placeholder="Confirm Password" name="confirm_password">
                    @error('confirm_password')
                        <div class="alert alert-danger alert-dismissible fade show mb-2 mt-2" role="alert">
                            <div class="text-center">
                                {{$message}}
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                        <input type="checkbox" class="" name="" id="checkmeout" onclick="showMyPassword()">
                        Show Password!
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="{{url('/user/login')}}" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{asset('user/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('user/js/off-canvas.js')}}"></script>
    <script src="{{asset('user/js/file-upload.js')}}"></script>

    <script src="{{asset('user/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('user/js/template.js')}}"></script>
    <script src="{{asset('user/js/settings.js')}}"></script>
    <script src="{{asset('user/js/todolist.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" referrerpolicy="no-referrer"></script>    
  <!-- endinject -->
</body>

</html>
<script>
    function showMyPassword() {
        var x = document.getElementById("exampleInputPassword1");
        var y = document.getElementById("exampleInputPassword2");

        if ((x.type === "password") || (y.type === "password")) {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }

    function validateMobileNumber() {
      var mobile_number = document.getElementById('mobileNumber').value;
      var regex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
      
      if (!regex.test(mobile_number)) {
        toastr.error('Please enter a valid mobile number.');
        return false;
      }else{
        return true;
      }
    }
</script>