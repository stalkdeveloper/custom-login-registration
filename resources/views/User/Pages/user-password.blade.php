@extends('User.Include.main')
@section('title', 'Create User')
@section('breadcumb', 'Home')
@section('breadcumb2', 'Create User')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Change Password</h4>
        <p class="card-description">
          Change <code>your</code> password
        </p>
        <form class="pt-3" action="{{route('getUpdatePassword')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Current Password" name="old_password">
                @error('old_password')
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
                <input type="password" class="form-control form-control-lg" id="exampleInputPassword2" placeholder="Password" name="password">
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
                <input type="password" class="form-control form-control-lg" id="exampleInputPassword3" placeholder="Confirm Password" name="confirm_password">
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
              <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Change Password</button>
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
        var z = document.getElementById("exampleInputPassword3");

        if ((x.type === "password") || (y.type === "password") || (z.type === "password")) {
            x.type = "text";
            y.type = "text";
            z.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
            z.type = "password";
        }
    }
</script>