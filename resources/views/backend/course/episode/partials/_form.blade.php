<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="name">Title</label>
    <div class="col-sm-10">
        <input class="form-control text-dark" type="text" id="title" name="title" value="{{ $episode->title ?? '' }}"/>
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="name">Privacy</label>
    <div class="col-sm-10">
        <div class="mb-3">
            <input name="privacy" class="form-check-input me-2" type="radio" value="public" id="public" {{ ($episode->privacy ?? '') == 'public' ? 'checked': '' }}/>
            <label for="public" class="form-check-label">Public</label>
        </div>
        <div>
            <input name="privacy" class="form-check-input me-2" type="radio" value="private" id="public" {{ ($episode->privacy ?? '') == 'private' ? 'checked': '' }}/>
            <label for="public" class="form-check-label">Private</label>
        </div>
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="cover">Cover</label>
    <div class="col-sm-10">
        <input class="form-control" type="file" id="cover" name="cover"/>
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="image">Image</label>
    <div class="col-sm-10">
        <input class="form-control" type="file" id="image" name="image"/>
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="video">Video</label>
    <div class="col-sm-10">
        <input class="form-control" type="file" id="video" name="video"/>
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="description">Summary</label>
    <div class="col-sm-10">
        <textarea class="form-control text-secondary" id="editor" rows="5" name="summary">{{ $episode->summary ?? '' }}</textarea>
    </div>
</div>

<div class="row justify-content-end">
    <div class="col-sm-10 d-flex justify-content-end">
        <a href="{{ route('admin.courses.episodes.index', request('course')) }}" class="btn btn-secondary me-3">Cancel</a>
        <button type="submit" class="btn btn-primary">Send</button>
    </div>
</div>

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\EpisodeRequest') !!}
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('.instructor_select').select2({
                theme: "classic"
            });
            $('.category_select').select2({
                theme: "classic"
            });
        });

        CKEDITOR.replace( 'editor', {
            removePlugins: 'exportpdf'
        } );

    </script>
@endpush
