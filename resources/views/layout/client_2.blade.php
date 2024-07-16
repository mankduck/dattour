<!DOCTYPE html>
<html lang="en">
<head>
    @include('fontend.dashboard.component.head')
    @yield('style')
</head>
<body>
    <header>
        @include('fontend.service.component.header-top')
        @include('fontend.service.component.header-nav')
    </header>
    <section class="section-banner">
        @include('fontend.service.component.banner')
    </section>

    <section class="section-services padding-tb-100">
        <div class="container">
            @yield('content')
        </div>
    </section>


    <footer>
        @include('fontend.service.component.footer')
    </footer>

    @include('fontend.dashboard.component.script')
</body>
</html>
