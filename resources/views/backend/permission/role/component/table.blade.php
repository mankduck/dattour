<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th class="text-center">Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($roles) && is_object($roles))
            @foreach ($roles as $role)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $role->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        {{ $role->name }}
                    </td>
                    <td>
                        {{ $role->description }}
                    </td>
                    <td class="text-center js-switch-{{ $role->id }}">
                        <input type="checkbox" value="{{ $role->publish }}" class="js-switch status " data-field="publish"
                            data-model="{{ $config['model'] }}" {{ $role->publish == 2 ? 'checked' : '' }}
                            data-modelId="{{ $role->id }}" />
                    </td>
                    <td class="text-center">
                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{-- {{ $role->links('pagination::bootstrap-4') }} --}}
