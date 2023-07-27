@extends('backend.layouts.app')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="fw-bold py-3 mb-4">
                Instructors
            </h4>
            <a href="{{ route('admin.instructors.create') }}" class="btn btn-primary btn-md mb-3 d-flex align-items-center">
                <i class="fa-solid fa-square-plus me-2"></i>
                Create New
            </a>
        </div>
        <div class="row">
            <div class="card py-3">
                @if($instructors->count() !== 0)
                    <div class="table-responsive text-nowrap" style="min-height: 500px">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    <th>Phone</th>
                                    <th>Joined Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                    @foreach ($instructors as $key => $instructor)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $instructor->name }}
                                            </td>
                                            <td>
                                                {{ $instructor->email }}
                                            </td>
                                            <td>
                                                {{ $instructor->gender }}
                                            </td>
                                            <td>
                                                {{ $instructor->dob }}
                                            </td>
                                            <td>
                                                {{ $instructor->phone }}
                                            </td>
                                            <td>
                                                {{ $instructor->created_at->diffForHumans() }}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu" style="z-index: 100">
                                                        <a class="dropdown-item" href="{{ route('admin.instructors.edit', $instructor->id) }}"
                                                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                                        >
                                                        <x-admin.delete-btn :action="route('admin.instructors.destroy', $instructor->id)" />
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mr-auto mt-5 w-100 d-flex justify-content-end">
                        {{ $instructors->links() }}
                    </div>
                @else
                    <div class="alert alert-dark alert-dismissible mb-0 text-danger" role="alert">
                        No Data Found!
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection