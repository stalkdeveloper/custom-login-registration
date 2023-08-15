@extends('User.Include.main')
@section('title', 'Create User')
@section('breadcumb', 'Home')
@section('breadcumb2', 'Create User')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">User Create</h4>
        <p class="card-description">
          Create <code>User</code> 
        </p>
        <form class="pt-3" action="{{route('getStoreUser')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" name="profile_img" accept="image/jpeg, image/png" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Select a profile image"  name="profile_img">
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
              <input type="text" class="form-control form-control-lg" id="" placeholder="Name" name="name" value="{{ old('name') }}">
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
                <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" value="{{ old('email') }}">
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
                <input type="text" class="form-control form-control-lg" id="mobileNumber" placeholder="Enter a mobile number" name="mobile" onchange="validateMobileNumber()" value="{{ old('mobile') }}">
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
                <input type="text" class="form-control form-control-lg" id="" placeholder="Enter Father Name" name="father_name" value="{{ old('father_name') }}">
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
                <input type="text" class="form-control form-control-lg" id="" placeholder="Enter Mother Name" name="mother_name" value="{{ old('mother_name') }}">
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
                <input type="text" class="form-control form-control-lg" id="" placeholder="Enter Address" name="address" value="{{ old('address') }}">
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
                <input type="text" class="form-control form-control-lg" id="" placeholder="Enter City Name" name="city" value="{{ old('city') }}">
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
                <input type="text" class="form-control form-control-lg" id="" placeholder="Enter postal code(Pin code)" name="post_code" value="{{ old('post_code') }}">
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
              <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Add User</button>
            </div>
          </form>
      </div>
    </div>
</div>
@endsection
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