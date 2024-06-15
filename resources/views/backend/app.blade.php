<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->


<!-- Mirrored from ableproadmin.com/dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 18:19:58 GMT -->
<head>
    <title>Ancileacademy - Admin Dashboard</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
          content="Able Pro is trending dashboard template made using Bootstrap 5 design framework. Able Pro is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies.">
    <meta name="keywords"
          content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard">
    <meta name="author" content="Phoenixcoded">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{asset('backend/logo.svg')}}" type="image/x-icon"> <!-- [Font] Family -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/inter/inter.css')}}" id="main-font-link"/>
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/tabler-icons.min.css')}}">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/feather.css')}}">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/fontawesome.css')}}">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/material.css')}}">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}" id="main-style-link">
    <link rel="stylesheet" href="{{asset('backend/assets/css/style-preset.css')}}">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-14K1GBX9FG"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLR4zYJ5iENBO06fYlB8kEzZ55niPy5XKpQ+cl4zp2"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>


    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-14K1GBX9FG');
    </script>
    <!-- WiserNotify -->
    <script>
        !(function () {
            if (window.t4hto4) console.log('WiserNotify pixel installed multiple time in this page');
            else {
                window.t4hto4 = !0;
                var t = document,
                    e = window,
                    n = function () {
                        var e = t.createElement('script');
                        (e.type = 'text/javascript'),
                            (e.async = !0),
                            (e.src = '../../pt.wisernotify.com/pixel6d4c.js?ti=1jclj6jkfc4hhry'),
                            document.body.appendChild(e);
                    };
                'complete' === t.readyState ? n() : window.attachEvent ? e.attachEvent('onload', n) : e.addEventListener('load', n, !1);
            }
        })();
    </script>
    <!-- Microsoft clarity -->
    <script type="text/javascript">
        (function (c, l, a, r, i, t, y) {
            c[a] =
                c[a] ||
                function () {
                    (c[a].q = c[a].q || []).push(arguments);
                };
            t = l.createElement(r);
            t.async = 1;
            t.src = 'https://www.clarity.ms/tag/' + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, 'clarity', 'script', 'gkn6wuhrtb');
    </script>

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast=""
      data-pc-theme="light">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{route('admin.dashboard')}}" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img style="height: 60px" src="{{asset('backend/logo.svg')}}" class="img-fluid" alt="logo">
                {{--                <span class="badge bg-light-success rounded-pill ms-2 theme-version">v9.0</span>--}}
            </a>
        </div>
        <div class="navbar-content">
            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{asset('backend/assets/images/user/avatar-1.jpg')}}" alt="user-image"
                                 class="user-avtar wid-45 rounded-circle"/>
                        </div>
                        <div class="flex-grow-1 ms-3 me-2">
                            <h6 class="mb-0">{{Auth::user()->first_name}}</h6>
                            <small>Admin</small>
                        </div>
                        <a class="btn btn-icon btn-link-secondary avtar" data-bs-toggle="collapse"
                           href="#pc_sidebar_userlink">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-sort-outline"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="collapse pc-user-links" id="pc_sidebar_userlink">
                        <div class="pt-3">
                            <a href="{{route('admin.profile.view')}}">
                                <i class="ti ti-user"></i>
                                <span>My Account</span>
                            </a>

                            <a href="{{route('logout')}}">
                                <i class="ti ti-power"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{route('admin.dashboard')}}" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-status-up"></use>
              </svg>
            </span>
                        <span class="pc-mtext">Dashboard</span>
                        {{--                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>--}}
                        {{--                        <span class="pc-badge">2</span>--}}
                    </a>

                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                    <span class="pc-micon">
                    <i style="font-size: 20px;" class="ph-duotone ph-file-cloud"></i>

                    </span>
                        <span class="pc-mtext">Applications</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('application.view') }}">Add
                                Application</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('application.all') }}">All
                                Applications</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('consultation.all')}}">Consultations</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.english.view')}}">English Test</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.academy.view')}}">Academy
                                Tutorials</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.apply.course.all')}}">Applied
                                Courses</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.loan.all')}}">Loan Application</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i style="font-size: 20px;" class="ph-duotone ph-users-three"></i>

                        </span>
                        <span class="pc-mtext">Users</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span
                        ></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('user.add.view')}}">Add User</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('user.view')}}">All Users</a></li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i style="font-size: 20px;" class="ph-duotone ph-quotes"></i>

                        </span>
                        <span class="pc-mtext">Testimonial</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span
                        ></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.testimonial.view')}}">Add
                                Testimonial</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.testimonial.all')}}">All
                                Testimonials</a></li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i style="font-size: 20px;" class="ph-duotone ph-seal-question"></i>

                        </span>
                        <span class="pc-mtext">FAQ</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span
                        ></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.askgpt.view')}}">Add FAQ</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.askgpt.all')}}">All FAQs</a></li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                          <svg class="pc-icon">
                            <use xlink:href="#custom-keyboard"></use>
                          </svg>
                        </span>
                        <span class="pc-mtext">Resources</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span
                        ></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.resource.view')}}">Add Resource</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.resource.all')}}">All Resources</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.resource.download')}}">Resource
                                Download</a></li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i style="font-size: 20px;" class="ph-duotone ph-map-pin"></i>

                        </span>
                        <span class="pc-mtext">Destinations</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span
                        ></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.destination.view')}}">Add
                                Destination</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.destination.all')}}">All
                                Destinations</a></li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i style="font-size: 20px;" class="ph-duotone ph-book"></i>

                        </span>
                        <span class="pc-mtext">Courses</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span
                        ></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.course.view')}}">Add Course</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.course.all')}}">All Courses</a></li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i style="font-size: 20px;" class="ph-duotone ph-book-open-text"></i>

                        </span>
                        <span class="pc-mtext">Blog & News</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span
                        ></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.blog.view')}}">Add Blog & News</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.blog.all')}}">All Blog & News</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i style="font-size: 20px;" class="ph-duotone ph-user-focus"></i>

                        </span>
                        <span class="pc-mtext">Counsellors</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span
                        ></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('counsellor.view')}}">Add Counsellor</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="{{route('counsellor.all')}}">All Counsellors</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i style="font-size: 20px;" class="ph-duotone ph-globe-hemisphere-west"></i>

                        </span>
                        <span class="pc-mtext">Website Settings</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span
                        ></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('role.view')}}">Role & Permission</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('program.view')}}">Program Category</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin_manager.view')}}">Admin</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('status.view')}}">Status</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('homeslider.view')}}">Home Slider</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('ribbon.view')}}">Ribbon</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('manage.country.view')}}">Countries</a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
