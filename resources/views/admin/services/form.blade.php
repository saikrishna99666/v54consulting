<div class="card">
    <div class="card-body">
        <div class="row">
            {{-- Title --}}
            <div class="form-group col-lg-4">
                <label>Service Title *</label>
                <input type="text" name="ServicesTitle" id="ServicesTitle" class="form-control"
                    value="{{ old('ServicesTitle', $service->ServicesTitle ?? '') }}" required>
            </div>

            {{-- Slug --}}
            <div class="form-group col-lg-4">
                <label>Service URL (slug)</label>
                <input type="text" name="servicesUrl" id="servicesUrl" class="form-control"
                    value="{{ old('servicesUrl', $service->servicesUrl ?? '') }}">
            </div>

            {{-- Category --}}
            <div class="form-group col-lg-4">
                <label>Page Category *</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" 
                            {{ old('category_id', $service->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Sub Category --}}
            <div class="form-group col-lg-4">
                <label>Page Sub Category</label>
                <select name="subcategory_id" id="subcategory_id" class="form-control">
                    <option value="">Select Sub Category</option>
                    @foreach($subcategories as $sub)
                        <option value="{{ $sub->id }}" data-parent="{{ $sub->parent_id }}"
                            {{ old('subcategory_id', $service->subcategory_id ?? '') == $sub->id ? 'selected' : '' }}>
                            {{ $sub->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            {{-- Service Icon --}}
            <div class="form-group col-lg-4">
                <label>Service Icon</label>
                <input type="file" name="icon" class="form-control" accept="image/*">
                @if(isset($service) && $service->icon)
                    <img src="{{ asset('uploads/services/icons/' . $service->icon) }}" class="img-thumbnail mt-2" width="60">
                @endif
            </div>



            {{-- Status --}}
            <div class="form-group col-lg-4">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ old('status', $service->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $service->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            {{-- Short Description --}}
            <div class="form-group col-lg-12">
                <label>Short Description (for Home & Listing) *</label>
                <textarea name="other" class="form-control" rows="3" required>{{ old('other', $service->other ?? '') }}</textarea>
                <small class="text-muted">This text appears on the homepage and services listing page.</small>
            </div>

            {{-- Description --}}
            <div class="form-group col-lg-12">
                <label>Main Service Description *</label>
                <textarea id="ServicesText" name="ServicesText" class="form-control" rows="5">
                    {{ old('ServicesText', $service->ServicesText ?? '') }}
                </textarea>
            </div>

            {{-- Service Image --}}
            <div class="form-group col-lg-12">
                <label>Main Service Image</label>
                <input type="file" name="serviceimage" class="form-control" accept="image/*">
                @if(isset($service) && $service->serviceimage)
                    <img src="{{ asset('uploads/services/' . $service->serviceimage) }}" class="img-thumbnail mt-2" width="150">
                @endif
            </div>
        </div>

        {{-- SEO Settings --}}
        <hr>
        <h4>SEO Settings</h4>
        <div class="row">
            <div class="form-group col-lg-6">
                <label>SEO Title</label>
                <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title', $service->seo_title ?? '') }}">
            </div>
            <div class="form-group col-lg-6">
                <label>Canonical URL</label>
                <input type="text" name="canonical_url" class="form-control" value="{{ old('canonical_url', $service->canonical_url ?? '') }}">
            </div>
            <div class="form-group col-lg-12">
                <label>SEO Description</label>
                <textarea name="seo_description" class="form-control" rows="2">{{ old('seo_description', $service->seo_description ?? '') }}</textarea>
            </div>
            <div class="form-group col-lg-12">
                <label>SEO Keywords</label>
                <textarea name="seo_keywords" class="form-control" rows="2">{{ old('seo_keywords', $service->seo_keywords ?? '') }}</textarea>
            </div>
        </div>

        {{-- Media --}}
        <hr>
        <h4>Media (Videos & Gallery)</h4>
        <div class="row">
            {{-- YouTube Videos --}}
            <div class="col-lg-12 mb-4">
                <label>YouTube Video URLs</label>
                @if(isset($service) && $service->videos->where('video_type', 'youtube')->count())
                    @foreach($service->videos->where('video_type', 'youtube') as $v)
                        <div class="d-flex mb-2">
                            <input type="text" class="form-control" value="{{ $v->youtube_url }}" readonly>
                            <a href="{{ route('admin.service.video.delete', $v->id) }}" class="btn btn-danger btn-sm ml-2">X</a>
                        </div>
                    @endforeach
                @endif
                <div id="videoArea"></div>
                <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addVideo()">+ Add YouTube Video</button>
            </div>

            {{-- Own Videos --}}
            <div class="col-lg-12 mb-4">
                <label>Upload Own Videos</label>
                @if(isset($service) && $service->videos->where('video_type', 'upload')->count())
                    <div class="row mb-3">
                        @foreach($service->videos->where('video_type', 'upload') as $v)
                            <div class="col-md-3 text-center">
                                <video width="100%" controls>
                                    <source src="{{ asset('uploads/services/videos/' . $v->video_file) }}" type="video/mp4">
                                </video>
                                <a href="{{ route('admin.service.video.delete', $v->id) }}" class="btn btn-sm btn-danger mt-1">Delete</a>
                            </div>
                        @endforeach
                    </div>
                @endif
                <input type="file" name="upload_videos[]" class="form-control" multiple accept="video/*">
            </div>

            {{-- Gallery --}}
            <div class="col-lg-12 mb-4">
                <label>Gallery Images</label>
                @if(isset($service) && $service->galleries->count())
                    <div class="row mb-3">
                        @foreach($service->galleries as $g)
                            <div class="col-md-2 text-center">
                                <img src="{{ asset('uploads/services/gallery/' . $g->image) }}" class="img-thumbnail mb-1">
                                <a href="{{ route('admin.service.gallery.delete', $g->id) }}" class="btn btn-xs btn-danger">Delete</a>
                            </div>
                        @endforeach
                    </div>
                @endif
                <input type="file" name="gallery[]" multiple class="form-control" accept="image/*">
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Service</button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>


