@extends('layout.client')
@section('clientContent')
    <!-- Breadcrumbs S t a r t -->
    @include('frontend.component.breadcrumb', ['title' => config('apps.menus.menu.account_info')])

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
                                        <i class="ri-user-fill"></i> Thông tin cá nhân
                                    </button>
                                </li>
                            </ul>
                            <!-- / End-of Buttons -->

                            <!-- Tab Search Contents -->
                            <div class="tab-content" id="tourTab">
                                <div class="tab-pane fade show active" id="tour" role="tabpanel"
                                    aria-labelledby="tour-tab">
                                </div>
                                <div class="tab-pane fade show active" id="book" role="tabpanel" aria-labelledby="book-tab">
                                    <form action="" method="post" class="border p-4 rounded bg-light">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name1" class="mb-3">Họ và tên:</label>
                                                        <input type="text" class="form-control" name="name" value="{{  }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name1" class="mb-3 mt-3">Số điện thoại: </label>
                                                        <input type="text" class="form-control" name="phone">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name1" class="mb-3 mt-3">Địa chỉ: </label>
                                                        <input type="text" class="form-control" id="name1" name="name1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name1" class="mb-3 mt-3">Ngày sinh: </label>
                                                        <input type="date" class="form-control" id="name1" name="name1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name1" class="mb-3 mt-3">Hình ảnh: </label>
                                                        <input type="file" class="form-control" id="name1" name="name1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-3 mt-md-0">
                                                        <label for="name2" class="mb-3">Tỉnh:</label>
                                                        <input type="text" class="form-control" id="name2" name="name2">
                                                    </div>
                                                    <div class="form-group mt-3 mt-md-0">
                                                        <label for="name2" class="mb-3 mt-3">Huyện:</label>
                                                        <input type="text" class="form-control" id="name2" name="name2">
                                                    </div>
                                                    <div class="form-group mt-3 mt-md-0">
                                                        <label for="name2" class="mb-3 mt-3">Phường:</label>
                                                        <input type="text" class="form-control" id="name2" name="name2">
                                                    </div>
                                                    <div class="form-group mt-3 mt-md-0">
                                                        <label for="name2" class="mb-3 mt-3">Thành viên VIP:</label>
                                                        <input type="text" class="form-control" id="name2" name="name2">
                                                    </div>
                                                    <div class="form-group mt-3 mt-md-0">
                                                        <label for="name2" class="mb-3 mt-3">Điểm thưởng:</label>
                                                        <input type="text" class="form-control" id="name2" name="name2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- / End-of Search Contents -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End-of Plan-->
@endsection
