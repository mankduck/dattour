    <div class="row mb15">
        <div class="col-lg-12">
            <div class="form-row">
                <label for="" class="control-label text-left">Tên Địa Danh <span class="text-danger">(*)</span></label>
                <input type="text" name="name" value="{{ old('name', $destination->name ?? '') }}" class="form-control" placeholder="" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
            </div>
        </div>
    </div>
    <div class="row mb15">
        <div class="col-lg-12">
            <div class="form-row">
                <label for="" class="control-label text-left">Mô Tả <span class="text-danger">(*)</span></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" class="form-control" placeholder="" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>{{ old('description', $destination->description ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <div class="row mb30">
        <div class="col-lg-12">
            <div class="form-row">
                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                    <label for="" class="control-label text-left">Nội Dung <span class="text-danger">(*)</span> </label>
                </div>
                <textarea name="content" class="form-control ck-editor" placeholder="" autocomplete="off" id="ckContent" data-height="500" {{ isset($disabled) ? 'disabled' : '' }}>{{ old('description', $destination->description ?? '') }}</textarea>
            </div>
        </div>
    </div>