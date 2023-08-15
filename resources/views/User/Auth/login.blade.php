<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Portal Login</title>
    <link rel="stylesheet" href="{{asset('user/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('user/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/vertical-layout-light/style.css')}}">
    <link rel="shortcut icon" href="{{asset('user/images/favicon.png')}}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                {{-- <img src="{{ asset('web/images/site-logo.png') }}" alt="logo"> --}}
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form action="{{ url('/user/check-login') }}" method="post" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="email" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit
                                    ">SIGN IN</button>
                                </div>
                                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div> -->
                                <!-- <div class="mb-2">
                                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                        <i class="typcn typcn-social-facebook mr-2"></i>Connect using facebook
                                    </button>
                                </div> -->
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="{{url('/user/registration')}}" class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('user/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('user/js/off-canvas.js')}}"></script>
    <script src="{{asset('user/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('user/js/template.js')}}"></script>
    <script src="{{asset('user/js/settings.js')}}"></script>
    <script src="{{asset('user/js/todolist.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" referrerpolicy="no-referrer"></script>    
    </body>
</html>
