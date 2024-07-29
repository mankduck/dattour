<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Email</th>
            <th>Role</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($accounts) && is_object($accounts))
            @foreach ($accounts as $account)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $account->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        {{ $account->email }}
                    </td>
                    <td>
                        {{$account->role->name}}
                    </td>
                    <td class="text-center js-switch-{{ $account->id }}">
                        <input type="checkbox" value="{{ $account->publish }}" class="js-switch status"
                            data-field="publish" data-model="{{ $config['model'] }}"
                            {{ $account->publish == 2 ? 'checked' : '' }} data-modelId="{{ $account->id }}" />
                    </td>

                    <td class="text-center">
                        <a href="{{ route('account.edit', $account->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('account.delete', $account->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $accounts->links('pagination::bootstrap-4') }}
