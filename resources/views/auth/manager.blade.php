@extends('layout.client')
@section('clientContent')
    <!-- Breadcrumbs S t a r t -->
    @include('frontend.component.breadcrumb', ['title' => config('apps.menus.menu.order_tracking')])

    <!--/ End-of Breadcrumbs-->

    <!-- Plan area S t a r t -->
    <section class="section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="plan-section-three plan-shadow">
                        <div class="choose-plan-nav">

                            <!-- Buttons Type Select -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="plan-link active" id="tour-tab" data-bs-toggle="tab"
                                        data-bs-target="#tour" type="button" role="tab" aria-controls="tour"
                                        aria-selected="true">
                                        <i class="ri-ship-line"></i> Thông tin tài khoản
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="plan-link" id="book-tab" data-bs-toggle="tab" data-bs-target="#book"
                                        type="button" role="tab" aria-controls="book" aria-selected="false">
                                        <i class="ri-flight-takeoff-fill"></i> Thông tin đăng nhập
                                    </button>
                                </li>
                            </ul>
                            <!-- / End-of Buttons -->

                            <!-- Tab Search Contents -->
                            <div class="tab-content" id="tourTab">
                                <div class="tab-pane fade show active" id="tour" role="tabpanel"
                                    aria-labelledby="tour-tab">
                                    <!-- Contact area S t a r t -->
                                    <section class="contact-area">
                                        <div class="position-relative contact-bg-before">
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-12 col-lg-9">
                                                        <div class="contact-card">
                                                            <h4 class="contact-heading">Thông tin người dùng:</h4>

                                                            <div class="row g-4">
                                                                <div class="col-sm-6">
                                                                    <label for="">Họ tên</label>
                                                                    <input class="custom-form" type="text"
                                                                        value="{{ $user->name }}">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label for="">Số điện thoại</label>
                                                                    <input class="custom-form" type="text"
                                                                        value="{{ $user->phone }}">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="">Họ tên</label>
                                                                    <select name="province_id"
                                                                        class="custom-form setupSelect2 province location"
                                                                        data-target="districts">
                                                                        <option value="0">[Chọn Thành Phố]</option>
                                                                        @if (isset($provinces))
                                                                            @foreach ($provinces as $province)
                                                                                <option
                                                                                    @if (old('province_id') == $province->code) selected @endif
                                                                                    value="{{ $province->code }}">
                                                                                    {{ $province->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="">Họ tên</label>
                                                                    <select name="district_id"
                                                                        class="custom-form districts setupSelect2 location"
                                                                        data-target="wards">
                                                                        <option value="0">[Chọn Quận/Huyện]</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="">Họ tên</label>
                                                                    <select name="ward_id"
                                                                        class="custom-form setupSelect2 wards">
                                                                        <option value="0">[Chọn Phường/Xã]</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label for="">Địa chỉ</label>
                                                                    <input class="custom-form" type="text"
                                                                        value="{{ $user->address }}">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label for="">Ngày sinh</label>
                                                                    <input class="custom-form" type="text"
                                                                        value="{{ date('d-m-Y', strtotime($user->birthday)) ?? '' }}">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="">Ảnh đại diện</label>
                                                                    <input class="custom-form" type="text"
                                                                        value="">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="">Cấp thành viên</label>
                                                                    <input class="custom-form" type="text"
                                                                        value="{{ $user->vip_member }}">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="">Điểm thưởng</label>
                                                                    <input class="custom-form" type="text"
                                                                        value="{{ $user->point }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <!--/ End-of Contact-->
                                </div>
                                <div class="tab-pane fade" id="book" role="tabpanel" aria-labelledby="book-tab">

                                </div>
                            </div>
                            <!-- / End-of Search Contents -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var province_id = '{{ isset($user->province_id) ? $user->province_id : old('province_id') }}'
        var district_id = '{{ isset($user->district_id) ? $user->district_id : old('district_id') }}'
        var ward_id = '{{ isset($user->ward_id) ? $user->ward_id : old('ward_id') }}'
    </script>
    <!--/ End-of Plan-->
@endsection
