<!DOCTYPE html>
<html lang="en">
<head>
    @include('fontend.dashboard.component.head')
</head>
<body>
    <header>
        <div class="lh-header">
            <div class="container">
                @include('fontend.dashboard.component.nav')
            </div>
        </div>
    </header>
    <!-- Hero Slider Start -->
    <section class="section lh-hero m-tb-40">
        <div class="lh-main-content">
            @include('fontend.dashboard.component.slide')
        </div>
    </section>
    <!-- Hero Slider End -->

    <!-- search-control -->
    <section class="section-search-control section-search-control-2">
        <div class="container">
            @include('fontend.dashboard.component.search')
        </div>
    </section>
    @yield('content')
    <footer>
        @include('fontend.dashboard.component.footer')
    </footer>
    @include('fontend.dashboard.component.script')
</body>
</html>
