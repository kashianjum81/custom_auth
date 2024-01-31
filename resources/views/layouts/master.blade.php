<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $websettings = \App\Models\Websetting::first();
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $websettings->webtitle }}</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/favcon/'.$websettings->favcon) }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/styles.min.css') }}" />
</head>

<body>
    @include('layouts.sidebar')
    @include('layouts.header')

    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @include('layouts.footer')
    </div>
    {{-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> --}}
    <script src="{{ asset('/assets/libs/jquery/dist/jquery.min.js') }}"></script>

    {{-- <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    {{-- <script src="../assets/js/sidebarmenu.js"></script> --}}
    <script src="{{ asset('/assets/js/sidebarmenu.js') }}"></script>

    {{-- <script src="../assets/js/app.min.js"></script> --}}
    <script src="{{ asset('/assets/js/app.min.js') }}"></script>

    {{-- <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script> --}}
    <script src="{{ asset('/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>


    {{-- <script src="../assets/libs/simplebar/dist/simplebar.js"></script> --}}
    <script src="{{ asset('/assets/libs/simplebar/dist/simplebar.js') }}"></script>


    {{-- <script src="../assets/js/dashboard.js"></script> --}}
    <script src="{{ asset('/assets/js/dashboard.js') }}"></script>

</body>

<script>
    $(document).ready(function() {
        var isLoggedIn = true;
        updateSidebar(isLoggedIn);

        function updateSidebar(isLoggedIn) {
            if (isLoggedIn) {
                $("#loginNavItem").html(`
                        <a class="sidebar-link" href="{{ route('admin-profile') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu">{{ Auth::user()->name }}</span>
                        </a>
                    `);
            } else {
                $("#loginNavItem").html(`
                        <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                            <span>
                                <i class="ti ti-login"></i>
                            </span>
                            <span class="hide-menu">Login</span>
                        </a>
                    `);
            }
        }
    });

    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 2500);
</script>
</body>

</html>
