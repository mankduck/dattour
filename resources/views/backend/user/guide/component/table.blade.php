<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Họ và tên</th>
            <th>Hình ảnh</th>
            <th>SDT</th>
            <th>Email</th>
            <th class="text-center">Trạng thái</th>
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
                        {{ $guide->name }}
                    </td>
                    <td>
                        <img src="{{ $guide->image }}" width="50px" alt="">
                    </td>
                    <td>
                        {{ $guide->phone }}
                    </td>
                    </td>
                    <td class="text-center">
                        {{ $guide->email }}
                    </td>
                    <td class="text-center js-switch-{{ $guide->id }}">
                        <input type="checkbox" value="{{ $guide->publish }}" class="js-switch status"
                            data-field="publish" data-model="{{ $config['model'] }}"
                            {{ $guide->publish == 2 ? 'checked' : '' }} data-modelId="{{ $guide->id }}" />
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
