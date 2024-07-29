@extends('layout.admin')
@section('adminContent')
    @include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])

    <form action="{{ route('role.updatePermission') }}" method="post" class="box">
        @csrf
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Cấp quyền</h5>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th></th>
                                    @foreach ($roles as $role)
                                        <th class="text-center">{{ $role->name }}</th>
                                    @endforeach
                                </tr>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td><div
                                                class="uk-flex uk-flex-middle uk-flex-space-between">{{ $permission->name }}
                                                <span style="color:red;">({{ $permission->slug }})</span> </div></td>
                                        @foreach ($roles as $role)
                                            <td>
                                                <input
                                                    {{ collect($role->permissions)->contains('id', $permission->id) ? 'checked' : '' }}
                                                    type="checkbox" name="permission[{{ $role->id }}][]"
                                                    value="{{ $permission->id }}" class="form-control">
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </table>
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
