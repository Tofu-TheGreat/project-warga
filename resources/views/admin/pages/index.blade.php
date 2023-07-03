<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    @include('admin.partial.header')
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('admin.partial.navbar')
        @include('admin.partial.sidebar')
        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('konten')
            </div>
            @include('admin.partial.footer')
        </div>
    </div>
    @include('admin.partial.script')
</body>

</html>
