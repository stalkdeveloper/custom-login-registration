<!DOCTYPE html>
<html lang="en">

<head>
    @include('User.Include.meta')
    <title>@yield('title')</title>
    @include('User.Include.links')
</head>

<body>
    <div id="container-scroller">
        @include('User.Include.header')
        <div class="container-fluid page-body-wrapper">
            @include('User.Include.sidebar')
            <!-- -------------------------content ----------------------------------->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- -------------------------content ----------------------------------->
                @include('User.Include.footer')
            </div>
        </div>
    </div>
    @include('User.Include.script')
</body>

</html>