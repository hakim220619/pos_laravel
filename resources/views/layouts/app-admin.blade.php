<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <link href="{{ asset('') }}assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />


    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/css/themes/layout/brand/light.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/css/themes/layout/aside/light.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    @yield('css')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

</head>

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">


    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        <!--begin::Logo-->
        <a href="index.html">
            <img alt="Logo" src="{{ asset('') }}/assets/media/logos/logo-ig.png" />
        </a>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Aside Mobile Toggle-->
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                <span></span>
            </button>
            <!--end::Aside Mobile Toggle-->
            <!--begin::Header Menu Mobile Toggle-->
            <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
                <span></span>
            </button>
            <!--end::Header Menu Mobile Toggle-->
            <!--begin::Topbar Mobile Toggle-->
            <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </button>
            <!--end::Topbar Mobile Toggle-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Aside-->
            <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
                <!--begin::Brand-->
                <div class="brand flex-column-auto" id="kt_brand">
                    <!--begin::Logo-->
                    <a href="index.html" class="brand-logo">
                        <img alt="Logo" src="assets/media/logos/logo-ig.png" style="height: 50px" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Toggle-->
                    <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                        <span class="svg-icon svg-icon svg-icon-xl">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                                    <path
                                        d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"
                                        transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </button>
                    <!--end::Toolbar-->
                </div>
                <!--end::Brand-->
                <!--begin::Aside Menu-->
                <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                    <!--begin::Menu Container-->
                    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                        data-menu-dropdown-timeout="500">
                        <!--begin::Menu Nav-->
                        <ul class="menu-nav">
                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                <a href="/dashboard" class="menu-link">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                                <path
                                                    d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-section">
                                <h4 class="menu-text">Data</h4>
                                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                            </li>
                            @if (Auth::user()->user_level == 1)
                                <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24"
                                                        height="24" />
                                                    <path
                                                        d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                        fill="#000000" opacity="0.3" />
                                                    <path
                                                        d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-text">Transaksi</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link">
                                                    <span class="menu-text">Data Users</span>
                                                </span>
                                            </li>
                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="/orders" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Orders</span>
                                                </a>
                                            </li>
                                            {{-- <li class="menu-item" aria-haspopup="true">
                                            <a href="/suplier" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Data Suplier</span>
                                            </a>
                                        </li> --}}

                                        </ul>
                                    </div>
                                </li>

                                <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24"
                                                        height="24" />
                                                    <rect fill="#000000" x="4" y="4"
                                                        width="7" height="7" rx="1.5" />
                                                    <path
                                                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-text">Master Data</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link">
                                                    <span class="menu-text">Manajemen User</span>
                                                </span>
                                            </li>
                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="/kategori" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-line">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Kategori</span>
                                                </a>
                                            </li>
                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="/satuan" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-line">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Satuan</span>
                                                </a>
                                            </li>

                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="/product" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-line">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Barang</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24"
                                                        height="24" />
                                                    <path
                                                        d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                        fill="#000000" opacity="0.3" />
                                                    <path
                                                        d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-text">Data Users</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link">
                                                    <span class="menu-text">Data Users</span>
                                                </span>
                                            </li>
                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="/cabang" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Data Cabang</span>
                                                </a>
                                            </li>
                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="/suplier" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Data Suplier</span>
                                                </a>
                                            </li>
                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="/users" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Data Users</span>

                                                </a>
                                            </li>
                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="/laporan" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Laporan</span>

                                                </a>
                                            </li>


                                        </ul>
                                    </div>
                                </li>
                            @elseif (Auth::user()->user_level == 2)
                                <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24"
                                                        height="24" />
                                                    <path
                                                        d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                        fill="#000000" opacity="0.3" />
                                                    <path
                                                        d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-text">Transaksi</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link">
                                                    <span class="menu-text">Data Users</span>
                                                </span>
                                            </li>
                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="/orders" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Orders</span>
                                                </a>
                                            </li>
                                            {{-- <li class="menu-item" aria-haspopup="true">
                                            <a href="/suplier" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Data Suplier</span>
                                            </a>
                                        </li> --}}

                                        </ul>
                                    </div>
                                </li>
                            @endif
                        </ul>
                        <!--end::Menu Nav-->
                    </div>
                    <!--end::Menu Container-->
                </div>
                <!--end::Aside Menu-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header header-fixed">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <!--begin::Header Menu Wrapper-->
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                            <!--begin::Header Menu-->
                            <div id="kt_header_menu"
                                class="header-menu header-menu-mobile header-menu-layout-default">
                                <!--begin::Header Nav-->
                                <ul class="menu-nav">
                                    <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active"
                                        data-menu-toggle="click" aria-haspopup="true">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <span class="menu-text">Home</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Header Nav-->
                            </div>
                            <!--end::Header Menu-->
                        </div>
                        <!--end::Header Menu Wrapper-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <!--end::Languages-->
                            <!--begin::User-->
                            <div class="topbar-item">
                                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                    id="kt_quick_user_toggle">
                                    <span
                                        class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                                    <span
                                        class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">Sean</span>
                                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                        <span class="symbol-label font-size-h5 font-weight-bold">S</span>
                                    </span>
                                </div>
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                @yield('content')
                <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted font-weight-bold mr-2">2020©</span>
                            <a href="http://keenthemes.com/metronic" target="_blank"
                                class="text-dark-75 text-hover-primary">Keenthemes</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Nav-->
                        <div class="nav nav-dark">
                            <a href="http://keenthemes.com/metronic" target="_blank"
                                class="nav-link pl-0 pr-5">About</a>
                            <a href="http://keenthemes.com/metronic" target="_blank"
                                class="nav-link pl-0 pr-5">Team</a>
                            <a href="http://keenthemes.com/metronic" target="_blank"
                                class="nav-link pl-0 pr-0">Contact</a>
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>

            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    <!-- begin::User Panel-->
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            <h3 class="font-weight-bold m-0">User Profile
                <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                    <i class="ki ki-close icon-xs text-muted"></i>
                </a>
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="offcanvas-content pr-5 mr-n5">
            <!--begin::Header-->
            <div class="d-flex align-items-center mt-5">
                <div class="symbol symbol-100 mr-5">
                    <div class="symbol-label" style="background-image:url('assets/media/users/300_21.jpg')"></div>
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div class="d-flex flex-column">
                    <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">James
                        Jones</a>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();"
                            class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">
                            {{ __('Sign
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Out') }}
                        </x-jet-dropdown-link>
                    </form>

                </div>
            </div>
            <!--end::Header-->
            <!--begin::Separator-->
            <div class="separator separator-dashed mt-8 mb-5"></div>
            <!--end::Separator-->
            <!--begin::Nav-->
            <div class="navi navi-spacer-x-0 p-0">
                <!--begin::Item-->
                <a href="custom/apps/user/profile-1/personal-information.html" class="navi-item">
                    <div class="navi-link">
                        <div class="symbol symbol-40 bg-light mr-3">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-md svg-icon-success">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                                fill="#000000" />
                                            <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5"
                                                r="2.5" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold">My Profile</div>
                            <div class="text-muted">Account settings and more
                                <span class="label label-light-danger label-inline font-weight-bold">update</span>
                            </div>
                        </div>
                    </div>
                </a>
                <!--end:Item-->
                <!--begin::Item-->

            </div>
            <!--end::Notifications-->
        </div>
        <!--end::Content-->
    </div>
    <!-- end::User Panel-->
    <!--begin::Quick Cart-->
    <div id="kt_quick_cart" class="offcanvas offcanvas-right p-10">
        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
            <h4 class="font-weight-bold m-0">Shopping Cart</h4>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="offcanvas-content">
            <!--begin::Wrapper-->
            <div class="offcanvas-wrapper mb-5 scroll-pull">
                <!--begin::Item-->
                <div class="d-flex align-items-center justify-content-between py-8">
                    <div class="d-flex flex-column mr-2">
                        <a href="#"
                            class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">iBlender</a>
                        <span class="text-muted">The best kitchen gadget in 2020</span>
                        <div class="d-flex align-items-center mt-2">
                            <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 350</span>
                            <span class="text-muted mr-1">for</span>
                            <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">5</span>
                            <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                                <i class="ki ki-minus icon-xs"></i>
                            </a>
                            <a href="#" class="btn btn-xs btn-light-success btn-icon">
                                <i class="ki ki-plus icon-xs"></i>
                            </a>
                        </div>
                    </div>
                    <a href="#" class="symbol symbol-70 flex-shrink-0">
                        <img src="assets/media/stock-600x400/img-1.jpg" title="" alt="" />
                    </a>
                </div>
                <!--end::Item-->
                <!--begin::Separator-->
                <div class="separator separator-solid"></div>
                <!--end::Separator-->
                <!--begin::Item-->
                <div class="d-flex align-items-center justify-content-between py-8">
                    <div class="d-flex flex-column mr-2">
                        <a href="#"
                            class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">SmartCleaner</a>
                        <span class="text-muted">Smart tool for cooking</span>
                        <div class="d-flex align-items-center mt-2">
                            <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 650</span>
                            <span class="text-muted mr-1">for</span>
                            <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">4</span>
                            <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                                <i class="ki ki-minus icon-xs"></i>
                            </a>
                            <a href="#" class="btn btn-xs btn-light-success btn-icon">
                                <i class="ki ki-plus icon-xs"></i>
                            </a>
                        </div>
                    </div>
                    <a href="#" class="symbol symbol-70 flex-shrink-0">
                        <img src="assets/media/stock-600x400/img-2.jpg" title="" alt="" />
                    </a>
                </div>
                <!--end::Item-->
                <!--begin::Separator-->
                <div class="separator separator-solid"></div>
                <!--end::Separator-->
                <!--begin::Item-->
                <div class="d-flex align-items-center justify-content-between py-8">
                    <div class="d-flex flex-column mr-2">
                        <a href="#"
                            class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">CameraMax</a>
                        <span class="text-muted">Professional camera for edge cutting shots</span>
                        <div class="d-flex align-items-center mt-2">
                            <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 150</span>
                            <span class="text-muted mr-1">for</span>
                            <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">3</span>
                            <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                                <i class="ki ki-minus icon-xs"></i>
                            </a>
                            <a href="#" class="btn btn-xs btn-light-success btn-icon">
                                <i class="ki ki-plus icon-xs"></i>
                            </a>
                        </div>
                    </div>
                    <a href="#" class="symbol symbol-70 flex-shrink-0">
                        <img src="assets/media/stock-600x400/img-3.jpg" title="" alt="" />
                    </a>
                </div>
                <!--end::Item-->
                <!--begin::Separator-->
                <div class="separator separator-solid"></div>
                <!--end::Separator-->
                <!--begin::Item-->
                <div class="d-flex align-items-center justify-content-between py-8">
                    <div class="d-flex flex-column mr-2">
                        <a href="#" class="font-weight-bold text-dark text-hover-primary">4D Printer</a>
                        <span class="text-muted">Manufactoring unique objects</span>
                        <div class="d-flex align-items-center mt-2">
                            <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 1450</span>
                            <span class="text-muted mr-1">for</span>
                            <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">7</span>
                            <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                                <i class="ki ki-minus icon-xs"></i>
                            </a>
                            <a href="#" class="btn btn-xs btn-light-success btn-icon">
                                <i class="ki ki-plus icon-xs"></i>
                            </a>
                        </div>
                    </div>
                    <a href="#" class="symbol symbol-70 flex-shrink-0">
                        <img src="assets/media/stock-600x400/img-4.jpg" title="" alt="" />
                    </a>
                </div>
                <!--end::Item-->
                <!--begin::Separator-->
                <div class="separator separator-solid"></div>
                <!--end::Separator-->
                <!--begin::Item-->
                <div class="d-flex align-items-center justify-content-between py-8">
                    <div class="d-flex flex-column mr-2">
                        <a href="#" class="font-weight-bold text-dark text-hover-primary">MotionWire</a>
                        <span class="text-muted">Perfect animation tool</span>
                        <div class="d-flex align-items-center mt-2">
                            <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 650</span>
                            <span class="text-muted mr-1">for</span>
                            <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">7</span>
                            <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                                <i class="ki ki-minus icon-xs"></i>
                            </a>
                            <a href="#" class="btn btn-xs btn-light-success btn-icon">
                                <i class="ki ki-plus icon-xs"></i>
                            </a>
                        </div>
                    </div>
                    <a href="#" class="symbol symbol-70 flex-shrink-0">
                        <img src="assets/media/stock-600x400/img-8.jpg" title="" alt="" />
                    </a>
                </div>
                <!--end::Item-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Purchase-->
            <div class="offcanvas-footer">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <span class="font-weight-bold text-muted font-size-sm mr-2">Total</span>
                    <span class="font-weight-bolder text-dark-50 text-right">$1840.00</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-7">
                    <span class="font-weight-bold text-muted font-size-sm mr-2">Sub total</span>
                    <span class="font-weight-bolder text-primary text-right">$5640.00</span>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-primary text-weight-bold">Place Order</button>
                </div>
            </div>
            <!--end::Purchase-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Quick Cart-->
    <!--begin::Quick Panel-->
    <div id="kt_quick_panel" class="offcanvas offcanvas-right pt-5 pb-10">
        <!--begin::Header-->
        <div class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5">
            <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary flex-grow-1 px-10"
                role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_logs">Audit Logs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_notifications">Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_settings">Settings</a>
                </li>
            </ul>
            <div class="offcanvas-close mt-n1 pr-5">
                <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_panel_close">
                    <i class="ki ki-close icon-xs text-muted"></i>
                </a>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Content-->

        <!--end::Content-->
    </div>
    <!--end::Quick Panel-->
    <!--begin::Chat Panel-->
    <div class="modal modal-sticky modal-sticky-bottom-right" id="kt_chat_modal" role="dialog"
        data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Header-->
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer align-items-center">
                        <!--begin::Compose-->
                        <textarea class="form-control border-0 p-0" rows="2" placeholder="Type a message"></textarea>
                        <div class="d-flex align-items-center justify-content-between mt-5">
                            <div class="mr-3">
                                <a href="#" class="btn btn-clean btn-icon btn-md mr-1">
                                    <i class="flaticon2-photograph icon-lg"></i>
                                </a>
                                <a href="#" class="btn btn-clean btn-icon btn-md">
                                    <i class="flaticon2-photo-camera icon-lg"></i>
                                </a>
                            </div>
                            <div>
                                <button type="button"
                                    class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
                            </div>
                        </div>
                        <!--begin::Compose-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
    <!--end::Chat Panel-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2"
                        height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </div>
    @include('sweetalert::alert')
    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <script src="{{ asset('') }}assets/js/pages/crud/datatables/data-sources/html.js"></script>



    <!--end::Global Config-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>


    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('') }}assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('') }}assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="{{ asset('') }}assets/js/scripts.bundle.js"></script>



    <script src="{{ asset('') }}assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->

    @stack('script')
</body>

</html>
