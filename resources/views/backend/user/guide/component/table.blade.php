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
            <th class="text-center">Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($guides) && is_object($guides))
            @foreach ($guides as $guide)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $guide->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        <img src="{{ $guide->image }}" width="50px" alt="">
                    </td>
                    <td>
                        <div class="">{{ $guide->name }}</div>
                        <div class="">Ngày sinh: {{ convert_date($guide->birthday) }}</div>
                    </td>
                    <td class="text-center">
                        {{ $guide->account->email }}
                    </td>
                    <td>
                        {{ $guide->phone }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('guide.edit', $guide->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('guide.delete', $guide->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{-- {{ $guide->links('pagination::bootstrap-4') }} --}}
