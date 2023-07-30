@foreach ($categories ?? [] as $category)
    <span class="badge rounded-pill bg-info">{{ $category->title }}</span>
@endforeach
