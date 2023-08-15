@extends('User.Include.main')
@section('title', 'Edit User')
@section('breadcumb', 'Home')
@section('breadcumb2', 'Edit User')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">User Edit</h4>
        <p class="card-description">
          Edit <code>User</code> Info
        </p>
        <form class="pt-3" action="{{route('getUpdateUser')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$userDetails->id}}"/>
            @if ($userDetails->profile_img)
                <div class="current-profile-image">
                    <img src="{{ asset('storage/profile_images/'. $userDetails->profile_img) }}" alt="Current Profile Image" style="width:100px; height:100px;">
                </div>
            @endif
            <div class="form-group">
                <input type="file" name="profile_img" value="{{$userDetails->profile_img}}" accept="image/jpeg, image/png" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Select a profile image"  value="{{$userDetails->profile_img}}" name="profile_img">
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
              <input type="text" class="form-control form-control-lg" id="" placeholder="Name" value="{{$userDetails->name}}" name="name">
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
                <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="email" value="{{$userDetails->email}}" name="email">
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
                <input type="text" class="form-control form-control-lg" id="mobileNumber" placeholder="Enter a mobile number" value="{{$userDetails->mobile}}" name="mobile" onchange="validateMobileNumber()">
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
                <input type="text" class="form-control form-control-lg" id="" placeholder="Enter Father Name" name="father_name" value="{{$userDetails->father_name}}">
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
                <input type="text" class="form-control form-control-lg" id="" placeholder="Enter Mother Name" name="mother_name" value="{{$userDetails->mother_name}}">
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
                <input type="text" class="form-control form-control-lg" id="" placeholder="Enter Address" name="address" value="{{$userDetails->address}}">
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
                <input type="text" class="form-control form-control-lg" id="" placeholder="Enter City Name" name="city" value="{{$userDetails->city}}">
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
                <input type="text" class="form-control form-control-lg" id="" placeholder="Enter postal code(Pin code)" name="post_code" value="{{$userDetails->post_code}}">
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
            {{-- <div class="mb-4">
              <div class="form-check">
                <label class="form-check-label text-muted">
                    <input type="checkbox" class="" name="" id="checkmeout" onclick="showMyPassword()">
                    Show Password!
                </label>
              </div>
            </div> --}}
            <div class="mt-3">
              <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Update User</button>
            </div>
          </form>
      </div>
    </div>
</div>
@endsection
<script>   
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