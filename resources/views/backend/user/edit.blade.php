@extends('backend.layouts.app')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="fw-bold py-3 mb-4">
                <a href="{{ route('admin.users.index') }}" class="text-muted fw-light">Users /</a> 
                Edit
            </h4>
        </div>
        <div class="row">
            <div class="col-xxl">
                <div class="card bg-light mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            @include('backend.user.partials._form', ['disable' => true])
                            <div class="row justify-content-end">
                                <div class="col-sm-10 d-flex justify-content-end">
                                    <button class="btn btn-secondary me-3">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection