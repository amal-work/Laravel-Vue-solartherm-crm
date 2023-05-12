<li>{{ $category['name'] }}</li>
@if (count($category['children']) > 0)
    <ul>
        @foreach($category['children'] as $category)
            @include('components.recursive_list', $category)
        @endforeach
    </ul>
@endif