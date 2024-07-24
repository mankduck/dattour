<!DOCTYPE html>
<html lang="zxx" dir="lrt">

<!-- Mirrored from travelloo.vercel.app/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jul 2024 14:23:55 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <script>
        const setTheme = (theme) => {
            theme ??= localStorage.theme || "light";
            document.documentElement.dataset.theme = theme;
            localStorage.theme = theme;
        };
        setTheme();
    </script>
    @include('frontend.component.css')
</head>

<body>
    <header>
        <div class="header-area">
            <div class="main-header">
                <!-- Header Top -->
                @include('frontend.component.header_top')
                <!-- Header Bottom -->
                @include('frontend.component.header_bottom')
            </div>
            <!-- Search box -->
            @include('frontend.component.search')
            <!-- / End-Search -->
        </div>
    </header>
    <main>
        @yield('clientContent')
    </main>

    @include('frontend.component.footer')

    <!-- Scroll Up  -->
    <div class="progressParent" id="back-top">
        <svg class="backCircle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Add an search-overlay element -->
    <div class="search-overlay"></div>

    @include('frontend.component.script')
    
</body>

<!-- Mirrored from travelloo.vercel.app/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jul 2024 14:26:50 GMT -->

</html>
