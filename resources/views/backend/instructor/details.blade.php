@extends('backend.layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row px-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold py-3 mb-4">
                    <a href="{{ route('admin.instructors.index') }}" class="text-muted fw-light">Instructors /</a> 
                    Create
                </h4>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img
                        src="{{ 'https://i.pravatar.cc?u='.$instructor->id }}"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        id="uploadedAvatar"
                    />
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                                type="file"
                                id="upload"
                                class="account-file-input"
                                hidden
                                accept="image/png, image/jpeg"
                            />
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>

                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Name</label>
                            <h6 style="text-transform: capitalize">
                                {{ $instructor->name }}
                            </h6>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Email</label>
                            <h6 style="text-transform: capitalize">
                                {{ $instructor->email }}
                            </h6>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Phone</label>
                            <h6 style="text-transform: capitalize">
                                {{ $instructor->phone }}
                            </h6>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Address</label>
                            <h6 style="text-transform: capitalize">
                                {{ $instructor->address }}
                            </h6>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Date of Birth</label>
                            <h6 style="text-transform: capitalize">
                                {{ $instructor->dob }}
                            </h6>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Gender</label>
                            <h6 style="text-transform: capitalize">
                                {{ $instructor->gender }}
                            </h6>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Joined Date</label>
                            <h6 style="text-transform: capitalize">
                                {{ $instructor->created_at->diffForHumans() }}
                            </h6>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Last Updated At</label>
                            <h6 style="text-transform: capitalize">
                                {{ $instructor->updated_at->diffForHumans() }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">Delete Account</h5>
                    <div class="mb-3 col-12 mb-0 px-4">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                        <x-admin.delete-btn style="btn btn-danger btn-sm text-white" :action="route('admin.instructors.destroy', $instructor->id)" />
                    </div>
                </div>
                </div>
        </div>
    </div>
@endsection