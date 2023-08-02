@extends('backend.layouts.app')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row px-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold py-3 mb-4">
                    Roles
                </h4>
                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-md mb-3 d-flex align-items-center"><i class="fa-solid fa-square-plus me-2"></i>Create New</a>
            </div>
            <div class="card py-3">
                @include('backend.layouts.page_info')
                <div class="text-nowrap table-responsive pb-3" style="min-height: 500px">
                    <table class="table table-hover data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role Name</th>
                                <th>Permission</th>
                                <th>Joined Date</th>
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
                ajax: "{{ route('admin.roles.index') }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        render: function (data, type, row, meta) {
                            var x = meta.row + 1;
                            return x;
                        }
                    },
                    {data: 'name', name: 'name'},
                    {data: 'permissions', name: 'permissions'},
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
                            var editUrl = "{{ route('admin.roles.edit', ':id') }}".replace(':id', row.id);
                            var deleteUrl = "{{ route('admin.roles.destroy', ':id') }}".replace(':id', row.id);
                            // var showUrl = "{{ route('admin.roles.show', ':id') }}".replace(':id', row.id);
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