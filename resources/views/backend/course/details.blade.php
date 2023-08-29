@extends('backend.layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row px-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold py-3 mb-4">
                    <a href="{{ route('admin.courses.index') }}" class="text-muted fw-light">Courses /</a> 
                    {{ $course->title }} Details
                </h4>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-12 border-bottom">
                            <label for="firstName" class="form-label text-dark">Name</label>
                            <h6 style="text-transform: capitalize">
                                {{ $course->title }}
                            </h6>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label text-dark">Instructor Name</label>
                            <h6 style="text-transform: capitalize">
                                {{ $course->Instructor->name }}
                            </h6>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label text-dark">Category Name</label>
                            <div>
                                @include('backend.course.partials.category-badge', ['categories' => $course->Category])
                            </div>
                        </div>
                        <hr/>
                        <div class="mb-3 col-md-12 border-bottom">
                            <label for="firstName" class="form-label text-dark">Description</label>
                            <h6 style="text-transform: capitalize">
                                {{ $course->description }}
                            </h6>
                        </div>
                        <div class="mb-3 col-md-12 border-bottom">
                            <label for="firstName" class="form-label text-dark">Summary</label>
                            <div>
                                {!! $course->summary !!}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label text-dark">Created at</label>
                            <h6 style="text-transform: capitalize">
                                {{ $course->created_at->diffForHumans() }}
                            </h6>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label text-dark">Last Updated At</label>
                            <h6 style="text-transform: capitalize">
                                {{ $course->updated_at->diffForHumans() }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">Delete Course</h5>
                    <div class="mb-3 col-12 mb-0 px-4">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your course?</h6>
                            <p class="mb-0">Once you delete your course, there is no going back. Please be certain.</p>
                        </div>
                        <x-admin.delete-btn style="btn btn-danger btn-sm text-white" :action="route('admin.courses.destroy', $course->id)" />
                    </div>
                </div>
                </div>
        </div>
    </div>
@endsection