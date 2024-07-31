<div class="ibox w">
    <div class="ibox-title">
        <h5>Thông tin chi tiết</h5>
    </div>
    <div class="ibox-content">
        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <label for="" class="control-label text-left">Thành Phố</label>
                    <select name="province_id" class="form-control setupSelect2 province location" data-target="districts">
                        <option value="">[Chọn Thành Phố]</option>
                        @if (isset($provinces))
                        @foreach ($provinces as $province)
                        <option @if (old('province_id')==$province->code) selected @endif
                            value="{{ $province->code }}">{{ $province->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <label for="" class="control-label text-left">Quận/Huyện </label>
                    <select name="district_id" class="form-control districts setupSelect2 location" data-target="wards">
                        <option value="0">[Chọn Quận/Huyện]</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <label for="" class="control-label text-left">Phường/Xã </label>
                    <select name="ward_id" class="form-control setupSelect2 wards">
                        <option value="0">[Chọn Phường/Xã]</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

@include('backend.tour.destination.component.publish')