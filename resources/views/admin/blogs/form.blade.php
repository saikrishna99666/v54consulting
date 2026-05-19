<div class="card">
    <div class="card-body">
        <div class="row">
            {{-- Title --}}
            <div class="col-md-6 form-group">
                <label>Blog Title *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $blog->name ?? '') }}" required>
            </div>

            {{-- Slug --}}
            <div class="col-md-6 form-group">
                <label>Blog URL (slug)</label>
                <input type="text" name="blogurl" class="form-control" value="{{ old('blogurl', $blog->blogurl ?? '') }}">
            </div>

            {{-- Category --}}
            <div class="col-md-6 form-group">
                <label>Category *</label>
                <input type="text" name="category" class="form-control" value="{{ old('category', $blog->category ?? '') }}" required>
            </div>

            {{-- Written By --}}
            <div class="col-md-6 form-group">
                <label>Written By</label>
                <input type="text" name="writtenby" class="form-control" value="{{ old('writtenby', $blog->writtenby ?? '') }}">
            </div>

            {{-- Short Description --}}
            <div class="col-md-12 form-group">
                <label>Short Description</label>
                <textarea name="shortdescription" class="form-control" rows="3">{{ old('shortdescription', $blog->shortdescription ?? '') }}</textarea>
            </div>

            {{-- Description --}}
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Description *</label>
                    <textarea id="description" name="description" class="form-control" rows="5">{{ old('description', $blog->description ?? '') }}</textarea>
                </div>
            </div>

            {{-- Image 1 --}}
            <div class="col-md-6 form-group">
                <label>Featured Image</label>
                <input type="file" name="image1" class="form-control" accept="image/*">
                @if(isset($blog) && $blog->image1)
                    <img src="{{ asset('uploads/blogs/' . $blog->image1) }}" class="img-thumbnail mt-2" width="150">
                @endif
            </div>

            {{-- Image 2 --}}
            <div class="col-md-6 form-group">
                <label>Secondary Image</label>
                <input type="file" name="image2" class="form-control" accept="image/*">
                @if(isset($blog) && $blog->image2)
                    <img src="{{ asset('uploads/blogs/' . $blog->image2) }}" class="img-thumbnail mt-2" width="150">
                @endif
            </div>

            {{-- Status --}}
            <div class="col-md-6 form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="draft" {{ old('status', $blog->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $blog->status ?? 'published') == 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            {{-- Visible --}}
            <div class="col-md-6 form-group">
                <label>Visible on Website?</label>
                <select name="visible" class="form-control">
                    <option value="1" {{ old('visible', $blog->visible ?? 1) == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('visible', $blog->visible ?? 1) == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
        </div>

        {{-- SEO SECTION --}}
        <hr>
        <h4>SEO & Meta Information</h4>
        <div class="row">
            <div class="col-md-6 form-group">
                <label>SEO Title</label>
                <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title', $blog->seo_title ?? '') }}">
            </div>
            <div class="col-md-6 form-group">
                <label>Canonical URL</label>
                <input type="text" name="canonical_url" class="form-control" value="{{ old('canonical_url', $blog->canonical_url ?? '') }}">
            </div>
            <div class="col-md-12 form-group">
                <label>SEO Description</label>
                <textarea name="seo_description" class="form-control" rows="3">{{ old('seo_description', $blog->seo_description ?? '') }}</textarea>
            </div>
            <div class="col-md-12 form-group">
                <label>SEO Keywords</label>
                <textarea name="seo_keywords" class="form-control" rows="2">{{ old('seo_keywords', $blog->seo_keywords ?? '') }}</textarea>
            </div>

            {{-- Open Graph --}}
            <div class="col-md-6 form-group">
                <label>OG Title</label>
                <input type="text" name="og_title" class="form-control" value="{{ old('og_title', $blog->og_title ?? '') }}">
            </div>
            <div class="col-md-12 form-group">
                <label>OG Description</label>
                <textarea name="og_description" class="form-control" rows="3">{{ old('og_description', $blog->og_description ?? '') }}</textarea>
            </div>

            {{-- Twitter --}}
            <div class="col-md-6 form-group">
                <label>Twitter Title</label>
                <input type="text" name="twitter_title" class="form-control" value="{{ old('twitter_title', $blog->twitter_title ?? '') }}">
            </div>
            <div class="col-md-12 form-group">
                <label>Twitter Description</label>
                <textarea name="twitter_description" class="form-control" rows="3">{{ old('twitter_description', $blog->twitter_description ?? '') }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3"><i class="fas fa-save"></i> Save Blog</button>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
</div>


