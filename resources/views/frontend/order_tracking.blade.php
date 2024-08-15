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
                                        <i class="ri-ship-line"></i> Tour đang hoạt động
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="plan-link" id="book-tab" data-bs-toggle="tab" data-bs-target="#book"
                                        type="button" role="tab" aria-controls="book" aria-selected="false">
                                        <i class="ri-flight-takeoff-fill"></i> Lịch sử đặt tour
                                    </button>
                                </li>
                            </ul>
                            <!-- / End-of Buttons -->

                            <!-- Tab Search Contents -->
                            <div class="tab-content" id="tourTab">
                                <div class="tab-pane fade show active" id="tour" role="tabpanel"
                                    aria-labelledby="tour-tab">
                                    <!-- Contact area S t a r t -->
                                    @if (isset($bookings) && count($bookings))
                                        @foreach ($bookings as $booking)
                                            @if ($booking->status !== 3)
                                                @include('frontend.component.order_detail')
                                            @else
                                                <h4 class="contact-heading">Hiện tại không có tour nào đang hoạt động!</h4>
                                            @endif
                                        @endforeach
                                    @else
                                        <h4 class="contact-heading">Hiện tại không có tour nào đang hoạt động!</h4>
                                    @endif
                                    <!--/ End-of Contact-->
                                </div>
                                <div class="tab-pane fade" id="book" role="tabpanel" aria-labelledby="book-tab">
                                    <table>
                                        {{-- <tr>
                                            <th>Mã Tour</th>
                                            <th>Ngày khởi hành</th>
                                            <th>Tên Tour</th>
                                            <th>Giá</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> --}}
                                    </table>
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
