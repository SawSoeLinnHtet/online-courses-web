<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="name">Name</label>
    <div class="col-sm-10">
        <input class="form-control text-dark" type="name" id="name" name="name"/>
    </div>
</div>
<div class="row mb-3">
    <label for="category" class="col-sm-2 col-form-label">Permission </label>
    <div class="col-sm-10 position-relative pb-3">
        <select class="form-select category_select text-dark" id="category" name="permission[]" aria-label="Select Category Name" multiple>
            <option value="">Select Permission Name</option>
            @foreach ($permissions as $key=>$permission)
                <option value="{{ $key }}">{{ $permission }}</option>
            @endforeach
        </select>
    </div>
</div>

@push('script')
    <script>
        $('.form-select').select2({
            placeholder: "Select Permission",
            allowClear: true
        });
    </script>
@endpush
