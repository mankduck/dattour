<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Tên</th>
            <th class="text-center">Số lượng TV</th>
            <th>Mô tả</th>
            <th class="text-center">Trạng thái </th>
            <th class="text-center">Tùy chọn </th>
        </tr>
    </thead>
    <tbody>
        @if (isset($tourCategories) && is_object($tourCategories))
            @foreach ($tourCategories as $tourCategorie)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $tourCategorie->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        <img src="{{ $tourCategorie->image }}" width="50px" height="50px" alt="">
                    </td>
                    <td>
                        {{ $tourCategorie->name }}
                    </td>
                    <td>
                        {{ $tourCategorie->slug }}
                    </td>
                    <td class="text-center js-switch-{{ $tourCategorie->id }}">
                        <input type="checkbox" value="{{ $tourCategorie->publish }}" class="js-switch status"
                            data-field="publish" data-model="{{ $config['model'] }}"
                            {{ $tourCategorie->publish == 2 ? 'checked' : '' }}
                            data-modelId="{{ $tourCategorie->id }}" />
                    </td>
                    <td class="text-center">
                        <a href="{{ route('tour.category.edit', $tourCategorie->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('tour.category.delete', $tourCategorie->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $tourCategories->links('pagination::bootstrap-4') }}
