<div class="ibox w">
    <div class="ibox-title">
        <h5>Chọn ngày khởi hành </h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="allDate">
                    <div class="form-row mb15">
                        <label for="" class="control-label text-left">Chọn ngày <span
                                class="text-danger">(*)</span></label>
                        @php
                            $tourDate = $tour->tour_dates;
                        @endphp
                        @if (isset($tourDate))
                            @foreach ($tourDate as $key => $val)
                                <input type="date" name="time[]" value="{{ old('time', $val) }}"
                                    class="form-control mb15" placeholder="" autocomplete="off">
                            @endforeach
                        @else
                            <input type="date" name="time[]" value="{{ old('time') }}" class="form-control"
                                placeholder="" autocomplete="off">
                        @endif
                    </div>
                </div>
                <p class="addDate">Thêm ngày khởi hành</p>
            </div>
        </div>
    </div>
</div>
