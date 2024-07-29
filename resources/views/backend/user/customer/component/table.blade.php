<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Hình ảnh</th>
            <th>Thông tin</th>
            <th>Email</th>
            <th>SDT</th>
            <th>Địa chỉ</th>
            <th class="text-center">Điểm</th>
            <th class="text-center">Vip</th>
            {{-- <th class="text-center">Trạng thái</th> --}}
            <th class="text-center">Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($users) && is_object($users))
            @foreach ($users as $user)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $user->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        <img src="{{ $user->image }}" width="50px" height="50px" alt="">
                    </td>
                    <td>
                        <div>{{ $user->name }}</div>
                        <div>Ngày sinh: {{ convert_date($user->birthday) }}</div>
                    </td>
                    <td>
                        {{ $user->account->email }}
                    </td>
                    <td>
                        {{ $user->phone }}
                    </td>
                    {{-- @dd($user->provinces) --}}
                    <td>
                        {{ $user->address }}, {{ $user->wards->name ?? '' }}, {{ $user->districts->name ?? '' }},
                        {{ $user->provinces->name ?? '' }}
                    </td>
                    <td>
                        {{ $user->point }}
                    </td>
                    <td class="text-center">
                        @foreach (config('apps.setup.vip') as $key => $val)
                            {{ $user->vip_member == $key ? $val : '' }}
                        @endforeach
                    </td>
                    <td class="text-center">
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $users->links('pagination::bootstrap-4') }}
