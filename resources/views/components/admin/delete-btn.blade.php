{{-- <div class="dropdown-item text-left text-danger">
    <form action="{{ $action }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-link text-danger text-secondary p-0">
            <i class="bx bx-trash me-1"></i> 
            Delete
        </button>
    </form>
</div> --}}

<a href="#" data-url="{{ $action }}" class="delete-btn dropdown-item text-info edit-btn text-danger"><i class="bx bx-trash me-1"></i>Delete</a>

@push('script')
    
    <script>
        $(document).ready(function () {
            $(document).on('click', '.delete-btn', function (e) {
                e.preventDefault();
                
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success ms-2',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        let delete_url = $(this).data('url')

                        $.ajax({
                            url: delete_url,
                            data: {
                                '_token' : "{{ csrf_token() }}",
                            },
                            type: 'DELETE',
                            success: function (res){
                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    res.result,
                                    'success'
                                )

                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            }
                        })
                    }else if(result.dismiss === Swal.DismissReason.cancel){
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Category is safe :)',
                            'error'
                        )
                    }
                })
            })
        })
    </script>

@endpush