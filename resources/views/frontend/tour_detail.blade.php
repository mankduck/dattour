@extends('layout.client')
@section('clientContent')
    <!-- Destination area S t a r t -->
    <section class="tour-details-section section-padding2">
        <div class="tour-details-area">

            <!-- Details Banner Slider -->
            <div class="tour-details-banner">
                <div class="swiper tourSwiper-active">
                    <div class="swiper-wrapper">
                        @foreach ($tour->album as $key => $val)
                            <div class="swiper-slide">
                                <img src="{{ $val }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"><i class="ri-arrow-right-s-line"></i></div>
                    <div class="swiper-button-prev"><i class="ri-arrow-left-s-line"></i></div>
                </div>
            </div>
            <!-- / Slider-->

            <div class="tour-details-container">
                <div class="container">

                    <!-- Details Heading -->
                    <div class="details-heading">
                        <div class="d-flex flex-column">
                            <h4 class="title">{{ $tour->name }}</h4>
                            <div class="d-flex flex-wrap align-items-center gap-30 mt-16">
                                <div class="location">
                                    <i class="ri-map-pin-line"></i>
                                    <div class="name">{{ $tour->destination->name }}</div>
                                </div>
                                <div class="divider"></div>
                                <div class="d-flex align-items-center flex-wrap gap-20">
                                    <div class="count">
                                        <i class="ri-time-line"></i>
                                        <p class="pera">3 Days 2 Night</p>
                                    </div>
                                    <div class="count">
                                        <i class="ri-user-line"></i>
                                        <p class="pera">2 Person</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="price-review">
                            <div class="d-flex gap-10 align-items-end">
                                <p class="pera">{{ number_format($tour->price, 0, ',', '.') }}đ</p>
                            </div>
                            <div class="rating">
                                <i class="ri-star-s-fill"></i>
                                <p class="pera">4.7 (20 Reviews)</p>
                            </div>
                        </div>
                    </div>
                    <!-- / Details Heading -->

                    <div class="mt-30">
                        <div class="row g-4">
                            <!-- Left content -->
                            <div class="col-xl-8 col-lg-7">

                                <!-- About tour -->
                                <div class="tour-details-content">
                                    <h4 class="title">About</h4>
                                    <p class="pera">{!! $tour->description !!}</p>
                                </div>
                                <!-- / About tour -->

                                <!-- Tour Include Exclude -->
                                {{-- <div class="tour-include-exclude radius-6">
                                    <div class="includ-exclude-point">
                                        <h4 class="title">Included</h4>

                                        <ul class="expect-list">
                                            @foreach ($tour->tour_dates as $date)
                                                <li class="list">Ngày khởi hành: {{ $date->time }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="includ-exclude-point">
                                        <h4 class="title">Dịch Vụ</h4>

                                        <ul class="expect-list">
                                            @foreach ($tour->services as $service)
                                                <li class="list">{{ $service->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div> --}}
                                <!-- / Tour Include Exclude -->

                                <!-- Tour Plan accordion-->
                                <div class="tour-details-content mt-30 mb-30">
                                    {{-- <h4 class="title">Tour Plan</h4> --}}
                                    <div class="destination-accordion">
                                        {!! $tour->link !!}
                                    </div>
                                </div>
                                <!-- / Tour Plan accordion-->

                            </div>

                            <!-- Right content -->
                            @include('frontend.component.tour_submit')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End-of Destination -->
@endsection
