@extends('backend.layouts.app')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="fw-bold py-3 mb-4">
                <a href="{{ route('admin.admins.index') }}" class="text-muted fw-light">Instructor /</a> 
                Edit
            </h4>
        </div>
        <div class="row">
            <div class="col-xxl">
                <div class="card bg-light mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.instructors.update', $instructor->id) }}" id="instructor-edit-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            @include('backend.instructor.partials._form', ['disable' => true])
                            <div class="row justify-content-end">
                                <div class="col-sm-10 d-flex justify-content-end">
                                    <a href="{{ route('admin.instructors.index') }}" class="btn btn-secondary me-3">Cancel</a>
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

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\InstructorRequest', '#instructor-edit-form') !!}
@endpush