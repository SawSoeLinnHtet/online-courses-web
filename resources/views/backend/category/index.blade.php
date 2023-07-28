@extends('backend.layouts.app')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="fw-bold py-3 mb-4">
                Categories
            </h4>
            <a href="#" data-url="{{ route('admin.categories.store') }}" class="btn btn-primary btn-md mb-3 d-flex align-items-center create-btn"><i class="fa-solid fa-square-plus me-2"></i>Create New</a>
        </div>
        <div class="row">
        <div class="card py-3">
                @include('backend.layouts.page_info')
                <div class="text-nowrap" style="min-height: 500px">
                    <table class="table table-hover data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
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
    $(document).ready(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.categories.index') }}",
            columns: [
                {
                    data: 'id',
                    name: 'id',
                    render: function (data, type, row, meta) {
                        var x = meta.row + 1;
                        return x;
                    }
                },
                {data: 'title', name: 'title'},
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
                        var editUrl = "{{ route('admin.categories.edit', ':id') }}".replace(':id', row.id);
                        var deleteUrl = "{{ route('admin.categories.destroy', ':id') }}".replace(':id', row.id);
                        return `
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="z-index: 100">
                                    <a href="#" class="dropdown-item text-info edit-btn" data-url="${editUrl}">
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

        $('.create-btn').on('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Create Category',
                html: `
                    <div class="form-group">
                        <label class="mb-3 text-left">Title<span class="ms-2 text-danger">*</span></label>
                        <input class="form-control category-input" name="name">
                    </div>
                `,
                showCancelButton: true,
                showConfirmButton: true,
                confirmButtonText: 'Submit',
                reverseButtons: true,
            }).then((result) => {
                if(result.isConfirmed){
                    let url = $(this).data('url');

                    $.ajax({
                        url: url,
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'title': $('.category-input').val()
                        },
                        type: 'POST',
                        success: function(res){
                            console.log(res)
                            Swal.fire('Created!', res.result, 'success');

                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        },
                        error: function(res){
                             Swal.fire({
                                icon: 'error',
                                title: "Something wrong",
                                text: res.responseJSON.message
                            });
                        }
                    })
                }
            })
        })

        $(document).on('click', '.edit-btn', function (e) {
            e.preventDefault();

            let edit_url = $(this).data('url');
            console.log('hello')
            $.ajax({
                url: edit_url,
                type: 'GET',
                success: function (res) {
                    Swal.fire({
                        title: 'Create Category',
                        html: `
                            <div class="form-group">
                                <label class="mb-3 text-left">Title<span class="ms-2 text-danger">*</span></label>
                                <input class="form-control category-input" name="name" value="${res.result.title}">
                            </div>
                        `,
                        showCancelButton: true,
                        showConfirmButton: true,
                        confirmButtonText: 'Submit',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true,
                    }).then((result) => {
                        if (result.isConfirmed){
                            let update_url = `/admin/categories/${res.result.id}`
                            $.ajax({
                                url: update_url,
                                type: 'PATCH',
                                data: {
                                    '_token':  "{{ csrf_token() }}",
                                    'title': $('.category-input').val()
                                },
                                success: function(res){
                                    Swal.fire('Updated!', res.result, 'success');

                                    setTimeout(() => {
                                        location.reload();
                                    }, 1000);
                                },
                                error: function(res){
                                    Swal.fire({
                                        icon: 'error',
                                        title: "Something wrong",
                                        text: res.responseJSON.message
                                    });
                                }
                            })
                        } else if(result.dismiss){
                            Swal.fire(
                                'Cancelled',
                                'Category is not updated',
                                'error'
                            )
                        }
                    })
                }
            })
        })

    })
</script>

@endpush