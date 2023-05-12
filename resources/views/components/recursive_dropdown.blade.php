@if ($key !== 'current')
    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
    @if (count($category['children']) > 0)
        <optgroup label=">">
            @foreach($category['children'] as $category)
                @include('components.recursive_dropdown', $category)
            @endforeach
        </optgroup>
    @endif
@endif