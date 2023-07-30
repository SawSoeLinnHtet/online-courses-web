@foreach ($categories ?? [] as  $key => $category)
    <span class="badge rounded-sm bg-info" style="text-transform: capitalize">{{ $category->title }}</span>
    @if (($key + 1) % 3 === 0)
        <br>
    @endif
@endforeach
