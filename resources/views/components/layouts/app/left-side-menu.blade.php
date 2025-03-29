<div class="leftside-menu menuitem-active">

    <!-- LOGO -->
    <a href="{{ route('dashboard') }}" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="/hyper/images/logo.png" alt="" height="16">
                </span>
        <span class="logo-sm">
                    <img src="/hyper/images/logo_sm.png" alt="" height="16">
                </span>
    </a>

{{--    <!-- LOGO -->--}}
{{--    <a href="{{ route('dashboard') }}" class="logo text-center logo-dark">--}}
{{--                <span class="logo-lg">--}}
{{--                    <img src="/hyper/images/logo-dark.png" alt="" height="16">--}}
{{--                </span>--}}
{{--        <span class="logo-sm">--}}
{{--                    <img src="/hyper/images/logo_sm_dark.png" alt="" height="16">--}}
{{--                </span>--}}
{{--    </a>--}}

    <div class="h-100 show" id="leftside-menu-container" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">

                            <!--- Sidemenu -->
                            <ul class="side-nav">

                                <li class="side-nav-title side-nav-item">Меню</li>

                                <li class="side-nav-item">
                                    <a href="{{ route('dashboard') }}" class="side-nav-link" wire:navigate>
                                        <i class="uil-home-alt"></i>
                                        <span>Панель</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{ route('teachers-page') }}" class="side-nav-link" wire:navigate>
                                        <i class="uil-user-check"></i>
                                        <span>Преподаватели</span>
                                    </a>
                                </li>

                            </ul>

                            <!-- Help Box -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: 260px; height: 1473px;"></div>
        </div>

    </div>
    <!-- Sidebar -left -->

</div>

