<div class="card">
    <div class="card-body">
        <div class="row">
            {{-- Title --}}
            <div class="col-md-6 form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $carousel->title ?? '') }}">
            </div>

            {{-- Subtitle --}}
            <div class="col-md-6 form-group">
                <label>Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $carousel->subtitle ?? '') }}">
            </div>

            {{-- Description --}}
            <div class="col-md-12 form-group">
                <label>Description</label>
                <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $carousel->description ?? '') }}</textarea>
            </div>

            {{-- Button Text --}}
            <div class="col-md-6 form-group">
                <label>Button Text</label>
                <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $carousel->button_text ?? '') }}">
            </div>

            {{-- Button Link --}}
            <div class="col-md-6 form-group">
                <label>Button Link (e.g. /contact)</label>
                <input type="text" name="button_link" class="form-control" value="{{ old('button_link', $carousel->button_link ?? '') }}">
            </div>

            {{-- Secondary/Video Link --}}
            <div class="col-md-6 form-group">
                <label>Secondary / Video Link (e.g. YouTube URL)</label>
                <input type="text" name="link" class="form-control" value="{{ old('link', $carousel->link ?? '') }}">
            </div>

            {{-- Slide Image --}}
            <div class="col-md-6 form-group">
                <label>Slide Image *</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @if(isset($carousel) && $carousel->image_url)
                    <img src="{{ asset('uploads/carousel/' . $carousel->image_url) }}" class="img-thumbnail mt-2" width="200">
                @endif
            </div>

        </div>

        <button type="submit" class="btn btn-success mt-3"><i class="fas fa-save"></i> Save Slide</button>
        <a href="{{ route('admin.carousel.index') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
</div>
