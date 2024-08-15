@php
    $publish = request('publish') ?: old('publish');
@endphp
<select name="publish" class="form-control setupSelect2 ml10">
    <option value="0">[Chọn tình trạng]</option>
    @foreach (config('apps.setup.publish') as $key => $val)
        <option {{ $publish == $key ? 'selected' : '' }} value="{{ $key }}">{{ $val }}</option>
    @endforeach
</select>
