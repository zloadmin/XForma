<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.layouts.app.head')
<body class="authentication-bg">
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">

                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="{{ route('dashboard') }}">
                            <span><img src="/hyper/images/logo.png" alt="" height="18"></span>
                        </a>
                    </div>

                    {{ $slot }}
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        @stack('sub_text')
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>

<!-- end page -->
@include('components.layouts.card.footer')
@livewireScripts
</body>
</html>
