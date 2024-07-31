@extends('layout.admin')
@section('adminContent')
@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
@include('backend.dashboard.component.formError')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('destination.store') }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-9">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông tin chung</h5>
                    </div>
                    <div class="ibox-content">
                        @include('backend.tour.destination.component.content', ['model' => $product ?? null])
                    </div>
                </div>
                @include('backend.tour.destination.component.album', ['model' => $product ?? null])
                @include('backend.tour.destination.component.setup', ['model' => $product ?? null])
                {{-- @include('backend.product.product.component.variant') --}}
                {{-- @include('backend.dashboard.component.seo', ['model' => $product ?? null]) --}}
            </div>
            <div class="col-lg-3">
                @include('backend.tour.destination.component.aside')
            </div>
        </div>
        @include('backend.dashboard.component.button')
    </div>
</form>

<script>
    var province_id = '{{ isset($destination->province_id) ? $destination->province_id : old('
    province_id ') }}'
    var district_id = '{{ isset($destination->district_id) ? $destination->district_id : old('
    district_id ') }}'
    var ward_id = '{{ isset($destination->ward_id) ? $destination->ward_id : old('
    ward_id ') }}'
</script>

@endsection