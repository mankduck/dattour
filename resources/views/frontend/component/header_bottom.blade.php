<div class="header-bottom header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="menu-wrapper">
                    <!-- Main-menu for desktop -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <div class="d-flex justify-content-between align-items-center">
                                <ul class="listing" id="navigation">
                                    <li class="single-list">
                                        <a href="{{ route('home.index') }}" class="single link-active">Trang chủ</a>
                                    </li>
                                    <li class="single-list">
                                        <a href="about.html" class="single">Về chúng tôi</a>
                                    </li>
                                    <li class="single-list">
                                        <a href="{{ route('home.destination') }}" class="single">Điểm đến</a>
                                    </li>
                                    <li class="single-list">
                                        <a href="javascript:void(0)" class="single">Gói Tour <i
                                                class="ri-arrow-down-s-line"></i></a>
                                        <ul class="submenu">
                                            @foreach ($tourCategories as $tourCategory)
                                                <li class="single-list">
                                                    <a href="{{ route('frontend.tour.list', $tourCategory->slug) }}"
                                                        class="single">{{ $tourCategory->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    {{-- <li class="single-list">
                                        <a href="javascript:void(0)" class="single">Pages <i
                                                class="ri-arrow-down-s-line"></i></a>
                                        <ul class="submenu">
                                            <li class="single-list">
                                                <a href="tour-details.html" class="single">Tour
                                                    Details</a>
                                            </li>
                                            <li class="single-list">
                                                <a href="news-details.html" class="single">News
                                                    Details</a>
                                            </li>
                                            <li class="single-list">
                                                <a href="destination-details.html" class="single">Destination
                                                    Details</a>
                                            </li>
                                            <li class="single-list">
                                                <a href="payment.html" class="single">payment</a>
                                            </li>
                                            <li class="single-list">
                                                <a href="javascript:void(0)" class="single">Login<i
                                                        class="ri-arrow-right-s-line"></i></a>
                                                <ul class="submenu">
                                                    <li class="single-list">
                                                        <a href="login.html" class="single">Login</a>
                                                    </li>
                                                    <li class="single-list">
                                                        <a href="register.html" class="single">Registration</a>
                                                    </li>
                                                    <li class="single-list">
                                                        <a href="forgot-pass.html" class="single">Forgot
                                                            Password</a>
                                                    </li>
                                                    <li class="single-list">
                                                        <a href="verification.html" class="single">Verification</a>
                                                    </li>
                                                    <li class="single-list">
                                                        <a href="new-password.html" class="single">New
                                                            Password</a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="single-list">
                                                <a href="faq.html" class="single">FAQs</a>
                                            </li>
                                            <li class="single-list">
                                                <a href="privacy-policy.html" class="single">privacy
                                                    policy</a>
                                            </li>
                                            <li class="single-list">
                                                <a href="terms-condition.html" class="single">terms-condition</a>
                                            </li>
                                        </ul>
                                    </li> --}}
                                    <li class="single-list">
                                        <a href="news.html" class="single">Tin tức</a>
                                    </li>
                                    <li class="single-list">
                                        <a href="contact.html" class="single">Liên hệ</a>
                                    </li>
                                    <li class="d-block d-lg-none">
                                        <div class="header-right">
                                            <div class="sign-btn">
                                                @if (Auth::check())
                                                    @php
                                                        $username = Auth::user()->username;
                                                    @endphp
                                                    <ul class="listing" id="navigation">
                                                        <li class="single-list">
                                                            <a href="javascript:void(0)"
                                                                class="single">{{ $username }}
                                                                <i class="ri-arrow-down-s-line"></i></a>
                                                            <ul class="submenu">
                                                                <li class="single-list">
                                                                    <a href="{{ route('manager_account', $username) }}"
                                                                        class="single">Quản lý tài
                                                                        khoản</a>
                                                                    <a href="{{ route('order_tracking') }}"
                                                                        class="single">Theo dõi đơn hàng</a>
                                                                    <a href="{{ route('logout') }}" class="single">Đăng
                                                                        xuất</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                @else
                                                    <a href="{{ route('login') }}" class="btn-secondary-sm">Sign In</a>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="header-right">
                                    <div class="sign-btn">
                                        @if (Auth::check())
                                            <ul class="listing" id="navigation">
                                                <li class="single-list">
                                                    <a href="javascript:void(0)" class="single">{{ $username }}
                                                        <i class="ri-arrow-down-s-line"></i></a>
                                                    <ul class="submenu">
                                                        <li class="single-list">
                                                            <a href="{{ route('manager_account', $username) }}"
                                                                class="single">Quản lý tài khoản</a>
                                                            <a href="{{ route('order_tracking') }}" class="single">Theo
                                                                dõi đơn hàng</a>
                                                            <a href="{{ route('logout') }}" class="single">Đăng
                                                                xuất</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        @else
                                            <a href="{{ route('login') }}" class="btn-secondary-sm">Sign In</a>
                                        @endif
                                    </div>
                                    <!-- Theme Mode -->
                                    <li class="single-list">
                                        <button class="ToggleThemeButton change-theme-mode m-0 p-0 border-0">
                                            <i class="ri-sun-line"></i>
                                        </button>
                                    </li>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="div">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>