<header class="pc-header">
    <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- ======= Menu collapse Icon ===== -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>

            </ul>
        </div>
        <!-- [Mobile Media Block end] -->
        <div class="ms-auto">
            <ul class="list-unstyled">

                <li class="dropdown pc-h-item">
                    <a
                        class="pc-head-link dropdown-toggle arrow-none me-0"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="false"
                        aria-expanded="false"
                    >
                        <svg class="pc-icon">
                            <use xlink:href="#custom-setting-2"></use>
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                        <a href="{{route('admin.profile.view')}}" class="dropdown-item">
                            <i class="ti ti-user"></i>
                            <span>My Account</span>
                        </a>

                        <a href="{{route('logout')}}" class="dropdown-item">
                            <i class="ti ti-power"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>

                <li class="dropdown pc-h-item">
                    <a
                        class="pc-head-link dropdown-toggle arrow-none me-0"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="false"
                        aria-expanded="false"
                    >
                        <svg class="pc-icon">
                            <use xlink:href="#custom-notification"></use>
                        </svg>
                        <span
                            class="badge bg-success pc-h-badge">{{count($loan_not) + count($application_not) + count($consultations_not) }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h5 class="m-0"> All Notifications <span
                                    class="badge bg-success pc-h-badge"> {{count($loan_not) + count($application_not) + count($consultations_not) }}</span>
                            </h5>
                            <a href="#!" class="btn btn-link btn-sm"></a>
                        </div>
                        <div class="dropdown-body text-wrap header-notification-scroll position-relative"
                             style="max-height: calc(100vh - 215px)">
                            <p class="text-span">You have <span
                                    class="badge bg-danger">{{count($application_not)}}</span> new Application(s) alert
                            </p>

                            @if(count($application_notification) > 0)
                                @foreach($application_notification as $notification)
                                    <a href="{{route('admin.application.review', $notification->id)}}">
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <i style="font-size: 20px;"
                                                           class="ph-duotone ph-note-pencil"></i>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        {{--                                                        <span class="float-end text-sm text-muted">1 hour ago</span>--}}
                                                        <h5 class="text-body mb-2">{{$notification->full_name}}</h5>
                                                        <p>i just applied for a new application, please respond
                                                            promptly, thank you.</p>
                                                        <p>{{ $notification->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                @endforeach
                                <div class="mt-4 mb-3">
                                    <a class="btn btn-danger text-white" href="{{route('application.all')}}">Show all
                                        applications</a>

                                </div>
                            @endif

                            <br/>
                            <br/>

                            <p class="text-span">You have <span
                                    class="badge bg-primary">{{count($loan_not)}}</span> new loan(s) alert
                            </p>

                            @if(count($loan_notification) > 0)
                                @foreach($loan_notification as $not)
                                    <a href="{{route('loan.view', $not->id)}}">
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <i style="font-size: 20px;"
                                                           class="ph-duotone ph-money"></i>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        {{--                                                        <span class="float-end text-sm text-muted">1 hour ago</span>--}}
                                                        <h5 class="text-body mb-2">{{$not->first_name}}</h5>
                                                        <p>i just applied for a loan, please respond promptly, thank
                                                            you.</p>
                                                        <p>{{ $not->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                @endforeach
                                <div class="mt-4 mb-3">
                                    <a class="btn btn-primary text-white" href="{{route('admin.loan.all')}}">Show all
                                        loans</a>

                                </div>
                            @endif


                            <br/>
                            <br/>


                            <p class="text-span">You have <span class="badge bg-warning">{{count($consultations_not)}}</span> new consultation(s) alert
                            </p>

                            @if(count($consultation_notification) > 0)
                                @foreach($consultation_notification as $consultation)
                                    <a href="{{route('consultation.view', $consultation->id)}}">
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <i style="font-size: 20px;"
                                                           class="ph-duotone ph-folder-user"></i>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
{{--                                                        <span class="float-end text-sm text-muted">1 hour ago</span>--}}
                                                        <h5 class="text-body mb-2">{{$consultation->first_name}} {{$consultation->last_name}}</h5>
                                                        <p>i want to get consultation, please respond promptly, thank you.</p>
                                                        <p>{{ $consultation->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                @endforeach
                                <div class="mt-4 mb-3">
                                    <a class="btn btn-warning text-white" href="{{route('consultation.all')}}">Show all
                                        consultations</a>

                                </div>
                            @endif


                        </div>

                    </div>
                </li>
                <li class="dropdown pc-h-item header-user-profile">
                    <a
                        class="pc-head-link dropdown-toggle arrow-none me-0"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="false"
                        data-bs-auto-close="outside"
                        aria-expanded="false"
                    >
                        <img src="{{asset('backend/assets/images/user/avatar-2.jpg')}}" alt="user-image"
                             class="user-avtar"/>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">@yield('page')</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h4 style="margin: 20px 1px;" class="mb-0">@yield('title')</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <!-- [Page Specific JS] start -->
        <script src="{{asset('backend/assets/js/plugins/apexcharts.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/pages/dashboard-default.js')}}"></script>
        <!-- [Page Specific JS] end -->
        <!-- Required Js -->
        <script src="{{asset('backend/assets/js/plugins/popper.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/plugins/simplebar.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/plugins/bootstrap.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/fonts/custom-font.js')}}"></script>
        <script src="{{asset('backend/assets/js/pcoded.js')}}"></script>
        <script src="{{asset('backend/assets/js/plugins/feather.min.js')}}"></script>


        <script>layout_change('light');</script>


        <script>layout_theme_contrast_change('false');</script>


        <script>change_box_container('false');</script>


        <script>layout_caption_change('true');</script>


        <script>layout_rtl_change('false');</script>


        <script>preset_change("preset-1");</script>

</body>
<!-- [Body] end -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}";
    switch (type) {
        case 'info':
            Toastify({
                text: "{{ Session::get('message') }}", duration: 3000,
                style: {background: "linear-gradient(to right, #00b09b, #96c93d)"}
            }).showToast();
            break;

        case 'success':
            Toastify({
                text: "{{ Session::get('message') }}", duration: 3000,
                style: {background: "linear-gradient(to right, #00b09b, #96c93d)"}
            }).showToast();
            break;

        case 'warning':
            Toastify({
                text: "{{ Session::get('message') }}", duration: 3000,
                style: {background: "linear-gradient(to right, #00b09b, #96c93d)"}
            }).showToast();
            break;

        case 'error':
            Toastify({
                text: "{{ Session::get('message') }}", duration: 3000,
                style: {background: "linear-gradient(to right, #ff0000, #ff0000)"}
            }).showToast();
            break;
    }

    // Unset the session
    {{ Session::forget('message') }}
    {{ Session::forget('alert-type') }}
    @endif
</script>


<script>
    $(document).ready(function () {
        $('#my-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true
        });
    });
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script> var editor = new FroalaEditor('#myTextarea'); </script>


<script>
    ClassicEditor
        .create(document.querySelector('#myTextarea'))
        .catch(error => {
            console.error(error);
        });
</script>

<style>
    /* Custom styles to enlarge the editor */
    .ck-editor__editable_inline {
        min-height: 200px;
        width: 100%;
    }
</style>


<!-- Mirrored from ableproadmin.com/dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 18:20:32 GMT -->
</html>
