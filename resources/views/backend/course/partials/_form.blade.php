<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="name">Title</label>
    <div class="col-sm-10">
        <input class="form-control text-dark" type="text" id="title" name="title" value="{{ $course->title ?? '' }}"/>
    </div>
</div>

<div class="row mb-3">
    <label for="instructor" class="col-sm-2 col-form-label">Instructor Name</label>
    <div class="col-sm-10 position-relative pb-3">
        <select class="form-select instructor_select" id="instructor" name="instructor_id" aria-label="Select Instructor Name">
            <option value="">Select Instructor Name</option>
            @foreach ($instructors as $instructor)
                <option value="{{ $instructor->id }}" {{ $instructor->id == ( $course->instructor_id ?? '' ) ? 'selected' : '' }}>{{ $instructor->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row mb-3">
    <label for="category" class="col-sm-2 col-form-label">Category Name</label>
    <div class="col-sm-10 position-relative pb-3">
        <select class="form-select category_select text-dark" id="category" name="category_ids[]" aria-label="Select Category Name" multiple>
            <option value="">Select Category Name</option>
            @foreach ($categories as $key=>$category)
                <option value="{{ $category->id }}" @if(!is_null($category_ids ?? null)) {{ array_key_exists($category->id, $category_ids) ? 'selected' : ''  }}@endif>{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="description">Description</label>
    <div class="col-sm-10">
        <textarea class="form-control text-dark" id="description" rows="5" name="description">{{ $course->description ?? '' }}</textarea>
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="description">Summary</label>
    <div class="col-sm-10">
        <textarea class="form-control text-secondary" id="summary" rows="5" name="summary">{{ $course->summary ?? '' }}</textarea>
    </div>
</div>

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\CourseRequest') !!}
    <script>
        $(document).ready(function() {
            $('.instructor_select').select2({
                theme: "classic"
            });
            $('.category_select').select2({
                theme: "classic"
            });
        });
    </script>
@endpush
