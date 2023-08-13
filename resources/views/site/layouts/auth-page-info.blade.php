@if($message = session()->get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

@if($message = session()->get('error'))
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@endif