@extends('layout.admin')
@section('adminContent')
    @include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['index']['title']])
    <div class="wrapper wrapper-content">

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ $config['seo']['index']['table'] }} </h5>
                        @include('backend.dashboard.component.toolbox', ['model' => 'Guide'])
                    </div>
                    <div class="ibox-content">
                        @include('backend.user.guide.component.filter')
                    @include('backend.user.guide.component.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
