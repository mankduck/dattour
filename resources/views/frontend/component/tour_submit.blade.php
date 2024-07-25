<div class="col-xl-4 col-lg-5">
    <div class="date-travel-card position-sticky top-0">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h4 class="heading-card">Nhập thông tin đặt tour</h4>
        <p class="pera text-danger mb-20">Lưu ý: Trẻ em dưới 12 tuổi được giảm 20%</p>
        <form method="post" action="{{ route('frontend.booking') }}" class="contact-form">
            @csrf
            <div class="row g-4">
                <div class="col-sm-12">
                    <input class="custom-form" type="text" value="{{ old('email') }}" name="email"
                        placeholder="Enter your email">
                </div>
                <div class="col-sm-12">
                    <input class="custom-form" type="text" value="{{ old('name') }}" name="name"
                        placeholder="Tên của bạn">
                </div>
                <div class="col-sm-12">
                    <input class="custom-form" type="text" value="{{ old('address') }}" name="address"
                        placeholder="Địa chỉ">
                </div>
                <div class="col-sm-12">
                    <input class="custom-form" type="text" value="{{ old('phone') }}" name="phone"
                        placeholder="Số điện thoại">
                </div>
                <div class="col-sm-12">
                    <select name="tour_date" class="custom-form" id="">
                        <option value="">[Chọn ngày khởi hành]</option>
                        @foreach ($tour->tour_dates as $date)
                            <option value="{{ $date->time }}">{{ convert_date($date->time) }}</option>
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
                                    <input type="text" name="adult" value="0"
                                        class="input-qty adult input-rounded">
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
                                        class="input-qty children input-rounded">
                                    <button class="qty-btn-plus ml-1" type="button">
                                        <i class="ri-add-fill"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="btn-section">
                                <a href="javascript:void(0)" class="done-btn donePeople">Done</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <textarea name="description" class="custom-form-textarea custom-text" id="exampleFormControlTextarea1" rows="3"
                        placeholder="Yêu cầu riêng...">{{ old('description') }}</textarea>
                </div>
                <input type="hidden" name="total" class="totalHidden" value="">
                <input type="hidden" name="" class="pricelHidden" value="{{ $tour->price }}">
                <input type="hidden" name="total_chil" class="totalChil" value="">
                <input type="hidden" name="total_adult" class="totalAdult" value="">
                <input type="hidden" name="tour_id" value="{{ $tour->id }}">
            </div>
            <div class="mt-40">
                <button type="submit" class="send-btn w-100">Đặt Tour</button>
            </div>
        </form>

        {{-- <div class="price-review">
            <div class="d-flex gap-10 align-items-end">
                <p class="pera price">{{ number_format($tour->price, 0, ',', '.') }}đ</p>
            </div>
        </div> --}}
        <div class="footer bg-transparent">


            <div class="row g-4 totalBill">

            </div>
        </div>
    </div>
</div>
