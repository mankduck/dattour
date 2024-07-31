<div class="ibox w">
    <div class="ibox-title">
        <h5>Thêm ảnh đại diện </h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="image img-cover image-target"><img
                            src="{{ old('image', $destination->image ?? '') ? old('image', $destination->image ?? '') : 'backend/img/not-found.png' }}"
                            alt=""></span>
                    <input type="hidden" name="image" value="{{ old('image', $destination->image ?? '') }}">
                </div>
            </div>
        </div>
    </div>
</div>
