
<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->


<!-- Mirrored from ableproadmin.com/pages/login-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 18:22:03 GMT -->
<head>
    <title>AncileAcademy - Login</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <!-- [Favicon] icon -->
    <link rel="icon" href="{{asset('backend/logo.svg')}}" type="image/x-icon"> <!-- [Font] Family -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/inter/inter.css')}}" id="main-font-link" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/tabler-icons.min.css')}}" >
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/feather.css')}}" >
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/fontawesome.css')}}" >
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/material.css')}}" >
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}" id="main-style-link" >
    <link rel="stylesheet" href="{{asset('backend/assets/css/style-preset.css')}}" >
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-14K1GBX9FG"></script>
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

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->

<div class="auth-main">
    <div class="auth-wrapper v1">
        <div class="auth-form">
            <div class="card my-5">
                <div class="card-body">
                    <div  style="margin-bottom: 50px;" class="text-center mb-7">
                        <a  href="#"><img height="50px"  src="{{asset('backend/logo.svg')}}" alt="img"></a>
                    </div>

                    <h4 class="text-center f-w-500 mb-3">Sign In</h4>
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email Address">
                            @error('email')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input name="password" type="password" class="form-control" id="floatingInput1" placeholder="Password">
                            @error('password')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="d-flex mt-1 justify-content-between align-items-center">
                            <div class="form-check">
                                <input name="remember" class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                                <label class="form-check-label text-muted" for="customCheckc1">Remember me?</label>
                            </div>
                            <a href="{{ route('password.request') }}"><h6 class="text-secondary f-w-400 mb-0">Forgot Password?</h6></a>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-between align-items-end mt-4">
{{--                        <h6 class="f-w-500 mb-0">Don't have an Account?</h6>--}}
{{--                        <a href="#" class="link-primary">Create Account</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
<!-- Required Js -->

</body>
<!-- [Body] end -->


<!-- Mirrored from ableproadmin.com/pages/login-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 18:22:03 GMT -->
</html>
