@extends('backend.layouts.app')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row px-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold py-3 mb-4">
                    Episodes
                </h4>
                <a href="{{ route('admin.courses.episodes.create', request('course')) }}" class="btn btn-primary btn-md mb-3 d-flex align-items-center"><i class="fa-solid fa-square-plus me-2"></i>Create New</a>
            </div>
            <div class="card py-3">
                @include('backend.layouts.page_info')
                <div class="text-nowrap table-responsive pb-3" style="min-height: 500px">
                    <table class="table table-hover data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Course Name</th>
                                <th>Privacy</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            {{-- for datatables data --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.courses.episodes.index', request('course')) }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        render: function (data, type, row, meta) {
                            var x = meta.row + 1;
                            return x;
                        }
                    },
                    {
                        data: 'title', 
                        name: 'title',
                        render: function (data, type, row, meta) {
                            if(data.length > 20) {
                                str = data.substring(0,15)+ ' ...' + '<br/>' + `<a href="#">See More</a>`;
                                return str;
                            }
                            return data;
                        }
                    },
                    {
                        data: 'course.title',
                        name: 'course.title',
                        render: function (data, type, row, meta) {
                            if(data.length > 20) {
                                str = data.substring(0,15)+ ' ...' + '<br/>' + `<a href="#">See More</a>`;
                                return str;
                            }
                            return data;
                        }
                    },
                    {
                        data: 'privacy', 
                        name: 'privacy',
                        render: function (data) {
                            return `<span class="badge rounded-sm bg-info" style="text-transform: capitalize">${data}</span>`
                        }
                    },
                    {
                        data: 'created_at', 
                        name: 'created_at', 
                        render: function (data) {
                            return moment(data).fromNow();
                        }
                    },
                    {
                        data: null,
                        name: 'actions',
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row) {
                            var editUrl = "{{ route('admin.courses.episodes.edit', [':course_id', ':id']) }}".replace(':course_id', row.course_id).replace(':id', row.id);
                            var deleteUrl = "{{ route('admin.courses.episodes.destroy', [':course_id', ':id']) }}".replace(':course_id', row.course_id).replace(':id', row.id);
                            var showUrl = "{{ route('admin.courses.episodes.show', [':course_id', ':id']) }}".replace(':course_id', row.course_id).replace(':id', row.id);
                            return `
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" style="z-index: 100">
                                        <a class="dropdown-item" href="${editUrl}">
                                            <i class="bx bx-edit-alt me-1"></i> 
                                            Edit
                                        </a>
                                        @component('components.admin.delete-btn', ['action' => '${deleteUrl}'])
                                        @endcomponent
                                        <a class="dropdown-item text-info" href="${showUrl}">
                                            <i class="fa-solid fa-eye me-1"></i> 
                                            Show
                                        </a>
                                    </div>
                                </div>
                            `;
                        },
                    },
                ]
            });
        });
    </script>
@endpush