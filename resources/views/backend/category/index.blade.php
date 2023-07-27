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
                @if($categories->count() !== 0)
                    <div class="table-responsive text-nowrap" style="min-height: 500px">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>title</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $category->title }}
                                            </td>
                                            <td>
                                                {{ $category->created_at }}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu py-3" style="z-index: 100">
                                                        <a href="#" class="dropdown-item text-info edit-btn" data-url="{{ route('admin.categories.edit', $category->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i>
                                                            Edit
                                                        </a>
                                                        <x-admin.delete-btn :action="route('admin.categories.destroy', $category->id)"/>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mr-auto mt-5 w-100 d-flex justify-content-end">
                        {{ $categories->links() }}
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

@push('script')

<script>
    $(document).ready(function () {
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

        $('.edit-btn').on('click', function (e) {
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
                        reverseButtons: true,
                    }).then((result) => {
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
                    })
                }
            })
        })
    })
</script>

@endpush