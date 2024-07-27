<section class="contact-area">
    <div class="position-relative contact-bg-before">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-9">
                    <div class="contact-card">
                        <h4 class="contact-heading">Thông tin chi tiết tour đã
                            đặt:</h4>
                        <h6 class="mb-20 text-error">Trạng thái:
                            @foreach (config('apps.setup.status') as $key => $val)
                                {{ $booking->status == $key ? $val : '' }}
                            @endforeach
                        </h6>
                        <div class="row g-4">
                            <div class="col-sm-4">
                                <input class="custom-form" type="text" value="{{ $booking->name }}" readonly>
                            </div>
                            <div class="col-sm-4">
                                <input class="custom-form" type="text" value="{{ $booking->email }}" readonly>
                            </div>
                            <div class="col-sm-4">
                                <input class="custom-form" type="text" value="{{ $booking->phone }}" readonly>
                            </div>
                            <div class="col-sm-4">
                                <input class="custom-form" type="text"
                                    value="Ngày khởi hành: {{ convert_date($booking->tour_date) }}" readonly>
                            </div>
                            <div class="col-sm-8">
                                <input class="custom-form" type="text" value="{{ $booking->tour->name }}" readonly>
                            </div>
                            <div class="col-sm-4">
                                <input class="custom-form" type="text"
                                    value="{{ number_format($booking->total, 0, ',', '.') }}đ" readonly>
                            </div>
                            <div class="col-sm-4">
                                <input class="custom-form" type="text"
                                    value="HDV: {{ $booking->guide->name ?? 'Chưa phân công' }}" readonly>
                            </div>
                            <div class="col-sm-4">
                                <input class="custom-form" type="text"
                                    value="{{ $booking->adult }} người lớn, {{ $booking->children }} trẻ em" readonly>
                            </div>
                            <div class="col-sm-12">
                                <input class="custom-form" type="text"
                                    value="{{ $booking->description ?? 'Không có yêu cầu đặc biệt' }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
