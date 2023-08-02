@foreach ($permissions ?? [] as  $key => $permission)
    <span class="badge rounded-sm bg-info" style="text-transform: capitalize">{{ $permission->name }}</span>
    @if (($key + 1) % 4 === 0)
        <br>
    @endif
@endforeach