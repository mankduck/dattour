<div class="col-xl-4 col-lg-5">
    <div class="date-travel-card position-sticky top-0">
        <div class="price-review">
            <div class="d-flex gap-10 align-items-end">
                {{-- <p class="light-pera">From</p> --}}
                <p class="pera price">{{ number_format($tour->price, 0, ',', '.') }}đ</p>
            </div>
        </div>
        <h4 class="heading-card">Nhập thông tin đặt tour</h4>
        <form method="post" action="" class="contact-form">
            @csrf
            <div class="row g-4">
                <div class="col-sm-12">
                    <input class="custom-form" type="text" placeholder="Enter your email">
                </div>
                <div class="col-sm-12">
                    <input class="custom-form" type="text" placeholder="Tên của bạn">
                </div>
                <div class="col-sm-12">
                    <input class="custom-form" type="text" placeholder="Địa chỉ">
                </div>
                <div class="col-sm-12">
                    <input class="custom-form" type="text" placeholder="Số điện thoại">
                </div>
                <div class="col-sm-12">
                    <select name="" class="custom-form" id="">
                        <option value="">[Chọn ngày khởi hành]</option>
                        @foreach ($tour->tour_dates as $date)
                            <option value="">{{ convert_date($date->time) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12">
                    <div class="dropdown-section position-relative user-picker-dropdown">
                        <div class="d-flex gap-12 align-items-center">
                            <i class="dropdown-icon ri-user-line"></i>
                            <div class="custom-dropdown">
                                <h4 class="title">Số lượng người</h4>
                                <div class="arrow">
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="user-result"></div>
                        <div class="user-picker dropdown-shadow">
                            <div class="user-category">
                                <div class="category-name">
                                    <h4 class="title">Người lớn</h4>
                                    <p class="pera">12 tuổi trở lên</p>
                                </div>
                                <div class="qty-container">
                                    <button class="qty-btn-minus mr-1" type="button">
                                        <i class="ri-subtract-fill"></i>
                                    </button>
                                    <input type="text" name="adult" value="0" class="input-qty input-rounded">
                                    <button class="qty-btn-plus ml-1" type="button">
                                        <i class="ri-add-fill"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="user-category">
                                <div class="category-name">
                                    <h4 class="title">Trẻ em</h4>
                                    <p class="pera">0-11 tuổi</p>
                                </div>
                                <div class="qty-container">
                                    <button class="qty-btn-minus mr-1" type="button">
                                        <i class="ri-subtract-fill"></i>
                                    </button>
                                    <input type="text" name="children" value="0"
                                        class="input-qty input-rounded">
                                    <button class="qty-btn-plus ml-1" type="button">
                                        <i class="ri-add-fill"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="btn-section">
                                <a href="javascript:void(0)" class="done-btn">Done</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <textarea class="custom-form-textarea" id="exampleFormControlTextarea1" rows="3"
                        placeholder="Enter your message..."></textarea>
                </div>
            </div>
            <div class="mt-40">
                <button type="submit" class="send-btn w-100">Đặt Tour</button>
            </div>
        </form>

        <div class="footer bg-transparent">
            <h4 class="title">Hủy miễn phí</h4>
            <p class="pera">Trước khi xác nhận đơn hàng</p>
        </div>
    </div>
</div>
