@extends('layout.admin')
@section('adminContent')
    @include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('role.update', $role->id) }}" method="post" class="box" enctype="multipart/form-data">
        @csrf
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-5">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                        <div class="panel-description">
                            <p>Nhập thông tin hướng dẫn viên</p>
                            <p>Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Tên quyền tài khoản<span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name="name" value="{{ old('name', $role->name) }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Chọn Tình Trạng <span
                                                class="text-danger">(*)</span></label>
                                        <select name="publish" class="form-control setupSelect2" id="">
                                            @foreach (config('apps.setup.publish') as $key => $val)
                                                <option {{ $key == old('publish', $role->publish) ? 'selected' : '' }}
                                                    value="{{ $key }}">
                                                    {{ $val }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Mô tả<span
                                                class="text-danger">(*)</span></label>
                                        <textarea name="description" class="custom-area form-control">{{ old('description', $role->description) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-right mb15">
                <button class="btn btn-primary" type="submit" name="send" value="send">Lưu lại</button>
            </div>
        </div>
    </form>

@endsection
